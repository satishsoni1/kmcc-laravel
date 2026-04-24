<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Feedback::query();
        if ($request->filled('type'))   $query->where('feedback_type', $request->type);
        if ($request->filled('rating')) $query->where('rating', $request->rating);
        if ($request->filled('read'))   $query->where('is_read', $request->read === '1');
        $feedbacks = $query->orderBy('created_at', 'desc')->paginate(25)->withQueryString();
        $unreadCount = Feedback::where('is_read', false)->count();
        return view('admin.feedbacks.index', compact('feedbacks', 'unreadCount'));
    }

    public function show(Feedback $feedback)
    {
        $feedback->update(['is_read' => true]);
        return view('admin.feedbacks.show', compact('feedback'));
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('admin.feedbacks.index')->with('success', 'Feedback deleted.');
    }

    public function markAllRead()
    {
        Feedback::where('is_read', false)->update(['is_read' => true]);
        return redirect()->route('admin.feedbacks.index')->with('success', 'All feedbacks marked as read.');
    }
}
