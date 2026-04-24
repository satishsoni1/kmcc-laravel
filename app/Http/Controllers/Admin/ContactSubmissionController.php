<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactSubmission::query();
        if ($request->filled('status')) $query->where('status', $request->status);
        if ($request->filled('search')) $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%')
              ->orWhere('subject', 'like', '%' . $request->search . '%');
        });
        $submissions = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();
        $newCount = ContactSubmission::where('status', 'new')->count();
        return view('admin.contact-submissions.index', compact('submissions', 'newCount'));
    }

    public function show(ContactSubmission $contactSubmission)
    {
        if ($contactSubmission->status === 'new') {
            $contactSubmission->update(['status' => 'read']);
        }
        return view('admin.contact-submissions.show', compact('contactSubmission'));
    }

    public function update(Request $request, ContactSubmission $contactSubmission)
    {
        $data = $request->validate([
            'status'      => 'required|in:new,read,replied',
            'admin_reply' => 'nullable|string',
        ]);
        $contactSubmission->update($data);
        return redirect()->route('admin.contact-submissions.show', $contactSubmission)->with('success', 'Updated.');
    }

    public function destroy(ContactSubmission $contactSubmission)
    {
        $contactSubmission->delete();
        return redirect()->route('admin.contact-submissions.index')->with('success', 'Submission deleted.');
    }
}
