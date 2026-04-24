<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommitteeMember;
use Illuminate\Http\Request;

class CommitteeMemberController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type', 'governing_body');
        $members = CommitteeMember::where('committee_type', $type)
            ->orderBy('sort_order')
            ->get();
        $types = CommitteeMember::$types;
        return view('admin.committees.index', compact('members', 'type', 'types'));
    }

    public function create(Request $request)
    {
        $types = CommitteeMember::$types;
        $selectedType = $request->get('type', 'governing_body');
        return view('admin.committees.create', compact('types', 'selectedType'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'designation'    => 'required|string|max:255',
            'organization'   => 'nullable|string|max:255',
            'committee_type' => 'required|in:' . implode(',', array_keys(CommitteeMember::$types)),
            'role'           => 'nullable|string|max:255',
            'serial_number'  => 'required|integer|min:0',
            'sort_order'     => 'required|integer|min:0',
            'is_active'      => 'boolean',
        ]);
        $data['is_active'] = $request->boolean('is_active', true);
        CommitteeMember::create($data);
        return redirect()->route('admin.committees.index', ['type' => $data['committee_type']])
            ->with('success', 'Member added successfully.');
    }

    public function edit(CommitteeMember $committee)
    {
        $types = CommitteeMember::$types;
        return view('admin.committees.edit', compact('committee', 'types'));
    }

    public function update(Request $request, CommitteeMember $committee)
    {
        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'designation'    => 'required|string|max:255',
            'organization'   => 'nullable|string|max:255',
            'committee_type' => 'required|in:' . implode(',', array_keys(CommitteeMember::$types)),
            'role'           => 'nullable|string|max:255',
            'serial_number'  => 'required|integer|min:0',
            'sort_order'     => 'required|integer|min:0',
            'is_active'      => 'boolean',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $committee->update($data);
        return redirect()->route('admin.committees.index', ['type' => $data['committee_type']])
            ->with('success', 'Member updated successfully.');
    }

    public function destroy(CommitteeMember $committee)
    {
        $type = $committee->committee_type;
        $committee->delete();
        return redirect()->route('admin.committees.index', ['type' => $type])
            ->with('success', 'Member removed successfully.');
    }
}
