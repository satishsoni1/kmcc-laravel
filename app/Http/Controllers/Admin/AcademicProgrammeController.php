<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicProgramme;
use Illuminate\Http\Request;

class AcademicProgrammeController extends Controller
{
    public function index()
    {
        $programmes = AcademicProgramme::orderBy('order')->orderBy('name')->paginate(30);
        return view('admin.academic-programmes.index', compact('programmes'));
    }

    public function create()
    {
        return view('admin.academic-programmes.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'code'        => 'nullable|string|max:50',
            'level'       => 'required|in:ug,pg,diploma,certificate,phd',
            'duration'    => 'nullable|string|max:100',
            'seats'       => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'is_active'   => 'boolean',
            'order'       => 'nullable|integer|min:0',
        ]);
        $data['is_active'] = $request->boolean('is_active', true);
        $data['order']     = $data['order'] ?? 0;
        AcademicProgramme::create($data);
        return redirect()->route('admin.academic-programmes.index')->with('success', 'Programme added.');
    }

    public function edit(AcademicProgramme $academicProgramme)
    {
        return view('admin.academic-programmes.form', ['programme' => $academicProgramme]);
    }

    public function update(Request $request, AcademicProgramme $academicProgramme)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'code'        => 'nullable|string|max:50',
            'level'       => 'required|in:ug,pg,diploma,certificate,phd',
            'duration'    => 'nullable|string|max:100',
            'seats'       => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'is_active'   => 'boolean',
            'order'       => 'nullable|integer|min:0',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $academicProgramme->update($data);
        return redirect()->route('admin.academic-programmes.index')->with('success', 'Programme updated.');
    }

    public function destroy(AcademicProgramme $academicProgramme)
    {
        $academicProgramme->delete();
        return redirect()->route('admin.academic-programmes.index')->with('success', 'Programme deleted.');
    }
}
