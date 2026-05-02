<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentGallery;
use Illuminate\Http\Request;

class DepartmentGalleryController extends Controller
{
    public function index(Request $request)
    {
        $departments   = Department::active()->orderBy('faculty_group')->orderBy('order')->get();
        $selectedSlug  = $request->get('department', $departments->first()?->slug);
        $selectedDept  = $departments->firstWhere('slug', $selectedSlug);
        $photos        = $selectedDept
            ? DepartmentGallery::where('department_slug', $selectedSlug)->orderBy('order')->get()
            : collect();

        return view('admin.department-gallery.index', compact('departments', 'selectedSlug', 'selectedDept', 'photos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_slug' => 'required|string|exists:departments,slug',
            'photos'          => 'required|array|min:1',
            'photos.*'        => 'image|max:3072',
            'caption'         => 'nullable|string|max:255',
        ]);

        $slug  = $request->input('department_slug');
        $order = DepartmentGallery::where('department_slug', $slug)->max('order') ?? 0;

        foreach ($request->file('photos') as $image) {
            $path = $image->store('dept-gallery', 'public');
            DepartmentGallery::create([
                'department_slug' => $slug,
                'image_path'      => $path,
                'caption'         => $request->input('caption'),
                'order'           => ++$order,
                'is_active'       => true,
            ]);
        }

        return redirect()->route('admin.department-gallery.index', ['department' => $slug])
            ->with('success', 'Photos uploaded successfully.');
    }

    public function destroy(DepartmentGallery $departmentGallery)
    {
        $slug = $departmentGallery->department_slug;
        \Storage::disk('public')->delete($departmentGallery->image_path);
        $departmentGallery->delete();

        return redirect()->route('admin.department-gallery.index', ['department' => $slug])
            ->with('success', 'Photo deleted.');
    }
}
