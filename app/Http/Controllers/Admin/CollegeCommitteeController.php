<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CollegeCommittee;
use App\Models\CollegeCommitteeMember;
use Illuminate\Http\Request;

class CollegeCommitteeController extends Controller
{
    // ── Committees ────────────────────────────────────────────────────────────

    public function index(Request $request)
    {
        $category  = $request->get('category', 'naac_criteria');
        $committees = CollegeCommittee::withCount('members')
            ->where('category', $category)
            ->orderBy('sort_order')
            ->get();
        $categories = CollegeCommittee::$categories;
        return view('admin.college-committees.index', compact('committees', 'category', 'categories'));
    }

    public function create(Request $request)
    {
        $categories   = CollegeCommittee::$categories;
        $selectedCat  = $request->get('category', 'naac_criteria');
        return view('admin.college-committees.create', compact('categories', 'selectedCat'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'category'      => 'required|in:' . implode(',', array_keys(CollegeCommittee::$categories)),
            'academic_year' => 'required|string|max:20',
            'sort_order'    => 'required|integer|min:0',
            'is_active'     => 'boolean',
        ]);
        $data['is_active'] = $request->boolean('is_active', true);
        CollegeCommittee::create($data);
        return redirect()->route('admin.college-committees.index', ['category' => $data['category']])
            ->with('success', 'Committee created successfully.');
    }

    public function edit(CollegeCommittee $collegeCommittee)
    {
        $categories = CollegeCommittee::$categories;
        return view('admin.college-committees.edit', compact('collegeCommittee', 'categories'));
    }

    public function update(Request $request, CollegeCommittee $collegeCommittee)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'category'      => 'required|in:' . implode(',', array_keys(CollegeCommittee::$categories)),
            'academic_year' => 'required|string|max:20',
            'sort_order'    => 'required|integer|min:0',
            'is_active'     => 'boolean',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $collegeCommittee->update($data);
        return redirect()->route('admin.college-committees.index', ['category' => $data['category']])
            ->with('success', 'Committee updated successfully.');
    }

    public function destroy(CollegeCommittee $collegeCommittee)
    {
        $category = $collegeCommittee->category;
        $collegeCommittee->delete();
        return redirect()->route('admin.college-committees.index', ['category' => $category])
            ->with('success', 'Committee deleted.');
    }

    // ── Members ───────────────────────────────────────────────────────────────

    public function members(CollegeCommittee $collegeCommittee)
    {
        $members = $collegeCommittee->members()->orderBy('sort_order')->get();
        $roles   = CollegeCommitteeMember::$roles;
        return view('admin.college-committees.members', compact('collegeCommittee', 'members', 'roles'));
    }

    public function storeMember(Request $request, CollegeCommittee $collegeCommittee)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'role'          => 'required|in:' . implode(',', CollegeCommitteeMember::$roles),
            'serial_number' => 'required|integer|min:1',
            'sort_order'    => 'required|integer|min:0',
            'is_active'     => 'boolean',
        ]);
        $data['college_committee_id'] = $collegeCommittee->id;
        $data['is_active'] = $request->boolean('is_active', true);
        CollegeCommitteeMember::create($data);
        return redirect()->route('admin.college-committees.members', $collegeCommittee)
            ->with('success', 'Member added.');
    }

    public function editMember(CollegeCommittee $collegeCommittee, CollegeCommitteeMember $member)
    {
        $roles = CollegeCommitteeMember::$roles;
        return view('admin.college-committees.edit-member', compact('collegeCommittee', 'member', 'roles'));
    }

    public function updateMember(Request $request, CollegeCommittee $collegeCommittee, CollegeCommitteeMember $member)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'role'          => 'required|in:' . implode(',', CollegeCommitteeMember::$roles),
            'serial_number' => 'required|integer|min:1',
            'sort_order'    => 'required|integer|min:0',
            'is_active'     => 'boolean',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $member->update($data);
        return redirect()->route('admin.college-committees.members', $collegeCommittee)
            ->with('success', 'Member updated.');
    }

    public function destroyMember(CollegeCommittee $collegeCommittee, CollegeCommitteeMember $member)
    {
        $member->delete();
        return redirect()->route('admin.college-committees.members', $collegeCommittee)
            ->with('success', 'Member removed.');
    }
}
