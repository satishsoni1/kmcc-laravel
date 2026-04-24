<?php
namespace App\Http\Controllers\NaacPortal;
use App\Models\NaacPortal\{NpFeedbackForm, NpFeedbackQuestion, NpFeedbackResponse, NpFeedbackAnswer};
use Illuminate\Http\Request;
class NpFeedbackController extends NpBaseController {
    public function index() {
        $forms = NpFeedbackForm::where('college_id', $this->collegeId())->withCount('responses')->orderByDesc('created_at')->get();
        return view('naac-portal.feedback.index', compact('forms'));
    }
    public function create() { return view('naac-portal.feedback.create'); }
    public function store(Request $request) {
        $cid  = $this->collegeId();
        $data = $request->validate(['title' => 'required|string|max:255', 'description' => 'nullable|string', 'target_audience' => 'required|in:student,teacher,alumni,employer,parent', 'is_anonymous' => 'boolean', 'start_date' => 'nullable|date', 'end_date' => 'nullable|date|after_or_equal:start_date', 'academic_year' => 'nullable|string|max:10', 'questions' => 'required|array|min:1', 'questions.*.question' => 'required|string', 'questions.*.type' => 'required|in:rating,text,mcq,yes_no', 'questions.*.options' => 'nullable|string', 'questions.*.is_required' => 'boolean']);
        $form = NpFeedbackForm::create(array_merge(array_except($data, ['questions']), ['college_id' => $cid, 'created_by' => auth()->id(), 'is_active' => true]));
        foreach ($data['questions'] as $i => $q) {
            NpFeedbackQuestion::create(['form_id' => $form->id, 'question' => $q['question'], 'type' => $q['type'], 'options' => $q['options'] ? array_map('trim', explode("\n", $q['options'])) : null, 'is_required' => $q['is_required'] ?? false, 'order' => $i]);
        }
        return redirect()->route('np.feedback.show', $form)->with('success', 'Feedback form created.');
    }
    public function show(NpFeedbackForm $form) {
        $form->load('questions', 'responses');
        $stats = [];
        foreach ($form->questions as $q) {
            if ($q->type === 'rating') {
                $avg = $q->answers()->whereNotNull('rating')->avg('rating');
                $stats[$q->id] = ['avg' => round($avg ?? 0, 2), 'count' => $q->answers()->count()];
            }
        }
        return view('naac-portal.feedback.show', compact('form', 'stats'));
    }
    public function toggleActive(NpFeedbackForm $form) {
        $form->update(['is_active' => !$form->is_active]);
        return back()->with('success', 'Form ' . ($form->is_active ? 'activated' : 'deactivated') . '.');
    }
    // Public submission
    public function fillForm(NpFeedbackForm $form) {
        if (!$form->is_active) abort(404);
        $form->load('questions');
        return view('naac-portal.public.feedback-form', compact('form'));
    }
    public function submitForm(Request $request, NpFeedbackForm $form) {
        if (!$form->is_active) abort(404);
        $rules = ['respondent_name' => 'nullable|string|max:255', 'respondent_email' => 'nullable|email', 'programme' => 'nullable|string|max:255', 'academic_year' => 'nullable|string|max:10'];
        foreach ($form->questions as $q) {
            $rules['answers.' . $q->id] = ($q->is_required ? 'required' : 'nullable') . '|string|max:1000';
        }
        $data = $request->validate($rules);
        $response = NpFeedbackResponse::create(['form_id' => $form->id, 'respondent_name' => $data['respondent_name'] ?? null, 'respondent_email' => $data['respondent_email'] ?? null, 'respondent_type' => $form->target_audience, 'programme' => $data['programme'] ?? null, 'academic_year' => $data['academic_year'] ?? null, 'ip_address' => $request->ip()]);
        foreach ($form->questions as $q) {
            $answer = $data['answers'][$q->id] ?? null;
            NpFeedbackAnswer::create(['response_id' => $response->id, 'question_id' => $q->id, 'answer' => $answer, 'rating' => $q->type === 'rating' ? (int) $answer : null]);
        }
        return back()->with('success', 'Thank you! Your feedback has been submitted.');
    }
    public function destroy(NpFeedbackForm $form) { $form->delete(); return redirect()->route('np.feedback.index')->with('success', 'Form deleted.'); }
}
