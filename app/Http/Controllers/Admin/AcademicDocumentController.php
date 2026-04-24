<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcademicDocumentController extends Controller
{
    private const TYPES = ['academic_calendar', 'timetable', 'class_timetable', 'syllabus'];

    public function index(Request $request)
    {
        $years = AcademicDocument::select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $query = AcademicDocument::query();
        if ($request->filled('type')) $query->where('type', $request->type);
        if ($request->filled('year')) $query->where('academic_year', $request->year);
        $documents = $query->orderBy('academic_year', 'desc')->orderBy('order')->paginate(25)->withQueryString();
        $types = self::TYPES;
        return view('admin.academic-documents.index', compact('documents', 'years', 'types'));
    }

    public function create()
    {
        $types = self::TYPES;
        return view('admin.academic-documents.form', compact('types'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type'          => 'required|in:' . implode(',', self::TYPES),
            'title'         => 'required|string|max:255',
            'academic_year' => 'required|string|max:20',
            'programme'     => 'nullable|string|max:255',
            'department'    => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'is_active'     => 'boolean',
            'order'         => 'nullable|integer|min:0',
            'file'          => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png|max:20480',
        ]);
        $file = $request->file('file');
        $data['file_path'] = $file->store('academic-docs', 'public');
        $data['file_type'] = $file->getClientOriginalExtension();
        $data['is_active'] = $request->boolean('is_active', true);
        $data['order']     = $data['order'] ?? 0;
        AcademicDocument::create($data);
        return redirect()->route('admin.academic-documents.index')->with('success', 'Document uploaded.');
    }

    public function edit(AcademicDocument $academicDocument)
    {
        $types = self::TYPES;
        return view('admin.academic-documents.form', ['document' => $academicDocument, 'types' => $types]);
    }

    public function update(Request $request, AcademicDocument $academicDocument)
    {
        $data = $request->validate([
            'type'          => 'required|in:' . implode(',', self::TYPES),
            'title'         => 'required|string|max:255',
            'academic_year' => 'required|string|max:20',
            'programme'     => 'nullable|string|max:255',
            'department'    => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'is_active'     => 'boolean',
            'order'         => 'nullable|integer|min:0',
            'file'          => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png|max:20480',
        ]);
        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($academicDocument->file_path);
            $file = $request->file('file');
            $data['file_path'] = $file->store('academic-docs', 'public');
            $data['file_type'] = $file->getClientOriginalExtension();
        }
        $data['is_active'] = $request->boolean('is_active');
        $academicDocument->update($data);
        return redirect()->route('admin.academic-documents.index')->with('success', 'Document updated.');
    }

    public function destroy(AcademicDocument $academicDocument)
    {
        Storage::disk('public')->delete($academicDocument->file_path);
        $academicDocument->delete();
        return redirect()->route('admin.academic-documents.index')->with('success', 'Document deleted.');
    }
}
