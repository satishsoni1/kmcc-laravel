<?php
namespace App\Http\Controllers\NaacPortal;
use App\Models\NaacPortal\{NpTask, NpTaskComment, NpCriterion};
use App\Models\User;
use Illuminate\Http\Request;
class NpTaskController extends NpBaseController {
    public function index(Request $request) {
        $cid   = $this->collegeId();
        $query = NpTask::where('college_id', $cid)->with('criterion', 'creator', 'assignees');
        if ($request->status) $query->where('status', $request->status);
        if ($request->priority) $query->where('priority', $request->priority);
        if ($request->criterion_id) $query->where('criterion_id', $request->criterion_id);
        $tasks    = $query->orderByRaw("FIELD(status,'open','in_progress','review','approved','closed')")->orderBy('due_date')->paginate(20)->withQueryString();
        $criteria = NpCriterion::where('is_active', true)->orderBy('number')->get();
        return view('naac-portal.tasks.index', compact('tasks', 'criteria'));
    }
    public function create() {
        $criteria = NpCriterion::where('is_active', true)->orderBy('number')->with('metrics')->get();
        $users    = User::orderBy('name')->get();
        return view('naac-portal.tasks.create', compact('criteria', 'users'));
    }
    public function store(Request $request) {
        $cid  = $this->collegeId();
        $data = $request->validate(['title' => 'required|string|max:255', 'description' => 'nullable|string', 'priority' => 'required|in:low,medium,high,urgent', 'criterion_id' => 'nullable|exists:np_criteria,id', 'metric_id' => 'nullable|exists:np_metrics,id', 'due_date' => 'nullable|date', 'academic_year' => 'nullable|string|max:10', 'assignees' => 'nullable|array', 'assignees.*' => 'exists:users,id']);
        $task = NpTask::create(array_merge(array_except($data, ['assignees']), ['college_id' => $cid, 'created_by' => auth()->id()]));
        if (!empty($data['assignees'])) $task->assignees()->sync($data['assignees']);
        return redirect()->route('np.tasks.show', $task)->with('success', 'Task created.');
    }
    public function show(NpTask $task) {
        $task->load('criterion', 'metric', 'creator', 'assignees', 'comments.user');
        $users = User::orderBy('name')->get();
        return view('naac-portal.tasks.show', compact('task', 'users'));
    }
    public function update(Request $request, NpTask $task) {
        $data = $request->validate(['status' => 'required|in:open,in_progress,review,approved,closed', 'priority' => 'required|in:low,medium,high,urgent', 'due_date' => 'nullable|date', 'assignees' => 'nullable|array', 'assignees.*' => 'exists:users,id']);
        $task->update(array_except($data, ['assignees']));
        if (isset($data['assignees'])) $task->assignees()->sync($data['assignees']);
        return back()->with('success', 'Task updated.');
    }
    public function comment(Request $request, NpTask $task) {
        $data = $request->validate(['comment' => 'required|string|min:2', 'attachment' => 'nullable|file|max:5120']);
        $path = null;
        if ($request->hasFile('attachment')) $path = $request->file('attachment')->store('np/task-attachments', 'public');
        NpTaskComment::create(['task_id' => $task->id, 'user_id' => auth()->id(), 'comment' => $data['comment'], 'attachment_path' => $path]);
        return back()->with('success', 'Comment added.');
    }
    public function destroy(NpTask $task) { $task->delete(); return redirect()->route('np.tasks.index')->with('success', 'Task deleted.'); }
}
