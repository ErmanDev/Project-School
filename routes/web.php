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

// Academic Programs Routes - Removed
// Route::get('/academic-programs', [AcademicProgramsController::class, 'index'])->name('academic-programs.index');
// Route::get('/academic-programs/{slug}', [AcademicProgramsController::class, 'show'])->name('academic-programs.show');

// Admissions Routes
Route::get('/admissions/requirements', [AdmissionsController::class, 'requirements'])->name('admissions.requirements');
Route::get('/admissions/pre-registration', [AdmissionsController::class, 'preRegistration'])->name('admissions.pre-registration');
Route::get('/admissions/enrollment-form', [AdmissionsController::class, 'enrollmentForm'])->name('admissions.enrollment-form');

// News & Events Routes
Route::get('/news-and-events', [NewsAndEventsController::class, 'index'])->name('news-and-events.index');
Route::get('/news-and-events/{slug}', [NewsAndEventsController::class, 'show'])->name('news-and-events.show');

// Student Services Routes
Route::get('/student-services', [StudentServicesController::class, 'index'])->name('student-services.index');
Route::get('/student-services/{slug}', [StudentServicesController::class, 'show'])->name('student-services.show');

// Faculty & Staff Directory Routes - Removed
// Route::get('/directory', [FacultyStaffController::class, 'index'])->name('directory.index');
// Route::get('/directory/department/{slug}', [FacultyStaffController::class, 'showDepartment'])->name('directory.department');
// Route::get('/directory/person/{slug}', [FacultyStaffController::class, 'showPerson'])->name('directory.person');

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