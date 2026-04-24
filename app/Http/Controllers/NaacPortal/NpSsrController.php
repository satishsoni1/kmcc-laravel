<?php
namespace App\Http\Controllers\NaacPortal;
use App\Models\NaacPortal\{NpSsrSection, NpCriterion};
use App\Models\User;
use Illuminate\Http\Request;
class NpSsrController extends NpBaseController {
    private static array $standardSections = [
        ['section_key' => 'executive_summary', 'title' => 'Executive Summary', 'order' => 0],
        ['section_key' => 'profile', 'title' => 'Institutional Profile', 'order' => 1],
        ['section_key' => 'swoc', 'title' => 'SWOC Analysis', 'order' => 2],
    ];
    public function index() {
        $cid   = $this->collegeId();
        $year  = request('year', '2023-24');
        $sections = NpSsrSection::where('college_id', $cid)->where('academic_year', $year)
            ->with('criterion', 'assignedUser')->orderBy('order')->get();
        $criteria = NpCriterion::where('is_active', true)->orderBy('number')->get();
        $users    = User::orderBy('name')->get();
        $years    = NpSsrSection::where('college_id', $cid)->distinct()->pluck('academic_year')->unique()->values();
        if ($sections->isEmpty()) {
            $this->initializeSections($cid, $year, $criteria);
            $sections = NpSsrSection::where('college_id', $cid)->where('academic_year', $year)->with('criterion', 'assignedUser')->orderBy('order')->get();
        }
        $totalSections = $sections->count();
        $complete      = $sections->where('status', 'approved')->count() + $sections->where('status', 'complete')->count();
        $pct           = $totalSections ? round(($complete / $totalSections) * 100) : 0;
        return view('naac-portal.ssr.index', compact('sections', 'criteria', 'users', 'year', 'years', 'pct', 'totalSections', 'complete'));
    }
    private function initializeSections(int $cid, string $year, $criteria): void {
        foreach (static::$standardSections as $s) {
            NpSsrSection::firstOrCreate(['college_id' => $cid, 'academic_year' => $year, 'section_key' => $s['section_key']], array_merge($s, ['college_id' => $cid, 'academic_year' => $year]));
        }
        foreach ($criteria as $c) {
            NpSsrSection::firstOrCreate(['college_id' => $cid, 'academic_year' => $year, 'section_key' => 'criterion_' . $c->number], ['college_id' => $cid, 'criterion_id' => $c->id, 'academic_year' => $year, 'section_key' => 'criterion_' . $c->number, 'title' => 'Criterion ' . $c->number . ' — ' . $c->name, 'order' => $c->number + 10]);
        }
    }
    public function editSection(NpSsrSection $section) {
        $users = User::orderBy('name')->get();
        return view('naac-portal.ssr.edit-section', compact('section', 'users'));
    }
    public function updateSection(Request $request, NpSsrSection $section) {
        $data = $request->validate(['title' => 'required|string|max:255', 'content' => 'nullable|string', 'status' => 'required|in:draft,complete,review,approved', 'assigned_to' => 'nullable|exists:users,id']);
        $section->update($data);
        return redirect()->route('np.ssr.index', ['year' => $section->academic_year])->with('success', 'Section updated.');
    }
}
