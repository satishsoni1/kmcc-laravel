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
            'launch_member1_name'    => SiteSetting::get('launch_member1_name'),
            'launch_member2_name'    => SiteSetting::get('launch_member2_name'),
            'launch_member3_name'    => SiteSetting::get('launch_member3_name'),
            'launch_member4_name'    => SiteSetting::get('launch_member4_name'),
            'launch_event_date'      => SiteSetting::get('launch_event_date'),
            'launch_event_time'      => SiteSetting::get('launch_event_time', '10:00'),
            'launch_token_member1'   => SiteSetting::get('launch_token_member1'),
            'launch_token_member2'   => SiteSetting::get('launch_token_member2'),
            'launch_token_member3'   => SiteSetting::get('launch_token_member3'),
            'launch_token_member4'   => SiteSetting::get('launch_token_member4'),
            'launch_member1_pressed_at' => SiteSetting::get('launch_member1_pressed_at'),
            'launch_member2_pressed_at' => SiteSetting::get('launch_member2_pressed_at'),
            'launch_member3_pressed_at' => SiteSetting::get('launch_member3_pressed_at'),
            'launch_member4_pressed_at' => SiteSetting::get('launch_member4_pressed_at'),
            'launch_completed_at'    => SiteSetting::get('launch_completed_at'),
        ];

        return view('admin.launch.index', compact('config'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'launch_mode'          => 'required|in:coming_soon,live',
            'launch_member1_name'  => 'required|string|max:255',
            'launch_member2_name'  => 'required|string|max:255',
            'launch_member3_name'  => 'required|string|max:255',
            'launch_member4_name'  => 'required|string|max:255',
            'launch_event_date'    => 'nullable|date',
            'launch_event_time'    => 'nullable|string|max:10',
        ]);

        foreach ($data as $key => $value) {
            SiteSetting::set($key, $value ?? '');
        }

        return back()->with('success', 'Launch settings saved.');
    }

    public function generateTokens()
    {
        $m1Token = strtoupper(Str::random(4)) . rand(100, 999);
        $m2Token = strtoupper(Str::random(4)) . rand(100, 999);
        $m3Token = strtoupper(Str::random(4)) . rand(100, 999);
        $m4Token = strtoupper(Str::random(4)) . rand(100, 999);

        SiteSetting::set('launch_token_member1', $m1Token);
        SiteSetting::set('launch_token_member2', $m2Token);
        SiteSetting::set('launch_token_member3', $m3Token);
        SiteSetting::set('launch_token_member4', $m4Token);

        // Clear any previous presses
        SiteSetting::clearPreviousPresses();

        return back()->with('success', "New tokens generated successfully for all 4 members.");
    }

    public function reset()
    {
        SiteSetting::clearPreviousPresses();

        return back()->with('success', 'Ceremony state reset. All 4 keys are cleared.');
    }

    public function markLive()
    {
        SiteSetting::set('launch_mode', 'live');
        SiteSetting::set('launch_completed_at', now()->toIso8601String());

        return back()->with('success', 'Website marked as LIVE.');
    }
}
