<?php

use App\Http\Controllers\applicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\shareButtonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\JobSearchController;
use App\Http\Controllers\PortifolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\JobSearch;
use App\Models\PortfolioProject;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;

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
// Route::get('/profile', function () {
//     return view('profile');
// })->name('profile');

Route::post('/upload-resume', [ResumeController::class, 'upload']);
Route::get('/resumes', [ResumeController::class, 'index']);
// routes/web.php
Route::get('resumes/{id}', [ResumeController::class, 'show'])->name('resumes.show');
<<<<<<< HEAD
// for me
Route::resource('jobs',JobController::class);
Route::resource('applications',applicationController::class);
//this is a custom route for calling the custom registartion route (to send the industries)
use App\Http\Controllers\Auth\CustomAuthController;
Route::get('/register', [CustomAuthController::class, 'showRegistrationForm'])->name('register');
=======

Route::middleware(['auth'])->group(function () {
    Route::get('/job-search', [JobSearchController::class, 'index'])->name('job.search');
    Route::post('/job-search', [JobSearchController::class, 'search'])->name('job.search');
    Route::get('/job/{id}', [JobSearchController::class, 'getJobDetails'])->name('job.details');
    Route::post('/apply/{job}', [JobSearchController::class, 'apply'])->name('job.apply');
});

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/portifolio', [PortifolioController::class, 'index'])->name('portfolio.index');
Route::post('/portifolio', [PortifolioController::class, 'store'])->name('portfolio.store');
>>>>>>> 69c1e50 (Candidates)
