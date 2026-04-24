<?php
namespace App\Http\Controllers\NaacPortal;
use App\Models\NaacPortal\{NpCriterion, NpMetricEntry, NpDocument, NpTask, NpDepartment, NpFeedbackForm};
use Illuminate\Http\Request;
class NpReportController extends NpBaseController {
    public function criterionCompletion(Request $request) {
        $cid  = $this->collegeId();
        $year = $request->get('year', '2024-25');
        $criteria = NpCriterion::where('is_active', true)->orderBy('number')
            ->with(['metrics' => function ($q) use ($cid, $year) {
                $q->with(['entries' => fn($e) => $e->where('college_id', $cid)->where('academic_year', $year)]);
            }])->get();
        $report = $criteria->map(function ($c) {
            $total = $c->metrics->count();
            $byStatus = $c->metrics->flatMap(fn($m) => $m->entries)->groupBy('status');
            return ['criterion' => $c, 'total' => $total, 'approved' => ($byStatus['approved'] ?? collect())->count(), 'submitted' => ($byStatus['submitted'] ?? collect())->count(), 'draft' => ($byStatus['draft'] ?? collect())->count(), 'not_started' => $total - $c->metrics->filter(fn($m) => $m->entries->isNotEmpty())->count()];
        });
        return view('naac-portal.reports.criterion-completion', compact('report', 'year'));
    }
    public function pendingTasks(Request $request) {
        $cid   = $this->collegeId();
        $tasks = NpTask::where('college_id', $cid)->whereIn('status', ['open', 'in_progress'])->with('criterion', 'assignees', 'creator')->orderBy('due_date')->get();
        $overdue = $tasks->filter(fn($t) => $t->due_date && $t->due_date->isPast())->count();
        return view('naac-portal.reports.pending-tasks', compact('tasks', 'overdue'));
    }
    public function departmentReport(Request $request) {
        $cid   = $this->collegeId();
        $year  = $request->get('year', '2024-25');
        $depts = NpDepartment::where('college_id', $cid)->with(['metricEntries' => fn($q) => $q->where('academic_year', $year)])->orderBy('name')->get();
        return view('naac-portal.reports.department', compact('depts', 'year'));
    }
    public function documents(Request $request) {
        $cid   = $this->collegeId();
        $docs  = NpDocument::where('college_id', $cid)->with('metric.criterion', 'department', 'uploader');
        if ($request->year) $docs->where('academic_year', $request->year);
        $docs  = $docs->orderByDesc('created_at')->get();
        $byType = $docs->groupBy('file_type');
        $byCrit = $docs->filter(fn($d) => $d->metric)->groupBy(fn($d) => $d->metric->criterion->name ?? 'Uncategorised');
        return view('naac-portal.reports.documents', compact('docs', 'byType', 'byCrit'));
    }
}
