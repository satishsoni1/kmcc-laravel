<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionsProspectus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdmissionsProspectusController extends Controller
{
    public function index(Request $request)
    {
        $years = AdmissionsProspectus::select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $query = AdmissionsProspectus::query();
        if ($request->filled('year')) $query->where('academic_year', $request->year);
        $items = $query->orderBy('academic_year', 'desc')->orderBy('order')->paginate(20)->withQueryString();
        return view('admin.admissions-prospectus.index', compact('items', 'years'));
    }

    public function create()
    {
        return view('admin.admissions-prospectus.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'academic_year' => 'required|string|max:20',
            'description'   => 'nullable|string',
            'external_link' => 'nullable|url|max:500',
            'is_active'     => 'boolean',
            'order'         => 'nullable|integer|min:0',
            'file'          => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:20480',
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $data['file_path'] = $file->store('prospectus', 'public');
            $data['file_type'] = $file->getClientOriginalExtension();
        }
        $data['is_active'] = $request->boolean('is_active', true);
        $data['order']     = $data['order'] ?? 0;
        AdmissionsProspectus::create($data);
        return redirect()->route('admin.admissions-prospectus.index')->with('success', 'Prospectus added.');
    }

    public function edit(AdmissionsProspectus $admissionsProspectus)
    {
        return view('admin.admissions-prospectus.form', ['item' => $admissionsProspectus]);
    }

    public function update(Request $request, AdmissionsProspectus $admissionsProspectus)
    {
        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'academic_year' => 'required|string|max:20',
            'description'   => 'nullable|string',
            'external_link' => 'nullable|url|max:500',
            'is_active'     => 'boolean',
            'order'         => 'nullable|integer|min:0',
            'file'          => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:20480',
        ]);
        if ($request->hasFile('file')) {
            if ($admissionsProspectus->file_path) Storage::disk('public')->delete($admissionsProspectus->file_path);
            $file = $request->file('file');
            $data['file_path'] = $file->store('prospectus', 'public');
            $data['file_type'] = $file->getClientOriginalExtension();
        }
        $data['is_active'] = $request->boolean('is_active');
        $admissionsProspectus->update($data);
        return redirect()->route('admin.admissions-prospectus.index')->with('success', 'Prospectus updated.');
    }

    public function destroy(AdmissionsProspectus $admissionsProspectus)
    {
        if ($admissionsProspectus->file_path) Storage::disk('public')->delete($admissionsProspectus->file_path);
        $admissionsProspectus->delete();
        return redirect()->route('admin.admissions-prospectus.index')->with('success', 'Prospectus deleted.');
    }
}
