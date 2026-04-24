<?php

namespace App\Http\Controllers;

use App\Models\AdmissionsProspectus;
use Illuminate\Http\Request;

class AdmissionsController extends Controller
{
    public function index()        { return view('admissions.index'); }
    public function fees()         { return view('admissions.fees'); }
    public function process()      { return view('admissions.process'); }
    public function scholarships() { return view('admissions.scholarships'); }
    public function meritList()    { return view('admissions.merit-list'); }
    public function codeOfConduct(){ return view('admissions.code-of-conduct'); }
    public function antiRagging()  { return view('admissions.anti-ragging'); }

    public function prospectus(Request $request)
    {
        $years = AdmissionsProspectus::active()->select('academic_year')->distinct()->orderBy('academic_year', 'desc')->pluck('academic_year');
        $year  = $request->get('year', $years->first());
        $items = AdmissionsProspectus::active()->forYear($year)->orderBy('order')->get();
        return view('admissions.prospectus', compact('items', 'years', 'year'));
    }
}
