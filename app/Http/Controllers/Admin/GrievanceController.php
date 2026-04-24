<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grievance;
use Illuminate\Http\Request;

class GrievanceController extends Controller
{
    public function index(Request $request)
    {
        $query = Grievance::query();
        if ($request->filled('status'))  $query->where('status', $request->status);
        if ($request->filled('type'))    $query->where('grievance_type', $request->type);
        if ($request->filled('search'))  $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('subject', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
        });
        $grievances = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();
        $counts = [
            'pending'      => Grievance::where('status', 'pending')->count(),
            'under_review' => Grievance::where('status', 'under_review')->count(),
            'resolved'     => Grievance::where('status', 'resolved')->count(),
        ];
        return view('admin.grievances.index', compact('grievances', 'counts'));
    }

    public function show(Grievance $grievance)
    {
        return view('admin.grievances.show', compact('grievance'));
    }

    public function update(Request $request, Grievance $grievance)
    {
        $data = $request->validate([
            'status'        => 'required|in:pending,under_review,resolved,closed',
            'admin_remarks' => 'nullable|string',
        ]);
        $grievance->update($data);
        return redirect()->route('admin.grievances.show', $grievance)->with('success', 'Grievance updated.');
    }

    public function destroy(Grievance $grievance)
    {
        $grievance->delete();
        return redirect()->route('admin.grievances.index')->with('success', 'Grievance deleted.');
    }
}
