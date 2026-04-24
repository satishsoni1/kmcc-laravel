<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentCouncil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentCouncilController extends Controller
{
    public function index(Request $request)
    {
        $years = StudentCouncil::select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $query = StudentCouncil::query();
        if ($request->filled('year')) $query->where('academic_year', $request->year);
        $members = $query->orderBy('academic_year', 'desc')->orderBy('order')->paginate(25)->withQueryString();
        return view('admin.student-council.index', compact('members', 'years'));
    }

    public function create()
    {
        return view('admin.student-council.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'position'      => 'required|string|max:255',
            'programme'     => 'nullable|string|max:255',
            'academic_year' => 'required|string|max:20',
            'bio'           => 'nullable|string',
            'is_active'     => 'boolean',
            'order'         => 'nullable|integer|min:0',
            'photo'         => 'nullable|image|max:3072',
        ]);
        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('student-council', 'public');
        }
        $data['is_active'] = $request->boolean('is_active', true);
        $data['order']     = $data['order'] ?? 0;
        StudentCouncil::create($data);
        return redirect()->route('admin.student-council.index')->with('success', 'Member added.');
    }

    public function edit(StudentCouncil $studentCouncil)
    {
        return view('admin.student-council.form', ['member' => $studentCouncil]);
    }

    public function update(Request $request, StudentCouncil $studentCouncil)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'position'      => 'required|string|max:255',
            'programme'     => 'nullable|string|max:255',
            'academic_year' => 'required|string|max:20',
            'bio'           => 'nullable|string',
            'is_active'     => 'boolean',
            'order'         => 'nullable|integer|min:0',
            'photo'         => 'nullable|image|max:3072',
        ]);
        if ($request->hasFile('photo')) {
            if ($studentCouncil->photo_path) Storage::disk('public')->delete($studentCouncil->photo_path);
            $data['photo_path'] = $request->file('photo')->store('student-council', 'public');
        }
        $data['is_active'] = $request->boolean('is_active');
        $studentCouncil->update($data);
        return redirect()->route('admin.student-council.index')->with('success', 'Member updated.');
    }

    public function destroy(StudentCouncil $studentCouncil)
    {
        if ($studentCouncil->photo_path) Storage::disk('public')->delete($studentCouncil->photo_path);
        $studentCouncil->delete();
        return redirect()->route('admin.student-council.index')->with('success', 'Member deleted.');
    }
}
