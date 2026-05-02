<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GovernanceController;
use App\Http\Controllers\AcademicsController;
use App\Http\Controllers\IQACController;
use App\Http\Controllers\NAACController;
use App\Http\Controllers\ExaminationsController;
use App\Http\Controllers\AdmissionsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\FacultyController as AdminFacultyController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\DownloadController as AdminDownloadController;
use App\Http\Controllers\Admin\SettingsController as AdminSettingsController;
use App\Http\Controllers\Admin\CommitteeMemberController as AdminCommitteeController;
use App\Http\Controllers\Admin\AcademicProgrammeController as AdminAcademicProgrammeController;
use App\Http\Controllers\Admin\AcademicDocumentController as AdminAcademicDocumentController;
use App\Http\Controllers\Admin\IqacDocumentController as AdminIqacDocumentController;
use App\Http\Controllers\Admin\NaacDocumentController as AdminNaacDocumentController;
use App\Http\Controllers\Admin\ExamDocumentController as AdminExamDocumentController;
use App\Http\Controllers\Admin\AdmissionsProspectusController as AdminAdmissionsProspectusController;
use App\Http\Controllers\Admin\StudentCouncilController as AdminStudentCouncilController;
use App\Http\Controllers\Admin\GrievanceController as AdminGrievanceController;
use App\Http\Controllers\Admin\FeedbackAdminController as AdminFeedbackController;
use App\Http\Controllers\Admin\ContactSubmissionController as AdminContactSubmissionController;
use App\Http\Controllers\Admin\CollegeCommitteeController as AdminCollegeCommitteeController;
use App\Http\Controllers\Admin\ResearchArticleController as AdminResearchArticleController;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Admin\DepartmentGalleryController as AdminDepartmentGalleryController;
use App\Http\Controllers\SearchController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Search
Route::get('/search', [SearchController::class, 'index'])->name('search');

// About Us
Route::prefix('about')->name('about.')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('index');
    Route::get('/sanstha', [AboutController::class, 'sanstha'])->name('sanstha');
    Route::get('/emblem', [AboutController::class, 'emblem'])->name('emblem');
    Route::get('/vision', [AboutController::class, 'vision'])->name('vision');
    Route::get('/mission', [AboutController::class, 'mission'])->name('mission');
    Route::get('/goals-objectives', [AboutController::class, 'goals'])->name('goals');
    Route::get('/about-college', [AboutController::class, 'college'])->name('college');
    Route::get('/chairmans-desk', [AboutController::class, 'chairmanDesk'])->name('chairman');
    Route::get('/vcs-desk', [AboutController::class, 'vcDesk'])->name('vc');
    Route::get('/principals-desk', [AboutController::class, 'principalDesk'])->name('principal');
    Route::get('/our-team', [AboutController::class, 'team'])->name('team');
    Route::get('/facilities', [AboutController::class, 'facilities'])->name('facilities');
    Route::get('/committees', [AboutController::class, 'committees'])->name('committees');
    Route::get('/board-of-executives', [AboutController::class, 'boardOfExecutives'])->name('board');
    Route::get('/institutions', [AboutController::class, 'institutions'])->name('institutions');
});

// Governance & Administration
Route::prefix('governance')->name('governance.')->group(function () {
    Route::get('/', [GovernanceController::class, 'index'])->name('index');
    Route::get('/governing-body', [GovernanceController::class, 'governingBody'])->name('governing-body');
    Route::get('/finance-committee', [GovernanceController::class, 'financeCommittee'])->name('finance-committee');
    Route::get('/academic-council', [GovernanceController::class, 'academicCouncil'])->name('academic-council');
    Route::get('/board-of-studies', [GovernanceController::class, 'boardOfStudies'])->name('board-of-studies');
    Route::get('/cdc', [GovernanceController::class, 'cdc'])->name('cdc');
    Route::get('/autonomy-committee', [GovernanceController::class, 'autonomyCommittee'])->name('autonomy');
    Route::get('/naac-committees', [GovernanceController::class, 'naacCommittees'])->name('naac-committees');
    Route::get('/other-committees', [GovernanceController::class, 'otherCommittees'])->name('other-committees');
});

// Academics
Route::prefix('academics')->name('academics.')->group(function () {
    Route::get('/', [AcademicsController::class, 'index'])->name('index');
    Route::get('/programmes', [AcademicsController::class, 'programs'])->name('programs');
    Route::get('/calendar', [AcademicsController::class, 'calendar'])->name('calendar');
    Route::get('/programme-outcomes', [AcademicsController::class, 'outcomes'])->name('outcomes');
    Route::get('/departments', [AcademicsController::class, 'departments'])->name('departments');
    Route::get('/stream/{group}', [AcademicsController::class, 'stream'])->name('stream');
    Route::get('/departments/{slug}', [AcademicsController::class, 'department'])->name('department');
    Route::get('/timetable', [AcademicsController::class, 'timetable'])->name('timetable');
    Route::get('/syllabus', [AcademicsController::class, 'syllabus'])->name('syllabus');
});

