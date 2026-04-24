<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NaacPortal\NpCollege;
class NaacPortalAuth {
    public function handle(Request $request, Closure $next, string ...$roles) {
        if (!Auth::check()) {
            return redirect()->route('np.login')->with('error', 'Please log in to access the NAAC Portal.');
        }
        $user = Auth::user();
        // Check portal role assignment first
        $collegeId = session('np_college_id');
        if (!$collegeId) {
            $cu = \DB::table('np_college_user')->where('user_id', $user->id)->where('is_active', true)->first();
            if ($cu) {
                session(['np_college_id' => $cu->college_id, 'np_portal_role' => $cu->portal_role]);
                $collegeId = $cu->college_id;
            }
        }
        $portalRole = session('np_portal_role', '');
        // Super admin portal role bypasses everything
        if ($portalRole === 'super_admin') {
            $this->ensureCollegeSession($request, $user);
            return $next($request);
        }
        if (!$collegeId) {
            return redirect()->route('np.login')->with('error', 'You are not assigned to any college on the NAAC Portal.');
        }
        if (!empty($roles)) {
            $portalRole = session('np_portal_role');
            if (!in_array($portalRole, $roles)) {
                abort(403, 'You do not have permission to access this section.');
            }
        }
        return $next($request);
    }
    private function ensureCollegeSession(Request $request, $user): void {
        if (!session('np_college_id')) {
            $college = NpCollege::where('is_active', true)->first();
            if ($college) session(['np_college_id' => $college->id, 'np_portal_role' => 'super_admin']);
        }
    }
}
