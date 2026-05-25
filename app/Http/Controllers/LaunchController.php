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
        $principalToken = SiteSetting::get('launch_token_principal');
        $chairmanToken  = SiteSetting::get('launch_token_chairman');

        if ($token === $principalToken) {
            $role = 'principal';
        } elseif ($token === $chairmanToken) {
            $role = 'chairman';
        } else {
            abort(403, 'Invalid ceremony token.');
        }

        $principalName = SiteSetting::get('launch_principal_name', 'Principal');
        $chairmanName  = SiteSetting::get('launch_chairman_name', 'Chairman');

        return view('launch.ceremony', compact('role', 'token', 'principalName', 'chairmanName'));
    }

    public function display()
    {
        $principalName = SiteSetting::get('launch_principal_name', 'Principal');
        $chairmanName  = SiteSetting::get('launch_chairman_name', 'Chairman');
        return view('launch.audience', compact('principalName', 'chairmanName'));
    }

    public function press(Request $request)
    {
        $request->validate(['token' => 'required|string']);

        $token          = $request->input('token');
        $principalToken = SiteSetting::get('launch_token_principal');
        $chairmanToken  = SiteSetting::get('launch_token_chairman');

        if ($token === $principalToken) {
            $role = 'principal';
        } elseif ($token === $chairmanToken) {
            $role = 'chairman';
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

        // Check if both have pressed
        $principalPressed = SiteSetting::get('launch_principal_pressed_at');
        $chairmanPressed  = SiteSetting::get('launch_chairman_pressed_at');

        if ($principalPressed && $chairmanPressed) {
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
        $principalPressed = SiteSetting::get('launch_principal_pressed_at');
        $chairmanPressed  = SiteSetting::get('launch_chairman_pressed_at');
        $completedAt      = SiteSetting::get('launch_completed_at');

        if ($completedAt) {
            $state = 'launched';
        } elseif ($principalPressed && $chairmanPressed) {
            $state = 'both_pressed';
        } elseif ($principalPressed) {
            $state = 'principal_pressed';
        } elseif ($chairmanPressed) {
            $state = 'chairman_pressed';
        } else {
            $state = 'idle';
        }

        return [
            'state'             => $state,
            'principal_pressed' => (bool) $principalPressed,
            'chairman_pressed'  => (bool) $chairmanPressed,
            'launched_at'       => $completedAt ?: null,
            'principal_name'    => SiteSetting::get('launch_principal_name', 'Principal'),
            'chairman_name'     => SiteSetting::get('launch_chairman_name', 'Chairman'),
        ];
    }
}
