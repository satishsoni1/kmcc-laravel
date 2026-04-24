<?php
namespace App\Http\Controllers\NaacPortal;
use App\Models\NaacPortal\{NpCriterion, NpMetric, NpMetricEntry, NpDocument, NpDepartment};
use App\Models\User;
use Illuminate\Http\Request;
class NpCriterionController extends NpBaseController {
    public function index() {
        $cid      = $this->collegeId();
        $criteria = NpCriterion::where('is_active', true)->orderBy('number')
            ->with(['metrics.entries' => fn($q) => $q->where('college_id', $cid)])->get();
        return view('naac-portal.criteria.index', compact('criteria'));
    }
    public function show(NpCriterion $criterion) {
        $cid     = $this->collegeId();
        $year    = request('year', date('Y') . '-' . (date('Y') + 1 - 2000));
        $metrics = $criterion->metrics()->with(['entries' => fn($q) => $q->where('college_id', $cid)->where('academic_year', $year)])->get();
        $users   = User::orderBy('name')->get();
        $depts   = NpDepartment::where('college_id', $cid)->orderBy('name')->get();
        return view('naac-portal.criteria.show', compact('criterion', 'metrics', 'year', 'users', 'depts'));
    }
    public function saveEntry(Request $request, NpCriterion $criterion, NpMetric $metric) {
        $cid = $this->collegeId();
        $data = $request->validate([
            'academic_year' => 'required|string|max:10',
            'data_value'    => 'nullable|string',
            'description'   => 'nullable|string',
            'score'         => 'nullable|numeric|min:0',
            'status'        => 'required|in:not_started,draft,submitted,approved,returned',
            'assigned_to'   => 'nullable|exists:users,id',
            'department_id' => 'nullable|exists:np_departments,id',
            'deadline'      => 'nullable|date',
            'reviewer_remarks' => 'nullable|string',
        ]);
        $data['college_id'] = $cid;
        $data['metric_id']  = $metric->id;
        NpMetricEntry::updateOrCreate(['college_id' => $cid, 'metric_id' => $metric->id, 'academic_year' => $data['academic_year']], $data);
        return back()->with('success', 'Entry saved for ' . $metric->code . '.');
    }
    public function entryShow(NpCriterion $criterion, NpMetric $metric) {
        $cid   = $this->collegeId();
        $year  = request('year', '2024-25');
        $entry = NpMetricEntry::where('college_id', $cid)->where('metric_id', $metric->id)->where('academic_year', $year)->first();
        $docs  = NpDocument::where('college_id', $cid)->where('metric_id', $metric->id)->latest()->get();
        $users = User::orderBy('name')->get();
        $depts = NpDepartment::where('college_id', $cid)->orderBy('name')->get();
        return view('naac-portal.criteria.entry', compact('criterion', 'metric', 'entry', 'docs', 'year', 'users', 'depts'));
    }
}
