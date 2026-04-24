<?php
namespace App\Http\Controllers\NaacPortal;
use App\Models\NaacPortal\{NpCriterion, NpMetricEntry, NpTask, NpDocument, NpAqarReport, NpActivityLog, NpPortalNotification};
use Illuminate\Support\Facades\DB;
class NpDashboardController extends NpBaseController {
    public function index() {
        $cid = $this->collegeId();
        $criteria = NpCriterion::where('is_active', true)->orderBy('number')
            ->with(['metrics' => function ($q) use ($cid) {
                $q->with(['entries' => fn($e) => $e->where('college_id', $cid)->latest('updated_at')->limit(1)]);
            }])->get();

        // Completion per criterion
        $criteriaProgress = $criteria->map(function ($c) use ($cid) {
            $total = $c->metrics->count();
            if (!$total) return ['criterion' => $c, 'pct' => 0, 'approved' => 0, 'total' => 0];
            $approved = $c->metrics->filter(function ($m) use ($cid) {
                $entry = $m->entries->first();
                return $entry && $entry->status === 'approved';
            })->count();
            return ['criterion' => $c, 'pct' => round(($approved / $total) * 100), 'approved' => $approved, 'total' => $total];
        });
        $overallPct = $criteriaProgress->avg('pct');

        $pendingTasks    = NpTask::where('college_id', $cid)->whereIn('status', ['open', 'in_progress'])->count();
        $openTasks       = NpTask::where('college_id', $cid)->where('status', 'open')->with('criterion')->orderBy('due_date')->limit(5)->get();
        $recentDocs      = NpDocument::where('college_id', $cid)->with('uploader', 'metric')->latest()->limit(5)->get();
        $recentActivity  = NpActivityLog::where('college_id', $cid)->with('user')->orderByDesc('created_at')->limit(10)->get();
        $notifications   = NpPortalNotification::where('user_id', auth()->id())->where('is_read', false)->limit(5)->get();
        $aqarReports     = NpAqarReport::where('college_id', $cid)->latest()->limit(3)->get();

        // Missing docs: metrics with no documents and status not approved
        $missingDocs = NpMetricEntry::where('college_id', $cid)
            ->where('status', 'not_started')
            ->with('metric.criterion')
            ->limit(6)->get();

        $upcomingDeadlines = NpMetricEntry::where('college_id', $cid)
            ->whereNotNull('deadline')
            ->where('deadline', '>=', now())
            ->where('status', '!=', 'approved')
            ->orderBy('deadline')
            ->with('metric.criterion')
            ->limit(5)->get();

        return view('naac-portal.dashboard', compact(
            'criteriaProgress', 'overallPct', 'pendingTasks',
            'openTasks', 'recentDocs', 'recentActivity',
            'notifications', 'aqarReports', 'missingDocs', 'upcomingDeadlines'
        ));
    }
}
