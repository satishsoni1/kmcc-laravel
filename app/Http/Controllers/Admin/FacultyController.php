<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacultyController extends Controller
{
    public function index()
    {
        $faculty = Faculty::orderBy('staff_type')->orderBy('department')->orderBy('order')->paginate(100);
        return view('admin.faculty.index', compact('faculty'));
    }

    public function create()
    {
        $departments = Department::active()->orderBy('order')->get();
        return view('admin.faculty.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'             => 'required|string|max:255',
            'designation'      => 'required|string|max:255',
            'department'       => 'required|string|max:255',
            'staff_type'       => 'required|in:teaching,non_teaching',
            'qualification'    => 'nullable|string|max:255',
            'specialization'   => 'nullable|string|max:255',
            'email'            => 'nullable|email|max:255',
            'phone'            => 'nullable|string|max:20',
            'bio'              => 'nullable|string',
            'experience_years' => 'nullable|integer|min:0',
            'order'            => 'nullable|integer|min:0',
            'is_active'        => 'boolean',
            'photo'            => 'nullable|image|max:3072',
            'cv'               => 'nullable|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('faculty', 'public');
        }

        if ($request->hasFile('cv')) {
            $data['cv'] = $request->file('cv')->store('faculty/cv', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $data['order']     = $data['order'] ?? 0;

        Faculty::create($data);

        return redirect()->route('admin.faculty.index')->with('success', 'Faculty member added successfully.');
    }

    public function edit(Faculty $faculty)
    {
        $departments = Department::active()->orderBy('order')->get();
        return view('admin.faculty.edit', compact('faculty', 'departments'));
    }

    public function update(Request $request, Faculty $faculty)
    {
        $data = $request->validate([
            'name'             => 'required|string|max:255',
            'designation'      => 'required|string|max:255',
            'department'       => 'required|string|max:255',
            'staff_type'       => 'required|in:teaching,non_teaching',
            'qualification'    => 'nullable|string|max:255',
            'specialization'   => 'nullable|string|max:255',
            'email'            => 'nullable|email|max:255',
            'phone'            => 'nullable|string|max:20',
            'bio'              => 'nullable|string',
            'experience_years' => 'nullable|integer|min:0',
            'order'            => 'nullable|integer|min:0',
            'is_active'        => 'boolean',
            'photo'            => 'nullable|image|max:3072',
            'cv'               => 'nullable|mimes:pdf|max:5120',
            'remove_cv'        => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('faculty', 'public');
        }

        if ($request->hasFile('cv')) {
            if ($faculty->cv) {
                Storage::disk('public')->delete($faculty->cv);
            }
            $data['cv'] = $request->file('cv')->store('faculty/cv', 'public');
        } elseif ($request->boolean('remove_cv') && $faculty->cv) {
            Storage::disk('public')->delete($faculty->cv);
            $data['cv'] = null;
        }

        unset($data['remove_cv']);

        $data['is_active'] = $request->boolean('is_active');
        $data['order']     = $data['order'] ?? 0;

        $faculty->update($data);

        return redirect()->route('admin.faculty.index')->with('success', 'Faculty member updated successfully.');
    }

    public function destroy(Faculty $faculty)
    {
        if ($faculty->photo) {
            Storage::disk('public')->delete($faculty->photo);
        }
        if ($faculty->cv) {
            Storage::disk('public')->delete($faculty->cv);
        }
        $faculty->delete();
        return redirect()->route('admin.faculty.index')->with('success', 'Faculty member deleted.');
    }
}
