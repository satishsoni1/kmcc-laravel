<?php
namespace App\Http\Controllers\NaacPortal;
use App\Models\NaacPortal\{NpCollege, NpDepartment, NpCourse, NpAccreditationCycle};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class NpCollegeController extends NpBaseController {
    public function profile() {
        $college = NpCollege::with(['departments', 'courses', 'accreditationCycles' => fn($q) => $q->orderByDesc('year_of_accreditation')])->findOrFail($this->collegeId());
        return view('naac-portal.college.profile', compact('college'));
    }
    public function editProfile() {
        $college = NpCollege::findOrFail($this->collegeId());
        return view('naac-portal.college.edit', compact('college'));
    }
    public function updateProfile(Request $request) {
        $college = NpCollege::findOrFail($this->collegeId());
        $data = $request->validate([
            'name' => 'required|string|max:255', 'short_name' => 'nullable|string|max:50',
            'address' => 'nullable|string', 'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100', 'pin' => 'nullable|string|max:10',
            'phone' => 'nullable|string|max:20', 'email' => 'nullable|email',
            'website' => 'nullable|url', 'principal_name' => 'nullable|string|max:255',
            'iqac_coordinator_name' => 'nullable|string|max:255',
            'university_affiliation' => 'nullable|string|max:255',
            'ugc_recognition' => 'nullable|string|max:50', 'aishe_code' => 'nullable|string|max:30',
            'established_year' => 'nullable|digits:4', 'type' => 'required|in:Government,Aided,Unaided,Autonomous',
            'vision' => 'nullable|string', 'mission' => 'nullable|string',
            'current_naac_grade' => 'nullable|string|max:5', 'current_cgpa' => 'nullable|string|max:10',
            'logo' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('logo')) {
            if ($college->logo_path) Storage::disk('public')->delete($college->logo_path);
            $data['logo_path'] = $request->file('logo')->store('np/logos', 'public');
        }
        unset($data['logo']);
        $college->update($data);
        return back()->with('success', 'College profile updated successfully.');
    }
    // Departments
    public function departments() {
        $departments = NpDepartment::where('college_id', $this->collegeId())->withCount('courses')->orderBy('name')->get();
        return view('naac-portal.college.departments', compact('departments'));
    }
    public function storeDepartment(Request $request) {
        $data = $request->validate(['name' => 'required|string|max:255', 'code' => 'nullable|string|max:20', 'hod_name' => 'nullable|string|max:255', 'hod_email' => 'nullable|email', 'faculty_count' => 'nullable|integer', 'student_count' => 'nullable|integer']);
        $data['college_id'] = $this->collegeId();
        NpDepartment::create($data);
        return back()->with('success', 'Department added.');
    }
    public function updateDepartment(Request $request, NpDepartment $department) {
        $data = $request->validate(['name' => 'required|string|max:255', 'code' => 'nullable|string|max:20', 'hod_name' => 'nullable|string|max:255', 'hod_email' => 'nullable|email', 'faculty_count' => 'nullable|integer', 'student_count' => 'nullable|integer', 'is_active' => 'boolean']);
        $department->update($data);
        return back()->with('success', 'Department updated.');
    }
    public function destroyDepartment(NpDepartment $department) {
        $department->delete();
        return back()->with('success', 'Department deleted.');
    }
    // Courses
    public function courses() {
        $courses = NpCourse::where('college_id', $this->collegeId())->with('department')->orderBy('name')->get();
        $departments = NpDepartment::where('college_id', $this->collegeId())->orderBy('name')->get();
        return view('naac-portal.college.courses', compact('courses', 'departments'));
    }
    public function storeCourse(Request $request) {
        $data = $request->validate(['name' => 'required|string|max:255', 'code' => 'nullable|string|max:30', 'department_id' => 'nullable|exists:np_departments,id', 'level' => 'required|in:UG,PG,Diploma,Certificate,PhD', 'duration_years' => 'required|integer|min:1', 'intake_capacity' => 'nullable|integer']);
        $data['college_id'] = $this->collegeId();
        NpCourse::create($data);
        return back()->with('success', 'Course added.');
    }
    public function destroyCourse(NpCourse $course) { $course->delete(); return back()->with('success', 'Course deleted.'); }
}
