<?php

namespace App\Http\Controllers;

use App\Models\CommitteeMember;
use App\Models\CollegeCommittee;

class GovernanceController extends Controller
{
    public function index()
    {
        return view('governance.index');
    }

    public function governingBody()
    {
        $members = CommitteeMember::active()->forType('governing_body')->orderBy('sort_order')->get();
        return view('governance.governing-body', compact('members'));
    }

    public function financeCommittee()
    {
        $members = CommitteeMember::active()->forType('finance_committee')->orderBy('sort_order')->get();
        return view('governance.finance-committee', compact('members'));
    }

    public function academicCouncil()
    {
        $members = CommitteeMember::active()->forType('academic_council')->orderBy('sort_order')->get();
        return view('governance.academic-council', compact('members'));
    }

    public function boardOfStudies()
    {
        $members = CommitteeMember::active()->forType('board_of_studies')->orderBy('sort_order')->get();
        return view('governance.board-of-studies', compact('members'));
    }

    public function cdc()
    {
        $members = CommitteeMember::active()->forType('cdc')->orderBy('sort_order')->get();
        return view('governance.cdc', compact('members'));
    }

    public function autonomyCommittee()
    {
        $members = CommitteeMember::active()->forType('autonomy')->orderBy('sort_order')->get();
        return view('governance.autonomy', compact('members'));
    }

    public function naacCommittees()
    {
        $committees = CollegeCommittee::with(['activeMembers'])
            ->active()->forCategory('naac_criteria')->orderBy('sort_order')->get();
        return view('governance.naac-committees', compact('committees'));
    }

    public function otherCommittees()
    {
        $committees = CollegeCommittee::with(['activeMembers'])
            ->active()->forCategory('other')->orderBy('sort_order')->get();
        return view('governance.other-committees', compact('committees'));
    }
}
