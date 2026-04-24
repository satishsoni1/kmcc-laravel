<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $announcements = Announcement::where('is_active', true)->latest()->take(15)->get();
        $events = Event::where('is_active', true)->where('event_date', '>=', now())->orderBy('event_date')->take(6)->get();

        return view('home.index', compact('announcements', 'events'));
    }
}
