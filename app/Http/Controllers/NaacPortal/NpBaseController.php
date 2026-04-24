<?php
namespace App\Http\Controllers\NaacPortal;
use App\Http\Controllers\Controller;
use App\Models\NaacPortal\NpCollege;
use App\Models\NaacPortal\NpCriterion;
use App\Models\NaacPortal\NpPortalNotification;
use Illuminate\Support\Facades\View;
abstract class NpBaseController extends Controller {
    protected ?NpCollege $college = null;
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $collegeId = session('np_college_id');
            if ($collegeId) {
                $this->college = NpCollege::find($collegeId);
                $criteria      = NpCriterion::where('is_active', true)->orderBy('number')->get();
                $unreadCount   = auth()->check()
                    ? NpPortalNotification::where('user_id', auth()->id())->where('is_read', false)->count()
                    : 0;
                View::share('npCollege', $this->college);
                View::share('npCriteria', $criteria);
                View::share('npUnreadCount', $unreadCount);
                View::share('npPortalRole', session('np_portal_role', 'faculty'));
            }
            return $next($request);
        });
    }
    protected function collegeId(): int { return (int) session('np_college_id'); }
}
