<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Banner;
use App\Models\Event;
use App\Models\GalleryItem;

class HomeController extends Controller
{
    public function index()
    {
        $announcements = Announcement::where('is_active', true)->latest()->take(15)->get();
        $events        = Event::where('is_active', true)->where('event_date', '>=', now())->orderBy('event_date')->take(6)->get();
        $banners       = Banner::active()->get();
        $galleryItems  = GalleryItem::where('is_active', true)->orderBy('order')->latest()->take(8)->get();

        return view('home.index', compact('announcements', 'events', 'banners', 'galleryItems'));
    }
}