// IQAC
Route::prefix('iqac')->name('iqac.')->group(function () {
    Route::get('/', [IQACController::class, 'index'])->name('index');
    Route::get('/about', [IQACController::class, 'about'])->name('about');
    Route::get('/objectives', [IQACController::class, 'objectives'])->name('objectives');
    Route::get('/composition', [IQACController::class, 'composition'])->name('composition');
    Route::get('/best-practices', [IQACController::class, 'bestPractices'])->name('best-practices');
    Route::get('/aqar-reports', [IQACController::class, 'aqar'])->name('aqar');
    Route::get('/calendar', [IQACController::class, 'calendar'])->name('calendar');
    Route::get('/student-satisfaction-survey', [IQACController::class, 'sss'])->name('sss');
    Route::get('/meeting-minutes', [IQACController::class, 'minutes'])->name('minutes');
    Route::get('/perspective-plan', [IQACController::class, 'perspectivePlan'])->name('perspective-plan');
    Route::get('/policies', [IQACController::class, 'policies'])->name('policies');
    Route::get('/institutional-distinctiveness', [IQACController::class, 'distinctiveness'])->name('distinctiveness');
});

// NAAC
Route::prefix('naac')->name('naac.')->group(function () {
    Route::get('/', [NAACController::class, 'index'])->name('index');
    Route::get('/ssr', [NAACController::class, 'ssr'])->name('ssr');
    Route::get('/grading', [NAACController::class, 'grading'])->name('grading');
    Route::get('/peer-team-report', [NAACController::class, 'peerTeamReport'])->name('peer-team-report');
});

// Examinations
Route::prefix('examinations')->name('examinations.')->group(function () {
    Route::get('/', [ExaminationsController::class, 'index'])->name('index');
    Route::get('/cell', [ExaminationsController::class, 'cell'])->name('cell');
    Route::get('/rules-regulations', [ExaminationsController::class, 'rules'])->name('rules');
    Route::get('/calendar', [ExaminationsController::class, 'calendar'])->name('calendar');
    Route::get('/results', [ExaminationsController::class, 'results'])->name('results');
    Route::get('/hall-ticket', [ExaminationsController::class, 'hallTicket'])->name('hall-ticket');
    Route::get('/grievance', [ExaminationsController::class, 'grievance'])->name('grievance');
    Route::get('/scheme-of-evaluation', [ExaminationsController::class, 'schemeOfEvaluation'])->name('scheme');
    Route::get('/exam-form', [ExaminationsController::class, 'examForm'])->name('exam-form');
    Route::get('/revaluation', [ExaminationsController::class, 'revaluation'])->name('revaluation');
});

// Admissions
Route::prefix('admissions')->name('admissions.')->group(function () {
    Route::get('/', [AdmissionsController::class, 'index'])->name('index');
    Route::get('/prospectus', [AdmissionsController::class, 'prospectus'])->name('prospectus');
    Route::get('/fees-structure', [AdmissionsController::class, 'fees'])->name('fees');
    Route::get('/process', [AdmissionsController::class, 'process'])->name('process');
    Route::get('/scholarships', [AdmissionsController::class, 'scholarships'])->name('scholarships');
    Route::get('/merit-list', [AdmissionsController::class, 'meritList'])->name('merit-list');
    Route::get('/code-of-conduct', [AdmissionsController::class, 'codeOfConduct'])->name('code-of-conduct');
    Route::get('/anti-ragging', [AdmissionsController::class, 'antiRagging'])->name('anti-ragging');
});

// Student Corner
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/council', [StudentController::class, 'council'])->name('council');
    Route::get('/welfare', [StudentController::class, 'welfare'])->name('welfare');
    Route::get('/grievance', [StudentController::class, 'grievance'])->name('grievance');
    Route::post('/grievance', [StudentController::class, 'submitGrievance'])->name('grievance.submit');
    Route::get('/library', [StudentController::class, 'library'])->name('library');
    Route::get('/e-resources', [StudentController::class, 'eResources'])->name('e-resources');
    Route::get('/feedback', [StudentController::class, 'feedback'])->name('feedback');
    Route::post('/feedback', [StudentController::class, 'submitFeedback'])->name('feedback.submit');
    Route::get('/wdc', [StudentController::class, 'wdc'])->name('wdc');
    Route::get('/nss', [StudentController::class, 'nss'])->name('nss');
    Route::get('/ncc', [StudentController::class, 'ncc'])->name('ncc');
    Route::get('/sports', [StudentController::class, 'sports'])->name('sports');
    Route::get('/placement', [StudentController::class, 'placement'])->name('placement');
    Route::get('/portal', [StudentController::class, 'portal'])->name('portal');
});

// NIRF
Route::get('/nirf', function () {
    return view('nirf.index');
})->name('nirf.index');

// Research
Route::prefix('research')->name('research.')->group(function () {
    Route::get('/', [ResearchController::class, 'index'])->name('index');
    Route::get('/publications', [ResearchController::class, 'publications'])->name('publications');
    Route::get('/projects', [ResearchController::class, 'projects'])->name('projects');
    Route::get('/collaborations', [ResearchController::class, 'collaborations'])->name('collaborations');
});

