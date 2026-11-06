<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Static pages
Route::get('/about',      [StaticPageController::class, 'about'])->name('about');
Route::get('/services',   [StaticPageController::class, 'services'])->name('services');
Route::get('/skills',     [StaticPageController::class, 'skills'])->name('skills');
Route::get('/experience', [StaticPageController::class, 'experience'])->name('experience');
Route::get('/privacy',    [StaticPageController::class, 'privacy'])->name('privacy');
Route::get('/resume',     [StaticPageController::class, 'resume'])->name('resume');

// Projects
Route::get('/work',       [ProjectController::class, 'index'])->name('projects.index');
Route::get('/work/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// Contact
Route::get('/contact',  [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Sitemap
Route::get('/sitemap.xml', [StaticPageController::class, 'sitemap'])->name('sitemap');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Auth
    Route::get('/login',  [Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [Admin\AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [Admin\AuthController::class, 'logout'])->name('logout');

    // Protected admin area
    Route::middleware(['admin'])->group(function () {

        Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

        // Projects
        Route::resource('projects', Admin\ProjectController::class);

        // Messages
        Route::get('/messages', [Admin\MessageController::class, 'index'])->name('messages.index');
        Route::get('/messages/{message}', [Admin\MessageController::class, 'show'])->name('messages.show');
        Route::patch('/messages/{message}/read', [Admin\MessageController::class, 'markRead'])->name('messages.read');
        Route::delete('/messages/{message}', [Admin\MessageController::class, 'destroy'])->name('messages.destroy');

        // Skills
        Route::get('/skills', [Admin\SkillController::class, 'index'])->name('skills.index');

        // Services
        Route::get('/services', [Admin\ServiceController::class, 'index'])->name('services.index');

        // Experience
        Route::get('/experiences', [Admin\ExperienceController::class, 'index'])->name('experiences.index');

        // Settings
        Route::get('/settings', [Admin\SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [Admin\SettingController::class, 'update'])->name('settings.update');

        // CV Upload
        Route::post('/cv/upload', [Admin\CvController::class, 'upload'])->name('cv.upload');
    });
});
