<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IqacDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IqacDocumentController extends Controller
{
    private const TYPES = ['sss_report', 'aqar', 'activity_calendar', 'policy', 'meeting_minutes'];

    public function index(Request $request)
    {
        $years = IqacDocument::select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $query = IqacDocument::query();
        if ($request->filled('type')) $query->where('type', $request->type);
        if ($request->filled('year')) $query->where('academic_year', $request->year);
        $documents = $query->orderBy('academic_year', 'desc')->orderBy('order')->paginate(25)->withQueryString();
        $types = self::TYPES;
        return view('admin.iqac-documents.index', compact('documents', 'years', 'types'));
    }

    public function create()
    {
        $types = self::TYPES;
        return view('admin.iqac-documents.form', compact('types'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type'          => 'required|in:' . implode(',', self::TYPES),
            'title'         => 'required|string|max:255',
            'academic_year' => 'required|string|max:20',
            'description'   => 'nullable|string',
            'is_active'     => 'boolean',
            'order'         => 'nullable|integer|min:0',
            'file'          => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png|max:20480',
        ]);
        $file = $request->file('file');
        $data['file_path'] = $file->store('iqac-docs', 'public');
        $data['file_type'] = $file->getClientOriginalExtension();
        $data['is_active'] = $request->boolean('is_active', true);
        $data['order']     = $data['order'] ?? 0;
        IqacDocument::create($data);
        return redirect()->route('admin.iqac-documents.index')->with('success', 'IQAC document uploaded.');
    }

    public function edit(IqacDocument $iqacDocument)
    {
        $types = self::TYPES;
        return view('admin.iqac-documents.form', ['document' => $iqacDocument, 'types' => $types]);
    }

    public function update(Request $request, IqacDocument $iqacDocument)
    {
        $data = $request->validate([
            'type'          => 'required|in:' . implode(',', self::TYPES),
            'title'         => 'required|string|max:255',
            'academic_year' => 'required|string|max:20',
            'description'   => 'nullable|string',
            'is_active'     => 'boolean',
            'order'         => 'nullable|integer|min:0',
            'file'          => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png|max:20480',
        ]);
        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($iqacDocument->file_path);
            $file = $request->file('file');
            $data['file_path'] = $file->store('iqac-docs', 'public');
            $data['file_type'] = $file->getClientOriginalExtension();
        }
        $data['is_active'] = $request->boolean('is_active');
        $iqacDocument->update($data);
        return redirect()->route('admin.iqac-documents.index')->with('success', 'IQAC document updated.');
    }

    public function destroy(IqacDocument $iqacDocument)
    {
        Storage::disk('public')->delete($iqacDocument->file_path);
        $iqacDocument->delete();
        return redirect()->route('admin.iqac-documents.index')->with('success', 'Document deleted.');
    }
}
