<?php
namespace App\Http\Controllers\NaacPortal;
use App\Http\Controllers\Controller;
use App\Models\NaacPortal\{NpCollege, NpAqarReport, NpBestPractice, NpAccreditationCycle, NpFeedbackForm, NpCriterion, NpDocument};
class NpPublicController extends Controller {
    private function college(): NpCollege {
        return NpCollege::where('is_active', true)->firstOrFail();
    }
    public function home() {
        $college  = $this->college();
        $grading  = NpAccreditationCycle::where('college_id', $college->id)->orderByDesc('year_of_accreditation')->first();
        $aqars    = NpAqarReport::where('college_id', $college->id)->where('status', 'published')->orderByDesc('academic_year')->limit(5)->get();
        $practices = NpBestPractice::where('college_id', $college->id)->where('is_published', true)->latest()->limit(3)->get();
        return view('naac-portal.public.home', compact('college', 'grading', 'aqars', 'practices'));
    }
    public function iqac() {
        $college  = $this->college();
        $criteria = NpCriterion::where('is_active', true)->orderBy('number')->get();
        return view('naac-portal.public.iqac', compact('college', 'criteria'));
    }
    public function naac() {
        $college  = $this->college();
        $cycles   = NpAccreditationCycle::where('college_id', $college->id)->orderByDesc('year_of_accreditation')->get();
        return view('naac-portal.public.naac', compact('college', 'cycles'));
    }
    public function aqarPublic() {
        $college = $this->college();
        $aqars   = NpAqarReport::where('college_id', $college->id)->where('status', 'published')->orderByDesc('academic_year')->get();
        return view('naac-portal.public.aqar', compact('college', 'aqars'));
    }
    public function bestPractices() {
        $college   = $this->college();
        $practices = NpBestPractice::where('college_id', $college->id)->where('is_published', true)->latest()->paginate(10);
        return view('naac-portal.public.best-practices', compact('college', 'practices'));
    }
    public function mandatoryDisclosure() {
        $college = $this->college();
        return view('naac-portal.public.mandatory-disclosure', compact('college'));
    }
}
