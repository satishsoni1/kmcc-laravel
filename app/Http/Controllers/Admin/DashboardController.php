<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Faculty;
use App\Models\GalleryItem;
use App\Models\Download;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'announcements' => Announcement::count(),
            'events'        => Event::where('event_date', '>=', now())->count(),
            'faculty'       => Faculty::where('is_active', true)->count(),
            'gallery'       => GalleryItem::count(),
            'downloads'     => Download::count(),
        ];

        $recentAnnouncements = Announcement::latest()->take(5)->get();
        $upcomingEvents      = Event::where('event_date', '>=', now())->orderBy('event_date')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentAnnouncements', 'upcomingEvents'));
    }
}
