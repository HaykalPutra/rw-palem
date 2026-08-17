<?php

use App\Http\Controllers\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Admin\CarouselController as AdminCarouselController;
use App\Http\Controllers\Admin\OrgController as AdminOrgController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\SettingsController as AdminSettingsController;
use App\Http\Controllers\Admin\UploadController as AdminUploadController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminPasswordResetController;
use App\Http\Controllers\PublicContentController;
use Illuminate\Support\Facades\Route;

// ── Public routes ──────────────────────────────────────────────────
Route::get('/',          [PublicContentController::class, 'home'])->name('home');
Route::get('/profil',    [PublicContentController::class, 'profil'])->name('profil');
Route::get('/layanan',   [PublicContentController::class, 'layanan'])->name('layanan');
Route::get('/informasi', [PublicContentController::class, 'informasi'])->name('informasi');
Route::get('/informasi/{post}', [PublicContentController::class, 'showInformasi'])->name('informasi.show');
Route::get('/berita',    [PublicContentController::class, 'berita'])->name('berita');
Route::get('/berita/{post}', [PublicContentController::class, 'showBerita'])->name('berita.show');

// ── Admin area (access via /admin/login — no public link) ──────────
Route::prefix('admin')->name('admin.')->group(function () {

    // Auth (no middleware)
    Route::middleware('guest')->group(function () {
        Route::get('login',  [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminLoginController::class, 'login'])->name('login.post')->middleware('throttle:5,1');

        Route::get('forgot-password',  [AdminPasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
        Route::post('forgot-password', [AdminPasswordResetController::class, 'sendResetLink'])->name('password.email')->middleware('throttle:5,1');
        Route::get('reset-password/{token}', [AdminPasswordResetController::class, 'showResetForm'])->name('password.reset');
        Route::post('reset-password',  [AdminPasswordResetController::class, 'resetPassword'])->name('password.update')->middleware('throttle:5,1');
    });

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
        Route::get ('akun',         [AdminAccountController::class, 'edit'])->name('account.edit');
        Route::post('akun/password',[AdminAccountController::class, 'updatePassword'])->name('account.password');
    });
});

