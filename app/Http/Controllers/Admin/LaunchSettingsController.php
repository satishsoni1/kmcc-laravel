<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LaunchSettingsController extends Controller
{
    public function index()
    {
        $config = [
            'launch_mode'            => SiteSetting::get('launch_mode', 'live'),
            'launch_principal_name'  => SiteSetting::get('launch_principal_name'),
            'launch_chairman_name'   => SiteSetting::get('launch_chairman_name'),
            'launch_event_date'      => SiteSetting::get('launch_event_date'),
            'launch_event_time'      => SiteSetting::get('launch_event_time', '10:00'),
            'launch_token_principal' => SiteSetting::get('launch_token_principal'),
            'launch_token_chairman'  => SiteSetting::get('launch_token_chairman'),
            'launch_principal_pressed_at' => SiteSetting::get('launch_principal_pressed_at'),
            'launch_chairman_pressed_at'  => SiteSetting::get('launch_chairman_pressed_at'),
            'launch_completed_at'    => SiteSetting::get('launch_completed_at'),
        ];

        return view('admin.launch.index', compact('config'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'launch_mode'           => 'required|in:coming_soon,live',
            'launch_principal_name' => 'required|string|max:255',
            'launch_chairman_name'  => 'required|string|max:255',
            'launch_event_date'     => 'nullable|date',
            'launch_event_time'     => 'nullable|string|max:10',
        ]);

        foreach ($data as $key => $value) {
            SiteSetting::set($key, $value ?? '');
        }

        return back()->with('success', 'Launch settings saved.');
    }

    public function generateTokens()
    {
        $principalToken = strtoupper(Str::random(4)) . rand(100, 999);
        $chairmanToken  = strtoupper(Str::random(4)) . rand(100, 999);

        SiteSetting::set('launch_token_principal', $principalToken);
        SiteSetting::set('launch_token_chairman', $chairmanToken);

        // Clear any previous presses
        SiteSetting::set('launch_principal_pressed_at', '');
        SiteSetting::set('launch_chairman_pressed_at', '');
        SiteSetting::set('launch_completed_at', '');

        return back()->with('success', "New tokens generated: Principal = {$principalToken} | Chairman = {$chairmanToken}");
    }

    public function reset()
    {
        SiteSetting::set('launch_principal_pressed_at', '');
        SiteSetting::set('launch_chairman_pressed_at', '');
        SiteSetting::set('launch_completed_at', '');

        return back()->with('success', 'Ceremony state reset. Both keys are cleared.');
    }

    public function markLive()
    {
        SiteSetting::set('launch_mode', 'live');
        SiteSetting::set('launch_completed_at', now()->toIso8601String());

        return back()->with('success', 'Website marked as LIVE.');
    }
}
