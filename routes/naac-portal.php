<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NaacPortal\{
    NpAuthController,
    NpDashboardController,
    NpCollegeController,
    NpCriterionController,
    NpDocumentController,
    NpAqarController,
    NpSsrController,
    NpTaskController,
    NpFeedbackController,
    NpReportController,
    NpPublicController,
    NpBestPracticeController,
};

/*
|--------------------------------------------------------------------------|
| NAAC Portal — Public Pages                                                |
|--------------------------------------------------------------------------|
*/
Route::prefix('naac-portal')->name('np.')->group(function () {

    // Auth
    Route::get('/login',  [NpAuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [NpAuthController::class, 'login'])->name('login.post');
    Route::post('/logout',[NpAuthController::class, 'logout'])->name('logout')->middleware('auth');

    // Public website pages (no auth required)
    Route::prefix('public')->name('public.')->group(function () {
        Route::get('/',                    [NpPublicController::class, 'home'])->name('home');
        Route::get('/iqac',                [NpPublicController::class, 'iqac'])->name('iqac');
        Route::get('/naac',                [NpPublicController::class, 'naac'])->name('naac');
        Route::get('/aqar',                [NpPublicController::class, 'aqarPublic'])->name('aqar');
        Route::get('/best-practices',      [NpPublicController::class, 'bestPractices'])->name('best-practices');
        Route::get('/mandatory-disclosure',[NpPublicController::class, 'mandatoryDisclosure'])->name('mandatory-disclosure');
        Route::get('/feedback/{form}',     [NpFeedbackController::class, 'fillForm'])->name('feedback.form');
        Route::post('/feedback/{form}',    [NpFeedbackController::class, 'submitForm'])->name('feedback.submit');
    });

    /*
    |-------------------------------------------------------------------------|
    | NAAC Portal — Authenticated Admin Panel                                 |
    |-------------------------------------------------------------------------|
    */
    Route::middleware('np.auth')->group(function () {

        // Dashboard
        Route::get('/dashboard', [NpDashboardController::class, 'index'])->name('dashboard');

        // College Profile
        Route::prefix('college')->name('college.')->group(function () {
            Route::get('/profile',   [NpCollegeController::class, 'profile'])->name('profile');
            Route::get('/edit',      [NpCollegeController::class, 'editProfile'])->name('edit');
            Route::put('/update',    [NpCollegeController::class, 'updateProfile'])->name('update');
            // Departments
            Route::get('/departments',             [NpCollegeController::class, 'departments'])->name('departments');
            Route::post('/departments',            [NpCollegeController::class, 'storeDepartment'])->name('departments.store');
            Route::put('/departments/{department}',[NpCollegeController::class, 'updateDepartment'])->name('departments.update');
            Route::delete('/departments/{department}',[NpCollegeController::class, 'destroyDepartment'])->name('departments.destroy');
            // Courses
            Route::get('/courses',         [NpCollegeController::class, 'courses'])->name('courses');
            Route::post('/courses',        [NpCollegeController::class, 'storeCourse'])->name('courses.store');
            Route::delete('/courses/{course}', [NpCollegeController::class, 'destroyCourse'])->name('courses.destroy');
        });

        // Criteria & Metrics
        Route::prefix('criteria')->name('criteria.')->group(function () {
            Route::get('/',                                    [NpCriterionController::class, 'index'])->name('index');
            Route::get('/{criterion}',                         [NpCriterionController::class, 'show'])->name('show');
            Route::get('/{criterion}/metrics/{metric}',        [NpCriterionController::class, 'entryShow'])->name('entry');
            Route::post('/{criterion}/metrics/{metric}/save',  [NpCriterionController::class, 'saveEntry'])->name('save-entry');
        });

        // Documents
        Route::prefix('documents')->name('documents.')->group(function () {
            Route::get('/',              [NpDocumentController::class, 'index'])->name('index');
            Route::get('/upload',        [NpDocumentController::class, 'create'])->name('create');
            Route::post('/',             [NpDocumentController::class, 'store'])->name('store');
            Route::get('/{document}/download', [NpDocumentController::class, 'download'])->name('download');
            Route::delete('/{document}', [NpDocumentController::class, 'destroy'])->name('destroy');
        });

        // AQAR
        Route::prefix('aqar')->name('aqar.')->group(function () {
            Route::get('/',                 [NpAqarController::class, 'index'])->name('index');
            Route::get('/create',           [NpAqarController::class, 'create'])->name('create');
            Route::post('/',                [NpAqarController::class, 'store'])->name('store');
            Route::get('/previous-years',   [NpAqarController::class, 'previousYears'])->name('previous-years');
            Route::get('/{aqar}',           [NpAqarController::class, 'show'])->name('show');
            Route::post('/{aqar}/sections/{section}/save', [NpAqarController::class, 'saveSection'])->name('save-section');
            Route::put('/{aqar}/status',    [NpAqarController::class, 'updateStatus'])->name('update-status');
            Route::delete('/{aqar}',        [NpAqarController::class, 'destroy'])->name('destroy');
        });

        // SSR Builder
        Route::prefix('ssr')->name('ssr.')->group(function () {
            Route::get('/',                      [NpSsrController::class, 'index'])->name('index');
            Route::get('/sections/{section}/edit',[NpSsrController::class, 'editSection'])->name('edit-section');
            Route::put('/sections/{section}',     [NpSsrController::class, 'updateSection'])->name('update-section');
        });

        // Committee Tasks
        Route::prefix('tasks')->name('tasks.')->group(function () {
            Route::get('/',           [NpTaskController::class, 'index'])->name('index');
            Route::get('/create',     [NpTaskController::class, 'create'])->name('create');
            Route::post('/',          [NpTaskController::class, 'store'])->name('store');
            Route::get('/{task}',     [NpTaskController::class, 'show'])->name('show');
            Route::put('/{task}',     [NpTaskController::class, 'update'])->name('update');
            Route::post('/{task}/comment', [NpTaskController::class, 'comment'])->name('comment');
            Route::delete('/{task}',  [NpTaskController::class, 'destroy'])->name('destroy');
        });

        // Feedback
        Route::prefix('feedback')->name('feedback.')->group(function () {
            Route::get('/',          [NpFeedbackController::class, 'index'])->name('index');
            Route::get('/create',    [NpFeedbackController::class, 'create'])->name('create');
            Route::post('/',         [NpFeedbackController::class, 'store'])->name('store');
            Route::get('/{form}',    [NpFeedbackController::class, 'show'])->name('show');
            Route::post('/{form}/toggle', [NpFeedbackController::class, 'toggleActive'])->name('toggle');
            Route::delete('/{form}', [NpFeedbackController::class, 'destroy'])->name('destroy');
        });

        // Best Practices
        Route::prefix('best-practices')->name('best-practices.')->group(function () {
            Route::get('/',          [NpBestPracticeController::class, 'index'])->name('index');
            Route::get('/create',    [NpBestPracticeController::class, 'create'])->name('create');
            Route::post('/',         [NpBestPracticeController::class, 'store'])->name('store');
            Route::get('/{bestPractice}/edit', [NpBestPracticeController::class, 'edit'])->name('edit');
            Route::put('/{bestPractice}',      [NpBestPracticeController::class, 'update'])->name('update');
            Route::delete('/{bestPractice}',   [NpBestPracticeController::class, 'destroy'])->name('destroy');
        });

        // Reports
        Route::prefix('reports')->name('reports.')->group(function () {
            Route::get('/criterion-completion', [NpReportController::class, 'criterionCompletion'])->name('criterion-completion');
            Route::get('/pending-tasks',        [NpReportController::class, 'pendingTasks'])->name('pending-tasks');
            Route::get('/departments',          [NpReportController::class, 'departmentReport'])->name('departments');
            Route::get('/documents',            [NpReportController::class, 'documents'])->name('documents');
        });
    });
});
