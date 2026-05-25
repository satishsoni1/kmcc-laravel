<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JuniorCollegeStaff;
use Illuminate\Http\Request;

class JuniorCollegeStaffController extends Controller
{
    public function index()
    {
        $staff = JuniorCollegeStaff::orderBy('order')->orderBy('id')->get();
        return view('admin.junior-college-staff.index', compact('staff'));
    }

    public function create()
    {
        return view('admin.junior-college-staff.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'designation'   => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'subjects'      => 'required|string|max:255',
            'order'         => 'nullable|integer|min:0',
            'is_active'     => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);
        $data['order']     = $data['order'] ?? 0;

        JuniorCollegeStaff::create($data);

        return redirect()->route('admin.junior-college-staff.index')
            ->with('success', 'Staff member added successfully.');
    }

    public function edit(JuniorCollegeStaff $juniorCollegeStaff)
    {
        return view('admin.junior-college-staff.edit', ['staff' => $juniorCollegeStaff]);
    }

    public function update(Request $request, JuniorCollegeStaff $juniorCollegeStaff)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'designation'   => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'subjects'      => 'required|string|max:255',
            'order'         => 'nullable|integer|min:0',
            'is_active'     => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['order']     = $data['order'] ?? 0;

        $juniorCollegeStaff->update($data);

        return redirect()->route('admin.junior-college-staff.index')
            ->with('success', 'Staff member updated successfully.');
    }

    public function destroy(JuniorCollegeStaff $juniorCollegeStaff)
    {
        $juniorCollegeStaff->delete();
        return redirect()->route('admin.junior-college-staff.index')
            ->with('success', 'Staff member deleted.');
    }
}
