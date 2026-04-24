<?php

namespace App\Http\Controllers;

use App\Models\ExamDocument;
use Illuminate\Http\Request;

class ExaminationsController extends Controller
{
    public function index()              { return view('examinations.index'); }
    public function cell()               { return view('examinations.cell'); }
    public function rules()              { return view('examinations.rules'); }
    public function schemeOfEvaluation() { return view('examinations.scheme'); }
    public function revaluation()        { return view('examinations.revaluation'); }

    public function calendar(Request $request)
    {
        $years = ExamDocument::ofType('calendar')->active()->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year  = $request->get('year', $years->first());
        $docs  = ExamDocument::ofType('calendar')->active()->forYear($year)->orderBy('order')->get();
        return view('examinations.calendar', compact('docs', 'years', 'year'));
    }

    public function examForm(Request $request)
    {
        $years = ExamDocument::ofType('exam_form')->active()->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year  = $request->get('year', $years->first());
        $docs  = ExamDocument::ofType('exam_form')->active()->forYear($year)->orderBy('order')->get();
        return view('examinations.exam-form', compact('docs', 'years', 'year'));
    }

    public function hallTicket(Request $request)
    {
        $years = ExamDocument::ofType('hall_ticket')->active()->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year  = $request->get('year', $years->first());
        $docs  = ExamDocument::ofType('hall_ticket')->active()->forYear($year)->orderBy('order')->get();
        return view('examinations.hall-ticket', compact('docs', 'years', 'year'));
    }

    public function results(Request $request)
    {
        $years = ExamDocument::ofType('result')->active()->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year  = $request->get('year', $years->first());
        $docs  = ExamDocument::ofType('result')->active()->forYear($year)->orderBy('programme')->orderBy('order')->get()->groupBy('programme');
        return view('examinations.results', compact('docs', 'years', 'year'));
    }

    public function grievance()
    {
        return view('examinations.grievance');
    }
}
