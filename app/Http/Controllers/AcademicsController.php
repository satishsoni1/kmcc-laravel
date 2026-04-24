<?php

namespace App\Http\Controllers;

use App\Models\AcademicProgramme;
use App\Models\AcademicDocument;
use Illuminate\Http\Request;

class AcademicsController extends Controller
{
    private array $departments = [
        'arts'     => ['name' => 'Faculty of Arts',           'icon' => 'fa-theater-masks', 'color' => 'blue'],
        'commerce' => ['name' => 'Faculty of Commerce',       'icon' => 'fa-chart-line',    'color' => 'green'],
        'science'  => ['name' => 'Faculty of Science',        'icon' => 'fa-flask',         'color' => 'purple'],
        'inter'    => ['name' => 'Interdisciplinary Studies', 'icon' => 'fa-globe',         'color' => 'orange'],
    ];

    public function index()
    {
        return view('academics.index', ['departments' => $this->departments]);
    }

    public function programs()
    {
        $programmes = AcademicProgramme::active()->orderBy('order')->orderBy('name')->get()->groupBy('level');
        return view('academics.programs', compact('programmes'));
    }

    public function calendar(Request $request)
    {
        $years     = AcademicDocument::ofType('academic_calendar')->active()->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year      = $request->get('year', $years->first());
        $calendars = AcademicDocument::ofType('academic_calendar')->active()->forYear($year)->orderBy('order')->get();
        return view('academics.calendar', compact('calendars', 'years', 'year'));
    }

    public function timetable(Request $request)
    {
        $years      = AcademicDocument::whereIn('type', ['timetable', 'class_timetable'])->active()->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year       = $request->get('year', $years->first());
        $timetables = AcademicDocument::whereIn('type', ['timetable', 'class_timetable'])->active()->forYear($year)->orderBy('type')->orderBy('order')->get();
        return view('academics.timetable', compact('timetables', 'years', 'year'));
    }

    public function syllabus(Request $request)
    {
        $years   = AcademicDocument::ofType('syllabus')->active()->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year    = $request->get('year', $years->first());
        $syllabi = AcademicDocument::ofType('syllabus')->active()->forYear($year)->orderBy('programme')->orderBy('order')->get()->groupBy('programme');
        return view('academics.syllabus', compact('syllabi', 'years', 'year'));
    }

    public function outcomes()
    {
        return view('academics.outcomes');
    }

    public function departments()
    {
        return view('academics.departments', ['departments' => $this->departments]);
    }

    public function department(string $slug)
    {
        $dept = $this->departments[$slug] ?? abort(404);
        return view('academics.department', ['dept' => $dept, 'slug' => $slug]);
    }
}
