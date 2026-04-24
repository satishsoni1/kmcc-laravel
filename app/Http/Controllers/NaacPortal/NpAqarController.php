<?php
namespace App\Http\Controllers\NaacPortal;
use App\Models\NaacPortal\{NpAqarReport, NpAqarSection, NpCriterion};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class NpAqarController extends NpBaseController {
    public function index() {
        $reports = NpAqarReport::where('college_id', $this->collegeId())->with('creator')->orderByDesc('academic_year')->get();
        return view('naac-portal.aqar.index', compact('reports'));
    }
    public function create() { return view('naac-portal.aqar.create'); }
    public function store(Request $request) {
        $cid = $this->collegeId();
        $data = $request->validate(['academic_year' => 'required|string|max:10', 'title' => 'required|string|max:255']);
        $exists = NpAqarReport::where('college_id', $cid)->where('academic_year', $data['academic_year'])->first();
        if ($exists) return back()->withErrors(['academic_year' => 'An AQAR for this year already exists.']);
        $report = NpAqarReport::create(['college_id' => $cid, 'academic_year' => $data['academic_year'], 'title' => $data['title'], 'status' => 'draft', 'created_by' => auth()->id()]);
        // Auto-create sections for each criterion
        $criteria = NpCriterion::where('is_active', true)->orderBy('number')->get();
        foreach ($criteria as $c) {
            NpAqarSection::create(['aqar_id' => $report->id, 'criterion_id' => $c->id, 'section_key' => 'c' . $c->number, 'title' => 'Criterion ' . $c->number . ' — ' . $c->name, 'order' => $c->number]);
        }
        // Additional standard sections
        foreach ([['section_key' => 'profile', 'title' => 'Part A — Institutional Data', 'order' => 0],
                  ['section_key' => 'initiatives', 'title' => 'Part B — Key Initiatives', 'order' => 8],
                  ['section_key' => 'best_practices', 'title' => 'Part C — Best Practices', 'order' => 9]] as $s) {
            NpAqarSection::create(array_merge(['aqar_id' => $report->id, 'criterion_id' => null], $s));
        }
        if ($request->duplicate_from) {
            $source = NpAqarReport::where('college_id', $cid)->where('academic_year', $request->duplicate_from)->first();
            if ($source) {
                foreach ($source->sections as $ss) {
                    NpAqarSection::where('aqar_id', $report->id)->where('section_key', $ss->section_key)
                        ->update(['content' => $ss->content]);
                }
            }
        }
        return redirect()->route('np.aqar.show', $report)->with('success', 'AQAR created. Fill in each section below.');
    }
    public function show(NpAqarReport $aqar) {
        $sections = $aqar->sections()->with('criterion')->orderBy('order')->get();
        return view('naac-portal.aqar.show', compact('aqar', 'sections'));
    }
    public function saveSection(Request $request, NpAqarReport $aqar, NpAqarSection $section) {
        $data = $request->validate(['content' => 'nullable|string', 'is_complete' => 'boolean']);
        $section->update($data);
        return back()->with('success', 'Section saved.');
    }
    public function updateStatus(Request $request, NpAqarReport $aqar) {
        $data = $request->validate(['status' => 'required|in:draft,submitted,approved,published', 'remarks' => 'nullable|string']);
        $update = ['status' => $data['status'], 'remarks' => $data['remarks'] ?? null];
        if ($data['status'] === 'submitted') $update['submission_date'] = now();
        if ($data['status'] === 'approved') { $update['approval_date'] = now(); $update['approved_by'] = auth()->id(); }
        $aqar->update($update);
        return back()->with('success', 'AQAR status updated to ' . ucfirst($data['status']) . '.');
    }
    public function destroy(NpAqarReport $aqar) {
        if ($aqar->file_path) Storage::disk('public')->delete($aqar->file_path);
        $aqar->delete();
        return redirect()->route('np.aqar.index')->with('success', 'AQAR deleted.');
    }
    public function previousYears() {
        $years = NpAqarReport::where('college_id', $this->collegeId())->pluck('academic_year');
        return response()->json($years);
    }
}
