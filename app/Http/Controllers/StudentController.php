<?php

namespace App\Http\Controllers;

use App\Models\StudentCouncil;
use App\Models\Grievance;
use App\Models\Feedback;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()    { return view('student.index'); }
    public function welfare()  { return view('student.welfare'); }
    public function library()  { return view('student.library'); }
    public function eResources(){ return view('student.e-resources'); }
    public function wdc()      { return view('student.wdc'); }
    public function nss()      { return view('student.nss'); }
    public function ncc()      { return view('student.ncc'); }
    public function sports()   { return view('student.sports'); }
    public function placement(){ return view('student.placement'); }
    public function portal()   { return view('student.portal'); }

    public function council(Request $request)
    {
        $years   = StudentCouncil::active()->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year    = $request->get('year', $years->first());
        $members = StudentCouncil::active()->forYear($year)->orderBy('order')->get();
        return view('student.council', compact('members', 'years', 'year'));
    }

    public function grievance()
    {
        return view('student.grievance');
    }

    public function submitGrievance(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'phone'         => 'nullable|string|max:20',
            'roll_number'   => 'nullable|string|max:50',
            'programme'     => 'nullable|string|max:255',
            'year_of_study' => 'nullable|string|max:20',
            'grievance_type'=> 'required|in:academic,examination,infrastructure,ragging,financial,other',
            'subject'       => 'required|string|max:255',
            'message'       => 'required|string|min:10',
        ]);
        Grievance::create($data);
        return back()->with('success', 'Your grievance has been submitted. We will review and respond within 5 working days.');
    }

    public function feedback()
    {
        return view('student.feedback');
    }

    public function submitFeedback(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'nullable|email|max:255',
            'programme'     => 'nullable|string|max:255',
            'year_of_study' => 'nullable|string|max:20',
            'feedback_type' => 'required|in:teaching,infrastructure,library,sports,canteen,general',
            'rating'        => 'required|integer|between:1,5',
            'message'       => 'required|string|min:10',
        ]);
        Feedback::create($data);
        return back()->with('success', 'Thank you! Your feedback has been submitted successfully.');
    }
}
