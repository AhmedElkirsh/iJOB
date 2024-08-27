<?php

use App\Http\Controllers\applicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\shareButtonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\EmployerController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/upload-resume', function () {
    return view('resume_upload');
});

Route::post('/upload-resume', [ResumeController::class, 'upload']);
Route::get('/resumes', [ResumeController::class, 'index']);
// routes/web.php
Route::get('resumes/{id}', [ResumeController::class, 'show'])->name('resumes.show');
// for me
Route::resource('jobs',JobController::class);
Route::resource('applications',applicationController::class);
Route::get('/application/{id}/view', [ApplicationController::class, 'view'])->name('application.view');


Route::get('/employer/{user_id}/applications', [EmployerController::class, 'showApplications'])->name('employer.showApplications');

Route::post('/employer/application/{application}/accept', [EmployerController::class, 'acceptApplication'])->name('employer.acceptApplication');
Route::post('/employer/application/{application}/reject', [EmployerController::class, 'rejectApplication'])->name('employer.rejectApplication');
//Route::post('/employer/application/{application}/view', [EmployerController::class, 'viewApplication'])->name('employer.viewApplication');



Route::get('employer/{user_id}/applications/status', [EmployerController::class, 'showApplicationsByStatus'])->name('employer.showApplicationsByStatus');

// Route::get('/employer/jobs/{id}', [EmployerController::class, 'showJobs'])->name('employer.jobs');
// Route::post('/employer/jobs/applications', [EmployerController::class, 'showApplications'])->name('employer.jobs.applications');
