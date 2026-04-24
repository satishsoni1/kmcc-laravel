<?php

namespace App\Http\Controllers;

use App\Models\NaacDocument;
use Illuminate\Http\Request;

class NAACController extends Controller
{
    public function index() { return view('naac.index'); }

    public function ssr(Request $request)
    {
        $years = NaacDocument::ofType('ssr')->active()->whereNotNull('academic_year')->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year  = $request->get('year', $years->first());
        $docs  = NaacDocument::ofType('ssr')->active()->forYear($year)->orderBy('order')->get();
        return view('naac.ssr', compact('docs', 'years', 'year'));
    }

    public function grading(Request $request)
    {
        $years  = NaacDocument::ofType('grading')->active()->whereNotNull('academic_year')->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year   = $request->get('year', $years->first());
        $grades = NaacDocument::ofType('grading')->active()->forYear($year)->orderBy('order')->get();
        return view('naac.grading', compact('grades', 'years', 'year'));
    }

    public function peerTeamReport(Request $request)
    {
        $years = NaacDocument::ofType('peer_team_report')->active()->whereNotNull('academic_year')->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year  = $request->get('year', $years->first());
        $docs  = NaacDocument::ofType('peer_team_report')->active()->forYear($year)->orderBy('order')->get();
        return view('naac.peer-team-report', compact('docs', 'years', 'year'));
    }
}
