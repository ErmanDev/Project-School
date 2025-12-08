<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AcademicProgramsController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\AdmissionsController;
use App\Http\Controllers\NewsAndEventsController;
use App\Http\Controllers\StudentServicesController;
use App\Http\Controllers\FacultyStaffController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentManagementController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FileManagementController;
use App\Http\Controllers\Admin\AnalyticsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

// Academic Programs Routes - per level overview pages
Route::view('/academic-programs/preschool', 'academic-programs.preschool')->name('academic-programs.preschool');
Route::view('/academic-programs/elementary', 'academic-programs.elementary')->name('academic-programs.elementary');
Route::view('/academic-programs/junior-high', 'academic-programs.junior-high')->name('academic-programs.junior-high');
Route::view('/academic-programs/senior-high', 'academic-programs.senior-high')->name('academic-programs.senior-high');
Route::view('/academic-programs/college', 'academic-programs.college')->name('academic-programs.college');
Route::view('/academic-programs/course-descriptions', 'academic-programs.course-descriptions')->name('academic-programs.course-descriptions');
Route::view('/academic-programs/admission-graduation-requirements', 'academic-programs.admission-graduation-requirements')->name('academic-programs.admission-graduation-requirements');

// Admissions Routes
Route::view('/admissions/guidelines', 'admissions.guidelines')->name('admissions.guidelines');
Route::get('/admissions/requirements', [AdmissionsController::class, 'requirements'])->name('admissions.requirements');
Route::view('/admissions/list-of-requirements', 'admissions.list-of-requirements')->name('admissions.list-of-requirements');
Route::view('/admissions/download-requirements', 'admissions.download-requirements')->name('admissions.download-requirements');
Route::get('/admissions/pre-registration', [AdmissionsController::class, 'preRegistration'])->name('admissions.pre-registration');
Route::get('/admissions/enrollment-form', [AdmissionsController::class, 'enrollmentForm'])->name('admissions.enrollment-form');

// News & Events Routes
Route::get('/news-and-events', [NewsAndEventsController::class, 'index'])->name('news-and-events.index');
Route::get('/news-and-events/gallery', [NewsAndEventsController::class, 'gallery'])->name('news-and-events.gallery');
Route::get('/news-and-events/{slug}', [NewsAndEventsController::class, 'show'])->name('news-and-events.show');

// Student Services Routes
Route::get('/student-services', [StudentServicesController::class, 'index'])->name('student-services.index');
Route::get('/student-services/{slug}', [StudentServicesController::class, 'show'])->name('student-services.show');

// Faculty & Staff Routes
Route::get('/faculty-staff/academic-personnel', [FacultyStaffController::class, 'academicPersonnel'])->name('faculty-staff.academic-personnel');
Route::get('/faculty-staff/non-academic-personnel', [FacultyStaffController::class, 'nonAcademicPersonnel'])->name('faculty-staff.non-academic-personnel');
Route::get('/faculty-staff/departmental-details', [FacultyStaffController::class, 'departmentalDetails'])->name('faculty-staff.departmental-details');

// Alumni Corner (public)
Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni.index');

// Contact Us (public)
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Downloads Routes
Route::get('/downloads', [DownloadsController::class, 'index'])->name('downloads.index');
Route::get('/downloads/{slug}/download', [DownloadsController::class, 'download'])->name('downloads.download');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Content Management Route
    Route::get('/content-management', [ContentManagementController::class, 'index'])->name('content-management.index');
    
    // Admin Content Management Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        // Pages
        Route::resource('pages', PageController::class);
        
        // News
        Route::resource('news', NewsController::class);
        
        // Announcements
        Route::resource('announcements', AnnouncementController::class);
        
        // Events
        Route::resource('events', EventController::class);
        
        // File Management
        Route::prefix('files')->name('files.')->group(function () {
            Route::get('/', [FileManagementController::class, 'index'])->name('index');
            Route::get('/preview', [FileManagementController::class, 'preview'])->name('preview');
            Route::post('/upload', [FileManagementController::class, 'upload'])->name('upload');
            Route::post('/directory', [FileManagementController::class, 'createDirectory'])->name('directory.create');
            Route::delete('/delete', [FileManagementController::class, 'destroy'])->name('destroy');
        });

        // Analytics
        Route::get('/analytics/stats', [AnalyticsController::class, 'getStats'])->name('analytics.stats');
    });
});

require __DIR__.'/auth.php';