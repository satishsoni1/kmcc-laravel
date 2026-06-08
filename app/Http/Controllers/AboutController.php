<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\CommitteeMember;
use App\Models\CollegeCommittee;
use App\Models\OfficeStaff;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about.index');
    }

    public function sanstha()
    {
        return view('about.sanstha');
    }

    public function emblem()
    {
        return view('about.emblem');
    }

    public function vision()
    {
        return view('about.vision');
    }

    public function mission()
    {
        return view('about.mission');
    }

    public function goals()
    {
        return view('about.goals');
    }

    public function college()
    {
        return view('about.college');
    }

    public function chairmanDesk()
    {
        return view('about.chairman');
    }

    public function vcDesk()
    {
        return view('about.vc');
    }
    public function vcCdcDesk()
    {
        return view('about.vc-cdc');
    }

    public function principalDesk()
    {
        return view('about.principal');
    }

    public function secretaryDesk()
    {
        return view('about.secretary');
    }

    public function team()
    {
        $faculty = Faculty::where('is_active', true)->orderBy('order')->get()->groupBy('department');
        return view('about.team', compact('faculty'));
    }

    public function facilities()
    {
        return view('about.facilities');
    }

    public function committees()
    {
        $naac = CollegeCommittee::with(['activeMembers'])
            ->active()->forCategory('naac_criteria')->orderBy('sort_order')->get();
        $other = CollegeCommittee::with(['activeMembers'])
            ->active()->forCategory('other')->orderBy('sort_order')->get();
        return view('about.committees', compact('naac', 'other'));
    }

    public function boardOfExecutives()
    {
        $members = CommitteeMember::active()->forType('governing_body')
            ->orderBy('sort_order')->get();
        return view('about.board', compact('members'));
    }

    public function institutions()
    {
        return view('about.institutions');
    }

    public function officeStaff()
    {
        $staff = OfficeStaff::active()->orderBy('order')->orderBy('id')->get();
        return view('about.office-staff', compact('staff'));
    }
}
