<?php

namespace App\Http\Controllers;

use App\Models\CommitteeMember;
use App\Models\IqacDocument;
use Illuminate\Http\Request;

class IQACController extends Controller
{
    public function index()    { return view('iqac.index'); }
    public function about()    { return view('iqac.about'); }
    public function objectives() { return view('iqac.objectives'); }

    public function composition()
    {
        $members = CommitteeMember::active()->forType('iqac')->orderBy('sort_order')->get();
        return view('iqac.composition', compact('members'));
    }

    public function bestPractices() { return view('iqac.best-practices'); }

    public function aqar(Request $request)
    {
        $years = IqacDocument::ofType('aqar')->active()->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year  = $request->get('year', $years->first());
        $docs  = IqacDocument::ofType('aqar')->active()->forYear($year)->orderBy('order')->get();
        return view('iqac.aqar', compact('docs', 'years', 'year'));
    }

    public function calendar(Request $request)
    {
        $years = IqacDocument::ofType('activity_calendar')->active()->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year  = $request->get('year', $years->first());
        $docs  = IqacDocument::ofType('activity_calendar')->active()->forYear($year)->orderBy('order')->get();
        return view('iqac.calendar', compact('docs', 'years', 'year'));
    }

    public function sss(Request $request)
    {
        $years = IqacDocument::ofType('sss_report')->active()->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year  = $request->get('year', $years->first());
        $docs  = IqacDocument::ofType('sss_report')->active()->forYear($year)->orderBy('order')->get();
        return view('iqac.sss', compact('docs', 'years', 'year'));
    }

    public function minutes(Request $request)
    {
        $years = IqacDocument::ofType('meeting_minutes')->active()->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year  = $request->get('year', $years->first());
        $docs  = IqacDocument::ofType('meeting_minutes')->active()->forYear($year)->orderBy('order')->get();
        return view('iqac.minutes', compact('docs', 'years', 'year'));
    }

    public function policies(Request $request)
    {
        $docs = IqacDocument::ofType('policy')->active()->orderBy('order')->get();
        return view('iqac.policies', compact('docs'));
    }

    public function perspectivePlan() { return view('iqac.perspective-plan'); }
    public function distinctiveness()  { return view('iqac.distinctiveness'); }
}
