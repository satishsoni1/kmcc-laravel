<?php
namespace App\Http\Controllers\NaacPortal;
use App\Http\Controllers\Controller;
use App\Models\NaacPortal\NpCollege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NpAuthController extends Controller {
    public function loginForm() {
        if (Auth::check()) return $this->afterLogin();
        return view('naac-portal.auth.login');
    }
    public function login(Request $request) {
        $request->validate(['email' => 'required|email', 'password' => 'required']);
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
        }
        $user = Auth::user();
        $cu = \DB::table('np_college_user')->where('user_id', $user->id)->where('is_active', true)->first();
        if ($cu) {
            session(['np_college_id' => $cu->college_id, 'np_portal_role' => $cu->portal_role]);
        } else {
            Auth::logout();
            return back()->withErrors(['email' => 'You are not assigned to any college on the NAAC Portal. Contact your IQAC coordinator.'])->withInput();
        }
        return $this->afterLogin();
    }
    public function logout(Request $request) {
        session()->forget(['np_college_id', 'np_portal_role']);
        return redirect()->route('np.login')->with('success', 'Logged out successfully.');
    }
    private function afterLogin() {
        return redirect()->route('np.dashboard');
    }
}
