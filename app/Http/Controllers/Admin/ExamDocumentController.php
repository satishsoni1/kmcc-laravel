<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExamDocumentController extends Controller
{
    private const TYPES = ['calendar', 'exam_form', 'hall_ticket', 'result'];

    public function index(Request $request)
    {
        $years = ExamDocument::select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $query = ExamDocument::query();
        if ($request->filled('type')) $query->where('type', $request->type);
        if ($request->filled('year')) $query->where('academic_year', $request->year);
        $documents = $query->orderBy('academic_year', 'desc')->orderBy('order')->paginate(25)->withQueryString();
        $types = self::TYPES;
        return view('admin.exam-documents.index', compact('documents', 'years', 'types'));
    }

    public function create()
    {
        $types = self::TYPES;
        return view('admin.exam-documents.form', compact('types'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type'          => 'required|in:' . implode(',', self::TYPES),
            'title'         => 'required|string|max:255',
            'academic_year' => 'required|string|max:20',
            'semester'      => 'nullable|string|max:50',
            'programme'     => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'external_link' => 'nullable|url|max:500',
            'is_active'     => 'boolean',
            'order'         => 'nullable|integer|min:0',
            'file'          => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png|max:20480',
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $data['file_path'] = $file->store('exam-docs', 'public');
            $data['file_type'] = $file->getClientOriginalExtension();
        }
        $data['is_active'] = $request->boolean('is_active', true);
        $data['order']     = $data['order'] ?? 0;
        ExamDocument::create($data);
        return redirect()->route('admin.exam-documents.index')->with('success', 'Exam document saved.');
    }

    public function edit(ExamDocument $examDocument)
    {
        $types = self::TYPES;
        return view('admin.exam-documents.form', ['document' => $examDocument, 'types' => $types]);
    }

    public function update(Request $request, ExamDocument $examDocument)
    {
        $data = $request->validate([
            'type'          => 'required|in:' . implode(',', self::TYPES),
            'title'         => 'required|string|max:255',
            'academic_year' => 'required|string|max:20',
            'semester'      => 'nullable|string|max:50',
            'programme'     => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'external_link' => 'nullable|url|max:500',
            'is_active'     => 'boolean',
            'order'         => 'nullable|integer|min:0',
            'file'          => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png|max:20480',
        ]);
        if ($request->hasFile('file')) {
            if ($examDocument->file_path) Storage::disk('public')->delete($examDocument->file_path);
            $file = $request->file('file');
            $data['file_path'] = $file->store('exam-docs', 'public');
            $data['file_type'] = $file->getClientOriginalExtension();
        }
        $data['is_active'] = $request->boolean('is_active');
        $examDocument->update($data);
        return redirect()->route('admin.exam-documents.index')->with('success', 'Exam document updated.');
    }

    public function destroy(ExamDocument $examDocument)
    {
        if ($examDocument->file_path) Storage::disk('public')->delete($examDocument->file_path);
        $examDocument->delete();
        return redirect()->route('admin.exam-documents.index')->with('success', 'Document deleted.');
    }
}
