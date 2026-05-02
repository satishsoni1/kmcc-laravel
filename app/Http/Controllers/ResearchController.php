<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\ResearchArticle;

class ResearchController extends Controller
{
    public function index()
    {
        return view('research.index');
    }

    public function publications()
    {
        $articles = ResearchArticle::active()
            ->with('department')
            ->orderBy('year', 'desc')
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy('year');

        $departments = Department::active()->orderBy('order')->get();

        return view('research.publications', compact('articles', 'departments'));
    }

    public function projects()       { return view('research.projects'); }
    public function collaborations() { return view('research.collaborations'); }
}
