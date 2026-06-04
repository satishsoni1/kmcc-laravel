<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficeStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficeStaffController extends Controller
{
    public function index()
    {
        $staff = OfficeStaff::orderBy('order')->orderBy('id')->get();
        return view('admin.office-staff.index', compact('staff'));
    }

    public function create()
    {
        return view('admin.office-staff.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'designation'   => 'required|string|max:255',
            'department'    => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'email'         => 'nullable|email|max:255',
            'phone'         => 'nullable|string|max:20',
            'order'         => 'nullable|integer|min:0',
            'is_active'     => 'boolean',
            'photo'         => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('office-staff', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $data['order']     = $data['order'] ?? 0;

        OfficeStaff::create($data);

        return redirect()->route('admin.office-staff.index')
            ->with('success', 'Office staff member added successfully.');
    }

    public function edit(OfficeStaff $officeStaff)
    {
        return view('admin.office-staff.edit', ['staff' => $officeStaff]);
    }

    public function update(Request $request, OfficeStaff $officeStaff)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'designation'   => 'required|string|max:255',
            'department'    => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'email'         => 'nullable|email|max:255',
            'phone'         => 'nullable|string|max:20',
            'order'         => 'nullable|integer|min:0',
            'is_active'     => 'boolean',
            'photo'         => 'nullable|image|max:2048',
            'remove_photo'  => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            if ($officeStaff->photo) {
                Storage::disk('public')->delete($officeStaff->photo);
            }
            $data['photo'] = $request->file('photo')->store('office-staff', 'public');
        } elseif ($request->boolean('remove_photo') && $officeStaff->photo) {
            Storage::disk('public')->delete($officeStaff->photo);
            $data['photo'] = null;
        }

        unset($data['remove_photo']);

        $data['is_active'] = $request->boolean('is_active');
        $data['order']     = $data['order'] ?? 0;

        $officeStaff->update($data);

        return redirect()->route('admin.office-staff.index')
            ->with('success', 'Office staff member updated successfully.');
    }

    public function destroy(OfficeStaff $officeStaff)
    {
        if ($officeStaff->photo) {
            Storage::disk('public')->delete($officeStaff->photo);
        }
        $officeStaff->delete();
        return redirect()->route('admin.office-staff.index')
            ->with('success', 'Office staff member deleted.');
    }
}
