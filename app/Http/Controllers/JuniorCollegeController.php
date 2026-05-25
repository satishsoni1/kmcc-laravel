<?php

namespace App\Http\Controllers;

use App\Models\JuniorCollegeStaff;

class JuniorCollegeController extends Controller
{
    public function index()
    {
        return view('junior-college.index');
    }

    public function subjects()
    {
        return view('junior-college.subjects');
    }

    public function teachingStaff()
    {
        $staff = JuniorCollegeStaff::active()->orderBy('order')->orderBy('id')->get();
        return view('junior-college.teaching-staff', compact('staff'));
    }

    public function admissionsXI()
    {
        return view('junior-college.admissions-xi');
    }

    public function admissionsXII()
    {
        return view('junior-college.admissions-xii');
    }

    public function scholarships()
    {
        return view('junior-college.scholarships');
    }
}
