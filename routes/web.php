<?php

use App\Http\Controllers\Admin\CarouselController as AdminCarouselController;
use App\Http\Controllers\Admin\OrgController as AdminOrgController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\SettingsController as AdminSettingsController;
use App\Http\Controllers\Admin\UploadController as AdminUploadController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\PublicContentController;
use Illuminate\Support\Facades\Route;

// ── Public routes ──────────────────────────────────────────────────
Route::get('/',          [PublicContentController::class, 'home'])->name('home');
Route::get('/profil',    [PublicContentController::class, 'profil'])->name('profil');
Route::view('/layanan',  'layanan')->name('layanan');
Route::get('/informasi', [PublicContentController::class, 'informasi'])->name('informasi');
Route::get('/berita',    [PublicContentController::class, 'berita'])->name('berita');

// ── Admin area (access via /admin/login — no public link) ──────────
Route::prefix('admin')->name('admin.')->group(function () {

    // Auth (no middleware)
    Route::get('login',  [AdminLoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login.post')->middleware('guest');
    Route::post('logout',[AdminLoginController::class, 'logout'])->name('logout');

    // Protected
    Route::middleware('auth')->group(function () {
        Route::redirect('/', '/admin/posts');
        Route::post('upload',     [AdminUploadController::class, 'store'])->name('upload');
        Route::resource('posts',    AdminPostController::class)->except('show');
        Route::resource('carousel', AdminCarouselController::class)->except('show');
        Route::resource('org',      AdminOrgController::class)->except('show');
        Route::get ('settings',     [AdminSettingsController::class, 'index'])->name('settings.index');
        Route::post('settings',     [AdminSettingsController::class, 'update'])->name('settings.update');
    });
});

