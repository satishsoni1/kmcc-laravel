<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Faculty;
use App\Models\Event;
use App\Models\Download;
use App\Models\AcademicProgramme;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = trim($request->get('q', ''));
        $announcements = collect();
        $faculty = collect();
        $events = collect();
        $downloads = collect();
        $programmes = collect();

        if (strlen($query) >= 2) {
            $like = "%{$query}%";

            $announcements = Announcement::active()
                ->where(fn($q) => $q->where('title', 'like', $like)->orWhere('content', 'like', $like))
                ->orderByDesc('created_at')->limit(8)->get();

            $faculty = Faculty::where('is_active', true)
                ->where(fn($q) => $q->where('name', 'like', $like)
                    ->orWhere('department', 'like', $like)
                    ->orWhere('designation', 'like', $like)
                    ->orWhere('specialization', 'like', $like))
                ->orderBy('name')->limit(8)->get();

            $events = Event::where('is_active', true)
                ->where(fn($q) => $q->where('title', 'like', $like)->orWhere('description', 'like', $like))
                ->orderByDesc('event_date')->limit(6)->get();

            $downloads = Download::where('is_active', true)
                ->where(fn($q) => $q->where('title', 'like', $like)->orWhere('category', 'like', $like))
                ->orderByDesc('created_at')->limit(6)->get();

            $programmes = AcademicProgramme::active()
                ->where(fn($q) => $q->where('name', 'like', $like)->orWhere('description', 'like', $like))
                ->limit(6)->get();
        }

        $totalResults = $announcements->count() + $faculty->count() + $events->count()
            + $downloads->count() + $programmes->count();

        return view('search.index', compact(
            'query', 'announcements', 'faculty', 'events', 'downloads', 'programmes', 'totalResults'
        ));
    }
}
