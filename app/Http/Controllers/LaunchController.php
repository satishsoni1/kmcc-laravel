<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class LaunchController extends Controller
{
    public function comingSoon()
    {
        if (SiteSetting::get('launch_mode') === 'live') {
            return redirect('/');
        }

        $eventDate = SiteSetting::get('launch_event_date');
        $eventTime = SiteSetting::get('launch_event_time', '00:00');

        return view('launch.coming-soon', compact('eventDate', 'eventTime'));
    }

    public function ceremony(Request $request)
    {
        $token = $request->query('token');
        $m1Token = SiteSetting::get('launch_token_member1');
        $m2Token = SiteSetting::get('launch_token_member2');
        $m3Token = SiteSetting::get('launch_token_member3');
        $m4Token = SiteSetting::get('launch_token_member4');

        if ($token && $token === $m1Token) {
            $role = 'member1';
        } elseif ($token && $token === $m2Token) {
            $role = 'member2';
        } elseif ($token && $token === $m3Token) {
            $role = 'member3';
        } elseif ($token && $token === $m4Token) {
            $role = 'member4';
        } else {
            abort(403, 'Invalid ceremony token.');
        }

        $member1Name = SiteSetting::get('launch_member1_name', 'Member 1');
        $member2Name = SiteSetting::get('launch_member2_name', 'Member 2');
        $member3Name = SiteSetting::get('launch_member3_name', 'Member 3');
        $member4Name = SiteSetting::get('launch_member4_name', 'Member 4');

        return view('launch.ceremony', compact('role', 'token', 'member1Name', 'member2Name', 'member3Name', 'member4Name'));
    }

    public function display()
    {
        $member1Name = SiteSetting::get('launch_member1_name', 'Member 1');
        $member2Name = SiteSetting::get('launch_member2_name', 'Member 2');
        $member3Name = SiteSetting::get('launch_member3_name', 'Member 3');
        $member4Name = SiteSetting::get('launch_member4_name', 'Member 4');

        return view('launch.audience', compact('member1Name', 'member2Name', 'member3Name', 'member4Name'));
    }

    public function press(Request $request)
    {
        $request->validate(['token' => 'required|string']);

        $token   = $request->input('token');
        $m1Token = SiteSetting::get('launch_token_member1');
        $m2Token = SiteSetting::get('launch_token_member2');
        $m3Token = SiteSetting::get('launch_token_member3');
        $m4Token = SiteSetting::get('launch_token_member4');

        if ($token && $token === $m1Token) {
            $role = 'member1';
        } elseif ($token && $token === $m2Token) {
            $role = 'member2';
        } elseif ($token && $token === $m3Token) {
            $role = 'member3';
        } elseif ($token && $token === $m4Token) {
            $role = 'member4';
        } else {
            return response()->json(['error' => 'Invalid token'], 403);
        }

        // Already launched — idempotent
        if (SiteSetting::get('launch_completed_at')) {
            return response()->json($this->buildState());
        }

        // Record the press
        $pressedKey = "launch_{$role}_pressed_at";
        if (!SiteSetting::get($pressedKey)) {
            SiteSetting::set($pressedKey, now()->toIso8601String());
        }

        // Check if all 4 have pressed
        $m1Pressed = SiteSetting::get('launch_member1_pressed_at');
        $m2Pressed = SiteSetting::get('launch_member2_pressed_at');
        $m3Pressed = SiteSetting::get('launch_member3_pressed_at');
        $m4Pressed = SiteSetting::get('launch_member4_pressed_at');

        if ($m1Pressed && $m2Pressed && $m3Pressed && $m4Pressed) {
            SiteSetting::set('launch_completed_at', now()->toIso8601String());
            SiteSetting::set('launch_mode', 'live');
        }

        return response()->json($this->buildState());
    }

    public function status()
    {
        return response()->json($this->buildState());
    }

    private function buildState(): array
    {
        $m1Pressed = SiteSetting::get('launch_member1_pressed_at');
        $m2Pressed = SiteSetting::get('launch_member2_pressed_at');
        $m3Pressed = SiteSetting::get('launch_member3_pressed_at');
        $m4Pressed = SiteSetting::get('launch_member4_pressed_at');
        $completedAt = SiteSetting::get('launch_completed_at');

        $pressedCount = 0;
        if ($m1Pressed) $pressedCount++;
        if ($m2Pressed) $pressedCount++;
        if ($m3Pressed) $pressedCount++;
        if ($m4Pressed) $pressedCount++;

        if ($completedAt) {
            $state = 'launched';
        } elseif ($pressedCount === 4) {
            $state = 'all_pressed';
        } else {
            $state = $pressedCount > 0 ? 'partially_pressed' : 'idle';
        }

        return [
            'state'             => $state,
            'pressed_count'     => $pressedCount,
            'member1_pressed'   => (bool) $m1Pressed,
            'member2_pressed'   => (bool) $m2Pressed,
            'member3_pressed'   => (bool) $m3Pressed,
            'member4_pressed'   => (bool) $m4Pressed,
            'launched_at'       => $completedAt ?: null,
            'member1_name'      => SiteSetting::get('launch_member1_name', 'Member 1'),
            'member2_name'      => SiteSetting::get('launch_member2_name', 'Member 2'),
            'member3_name'      => SiteSetting::get('launch_member3_name', 'Member 3'),
            'member4_name'      => SiteSetting::get('launch_member4_name', 'Member 4'),
        ];
    }
}
