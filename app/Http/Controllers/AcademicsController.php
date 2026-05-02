<?php

namespace App\Http\Controllers;

use App\Models\AcademicDocument;
use App\Models\AcademicProgramme;
use App\Models\Department;
use App\Models\DepartmentGallery;
use App\Models\Faculty;
use App\Models\ResearchArticle;
use Illuminate\Http\Request;

class AcademicsController extends Controller
{
    private const STREAMS = [
        'arts'     => ['label' => 'Faculty of Arts',      'icon' => 'fa-theater-masks', 'bg' => 'bg-purple-100', 'text' => 'text-purple-700', 'desc' => 'Languages, Social Sciences & Humanities'],
        'science'  => ['label' => 'Faculty of Science',   'icon' => 'fa-flask',         'bg' => 'bg-green-100',  'text' => 'text-green-700',  'desc' => 'Pure & Applied Sciences'],
        'commerce' => ['label' => 'Faculty of Commerce',  'icon' => 'fa-chart-line',    'bg' => 'bg-blue-100',   'text' => 'text-blue-700',   'desc' => 'Business, Accounting & Management'],
        'inter'    => ['label' => 'Interdisciplinary',    'icon' => 'fa-layer-group',   'bg' => 'bg-orange-100', 'text' => 'text-orange-700', 'desc' => 'Cross-disciplinary Programmes'],
    ];

    public function index()
    {
        $counts  = Department::active()->get()->groupBy('faculty_group')->map->count();
        $streams = collect(self::STREAMS)->map(function ($info, $group) use ($counts) {
            return array_merge($info, ['group' => $group, 'count' => $counts->get($group, 0)]);
        })->values();

        return view('academics.index', compact('streams'));
    }

    public function stream(string $group)
    {
        abort_unless(array_key_exists($group, self::STREAMS), 404);

        $info        = self::STREAMS[$group];
        $departments = Department::active()->where('faculty_group', $group)->orderBy('order')->get();

        return view('academics.stream', [
            'departments' => $departments,
            'streamLabel' => $info['label'],
            'streamIcon'  => $info['icon'],
            'streamBg'    => $info['bg'],
            'streamText'  => $info['text'],
        ]);
    }

    public function departments()
    {
        return redirect()->route('academics.index');
    }

    public function department(string $slug)
    {
        $dept        = Department::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $streamInfo  = self::STREAMS[$dept->faculty_group] ?? ['label' => 'Academics'];
        $streamLabel = $streamInfo['label'];

        $teaching    = Faculty::where('department', $slug)->where('is_active', true)
                           ->where('staff_type', 'teaching')->orderBy('order')->get();
        $nonTeaching = Faculty::where('department', $slug)->where('is_active', true)
                           ->where('staff_type', 'non_teaching')->orderBy('order')->get();
        $research    = ResearchArticle::active()->where('department_slug', $slug)
                           ->orderBy('year', 'desc')->orderBy('id', 'desc')->get();
        $gallery     = DepartmentGallery::active()->where('department_slug', $slug)->orderBy('order')->get();

        return view('academics.department', compact(
            'dept', 'streamLabel', 'teaching', 'nonTeaching', 'research', 'gallery'
        ));
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
}
