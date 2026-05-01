<?php

namespace App\Http\Controllers;

use App\Models\AcademicProgramme;
use App\Models\AcademicDocument;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;

class AcademicsController extends Controller
{
    public function index()
    {
        $departments = Department::active()->orderBy('order')->get();
        return view('academics.index', compact('departments'));
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
        $departments = Department::active()->orderBy('order')->get();
        return view('academics.departments', compact('departments'));
    }

    public function department(string $slug)
    {
        $dept    = Department::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $faculty = Faculty::where('department', $slug)->where('is_active', true)->orderBy('order')->get();
        return view('academics.department', compact('dept', 'faculty'));
    }
}