// Contact
Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('/', [ContactController::class, 'submit'])->name('submit');
});

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// Downloads
Route::get('/downloads', [DownloadsController::class, 'index'])->name('downloads.index');

// ─── Admin Panel ──────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {

    // Auth (unauthenticated)
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');

    // Protected admin routes
    Route::middleware('admin')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resource('announcements', AdminAnnouncementController::class)->except(['show']);
        Route::resource('events', AdminEventController::class)->except(['show']);
        Route::resource('faculty', AdminFacultyController::class)->except(['show']);
        Route::resource('gallery', AdminGalleryController::class)->only(['index', 'create', 'store', 'destroy']);
        Route::resource('downloads', AdminDownloadController::class)->only(['index', 'create', 'store', 'destroy']);

        Route::resource('committees', AdminCommitteeController::class)->except(['show']);

        // ── College Committees (About > Committees page) ────────────────────
        Route::resource('college-committees', AdminCollegeCommitteeController::class)->except(['show']);
        Route::get('college-committees/{collegeCommittee}/members', [AdminCollegeCommitteeController::class, 'members'])->name('college-committees.members');
        Route::post('college-committees/{collegeCommittee}/members', [AdminCollegeCommitteeController::class, 'storeMember'])->name('college-committees.members.store');
        Route::get('college-committees/{collegeCommittee}/members/{member}/edit', [AdminCollegeCommitteeController::class, 'editMember'])->name('college-committees.members.edit');
        Route::put('college-committees/{collegeCommittee}/members/{member}', [AdminCollegeCommitteeController::class, 'updateMember'])->name('college-committees.members.update');
        Route::delete('college-committees/{collegeCommittee}/members/{member}', [AdminCollegeCommitteeController::class, 'destroyMember'])->name('college-committees.members.destroy');

        Route::get('settings', [AdminSettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [AdminSettingsController::class, 'update'])->name('settings.update');

        // ── Academics ──────────────────────────────────────────────────────────
        Route::resource('academic-programmes', AdminAcademicProgrammeController::class)->except(['show']);
        Route::resource('academic-documents', AdminAcademicDocumentController::class)->except(['show']);

        // ── IQAC ───────────────────────────────────────────────────────────────
        Route::resource('iqac-documents', AdminIqacDocumentController::class)->except(['show']);

        // ── NAAC ───────────────────────────────────────────────────────────────
        Route::resource('naac-documents', AdminNaacDocumentController::class)->except(['show']);

        // ── Examinations ───────────────────────────────────────────────────────
        Route::resource('exam-documents', AdminExamDocumentController::class)->except(['show']);

        // ── Admissions ─────────────────────────────────────────────────────────
        Route::resource('admissions-prospectus', AdminAdmissionsProspectusController::class)->except(['show']);

        // ── Student ────────────────────────────────────────────────────────────
        Route::resource('student-council', AdminStudentCouncilController::class)->except(['show']);

        // ── Grievances ─────────────────────────────────────────────────────────
        Route::get('grievances', [AdminGrievanceController::class, 'index'])->name('grievances.index');
        Route::get('grievances/{grievance}', [AdminGrievanceController::class, 'show'])->name('grievances.show');
        Route::put('grievances/{grievance}', [AdminGrievanceController::class, 'update'])->name('grievances.update');
        Route::delete('grievances/{grievance}', [AdminGrievanceController::class, 'destroy'])->name('grievances.destroy');

        // ── Feedbacks ──────────────────────────────────────────────────────────
        Route::get('feedbacks', [AdminFeedbackController::class, 'index'])->name('feedbacks.index');
        Route::get('feedbacks/mark-all-read', [AdminFeedbackController::class, 'markAllRead'])->name('feedbacks.mark-all-read');
        Route::get('feedbacks/{feedback}', [AdminFeedbackController::class, 'show'])->name('feedbacks.show');
        Route::delete('feedbacks/{feedback}', [AdminFeedbackController::class, 'destroy'])->name('feedbacks.destroy');

        // ── Contact Submissions ────────────────────────────────────────────────
        Route::get('contact-submissions', [AdminContactSubmissionController::class, 'index'])->name('contact-submissions.index');
        Route::get('contact-submissions/{contactSubmission}', [AdminContactSubmissionController::class, 'show'])->name('contact-submissions.show');
        Route::put('contact-submissions/{contactSubmission}', [AdminContactSubmissionController::class, 'update'])->name('contact-submissions.update');
        Route::delete('contact-submissions/{contactSubmission}', [AdminContactSubmissionController::class, 'destroy'])->name('contact-submissions.destroy');

        Route::resource('research-articles', AdminResearchArticleController::class)->except(['show']);

        Route::resource('departments', AdminDepartmentController::class)->except(['show']);
        Route::get('department-gallery', [AdminDepartmentGalleryController::class, 'index'])->name('department-gallery.index');
        Route::post('department-gallery', [AdminDepartmentGalleryController::class, 'store'])->name('department-gallery.store');
        Route::delete('department-gallery/{departmentGallery}', [AdminDepartmentGalleryController::class, 'destroy'])->name('department-gallery.destroy');
    });
});
