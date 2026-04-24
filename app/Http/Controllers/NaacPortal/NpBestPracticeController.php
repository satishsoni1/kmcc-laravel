<?php
namespace App\Http\Controllers\NaacPortal;
use App\Models\NaacPortal\NpBestPractice;
use Illuminate\Http\Request;
class NpBestPracticeController extends NpBaseController {
    public function index() {
        $practices = NpBestPractice::where('college_id', $this->collegeId())->orderByDesc('created_at')->get();
        return view('naac-portal.best-practices.index', compact('practices'));
    }
    public function create() { return view('naac-portal.best-practices.form'); }
    public function store(Request $request) {
        $data = $request->validate(['title' => 'required|string|max:255', 'objective' => 'nullable|string', 'context' => 'nullable|string', 'practice_description' => 'nullable|string', 'evidence_of_success' => 'nullable|string', 'problems_encountered' => 'nullable|string', 'academic_year' => 'nullable|string|max:10', 'is_published' => 'boolean']);
        $data['college_id'] = $this->collegeId();
        NpBestPractice::create($data);
        return redirect()->route('np.best-practices.index')->with('success', 'Best practice saved.');
    }
    public function edit(NpBestPractice $bestPractice) {
        return view('naac-portal.best-practices.form', ['practice' => $bestPractice]);
    }
    public function update(Request $request, NpBestPractice $bestPractice) {
        $data = $request->validate(['title' => 'required|string|max:255', 'objective' => 'nullable|string', 'context' => 'nullable|string', 'practice_description' => 'nullable|string', 'evidence_of_success' => 'nullable|string', 'problems_encountered' => 'nullable|string', 'academic_year' => 'nullable|string|max:10', 'is_published' => 'boolean']);
        $bestPractice->update($data);
        return redirect()->route('np.best-practices.index')->with('success', 'Best practice updated.');
    }
    public function destroy(NpBestPractice $bestPractice) { $bestPractice->delete(); return back()->with('success', 'Deleted.'); }
}
