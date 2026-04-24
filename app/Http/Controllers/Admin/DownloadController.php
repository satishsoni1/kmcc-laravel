<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::orderBy('category')->orderBy('order')->paginate(30);
        return view('admin.downloads.index', compact('downloads'));
    }

    public function create()
    {
        return view('admin.downloads.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'category'    => 'required|in:general,timetable,syllabus,forms,results,notices',
            'order'       => 'nullable|integer|min:0',
            'is_active'   => 'boolean',
            'file'        => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png|max:20480',
        ]);

        $file             = $request->file('file');
        $data['file_path'] = $file->store('downloads', 'public');
        $data['file_type'] = $file->getClientOriginalExtension();
        $data['is_active'] = $request->boolean('is_active', true);
        $data['order']    = $data['order'] ?? 0;

        Download::create($data);

        return redirect()->route('admin.downloads.index')->with('success', 'Download added successfully.');
    }

    public function destroy(Download $download)
    {
        Storage::disk('public')->delete($download->file_path);
        $download->delete();
        return redirect()->route('admin.downloads.index')->with('success', 'Download deleted.');
    }
}
