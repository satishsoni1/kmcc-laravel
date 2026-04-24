<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NaacDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NaacDocumentController extends Controller
{
    private const TYPES = ['ssr', 'grading', 'peer_team_report'];

    public function index(Request $request)
    {
        $years = NaacDocument::select('academic_year')->distinct()->whereNotNull('academic_year')->orderBy('academic_year', 'desc')->pluck('academic_year');
        $query = NaacDocument::query();
        if ($request->filled('type')) $query->where('type', $request->type);
        if ($request->filled('year')) $query->where('academic_year', $request->year);
        if ($request->filled('cycle')) $query->where('cycle', $request->cycle);
        $documents = $query->orderBy('order')->paginate(25)->withQueryString();
        $types = self::TYPES;
        return view('admin.naac-documents.index', compact('documents', 'years', 'types'));
    }

    public function create()
    {
        $types = self::TYPES;
        return view('admin.naac-documents.form', compact('types'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type'          => 'required|in:' . implode(',', self::TYPES),
            'title'         => 'required|string|max:255',
            'cycle'         => 'nullable|string|max:50',
            'academic_year' => 'nullable|string|max:20',
            'grade'         => 'nullable|string|max:10',
            'description'   => 'nullable|string',
            'is_active'     => 'boolean',
            'order'         => 'nullable|integer|min:0',
            'file'          => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png|max:20480',
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $data['file_path'] = $file->store('naac-docs', 'public');
            $data['file_type'] = $file->getClientOriginalExtension();
        }
        $data['is_active'] = $request->boolean('is_active', true);
        $data['order']     = $data['order'] ?? 0;
        NaacDocument::create($data);
        return redirect()->route('admin.naac-documents.index')->with('success', 'NAAC document saved.');
    }

    public function edit(NaacDocument $naacDocument)
    {
        $types = self::TYPES;
        return view('admin.naac-documents.form', ['document' => $naacDocument, 'types' => $types]);
    }

    public function update(Request $request, NaacDocument $naacDocument)
    {
        $data = $request->validate([
            'type'          => 'required|in:' . implode(',', self::TYPES),
            'title'         => 'required|string|max:255',
            'cycle'         => 'nullable|string|max:50',
            'academic_year' => 'nullable|string|max:20',
            'grade'         => 'nullable|string|max:10',
            'description'   => 'nullable|string',
            'is_active'     => 'boolean',
            'order'         => 'nullable|integer|min:0',
            'file'          => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png|max:20480',
        ]);
        if ($request->hasFile('file')) {
            if ($naacDocument->file_path) Storage::disk('public')->delete($naacDocument->file_path);
            $file = $request->file('file');
            $data['file_path'] = $file->store('naac-docs', 'public');
            $data['file_type'] = $file->getClientOriginalExtension();
        }
        $data['is_active'] = $request->boolean('is_active');
        $naacDocument->update($data);
        return redirect()->route('admin.naac-documents.index')->with('success', 'NAAC document updated.');
    }

    public function destroy(NaacDocument $naacDocument)
    {
        if ($naacDocument->file_path) Storage::disk('public')->delete($naacDocument->file_path);
        $naacDocument->delete();
        return redirect()->route('admin.naac-documents.index')->with('success', 'Document deleted.');
    }
}
