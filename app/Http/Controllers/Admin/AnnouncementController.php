<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->paginate(20);
        return view('admin.announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('admin.announcements.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'nullable|string',
            'category'    => 'required|in:general,exam,admission,event,academic',
            'expiry_date' => 'nullable|date|after:today',
            'is_new'      => 'boolean',
            'is_active'   => 'boolean',
            'file'        => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('announcements', 'public');
        }

        $data['is_new']    = $request->boolean('is_new');
        $data['is_active'] = $request->boolean('is_active', true);

        Announcement::create($data);

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement created successfully.');
    }

    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'nullable|string',
            'category'    => 'required|in:general,exam,admission,event,academic',
            'expiry_date' => 'nullable|date',
            'is_new'      => 'boolean',
            'is_active'   => 'boolean',
            'file'        => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('announcements', 'public');
        }

        $data['is_new']    = $request->boolean('is_new');
        $data['is_active'] = $request->boolean('is_active');

        $announcement->update($data);

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement updated successfully.');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('admin.announcements.index')->with('success', 'Announcement deleted.');
    }
}
