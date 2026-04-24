<?php

namespace App\Http\Controllers;

class ResearchController extends Controller
{
    public function index()          { return view('research.index'); }
    public function publications()   { return view('research.publications'); }
    public function projects()       { return view('research.projects'); }
    public function collaborations() { return view('research.collaborations'); }
}
