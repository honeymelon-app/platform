<?php

use App\Http\Controllers\SeoController;
use App\Http\Controllers\Web\Admin\ArtifactController;
use App\Http\Controllers\Web\Admin\DashboardController;
use App\Http\Controllers\Web\Admin\FaqController;
use App\Http\Controllers\Web\Admin\LicenseController;
use App\Http\Controllers\Web\Admin\OrderController;
use App\Http\Controllers\Web\Admin\ReleaseController;
use App\Http\Controllers\Web\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Web\Auth\NewPasswordController;
use App\Http\Controllers\Web\Auth\PasswordResetLinkController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| SEO Routes (robots.txt and sitemap.xml)
|--------------------------------------------------------------------------
*/
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('robots');
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', HomeController::class)->name('home');

// SEO-friendly redirects to landing page sections (301 for search engines)
Route::redirect('/pricing', '/#pricing', 301)->name('pricing');
Route::redirect('/download', '/#download', 301)->name('download');

Route::get('/privacy', function () {
    return Inertia::render('Privacy');
})->name('privacy');

Route::get('/terms', function () {
    return Inertia::render('Terms');
})->name('terms');

/*
|--------------------------------------------------------------------------
| Admin Auth Routes (No public registration)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Authenticated)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Redirect dashboard to admin dashboard (no customer dashboard - admin only platform)
    Route::get('dashboard', fn () => redirect()->route('admin.dashboard'))->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('releases', ReleaseController::class)->only(['index', 'show', 'destroy']);
        Route::post('releases/{release}/publish', [ReleaseController::class, 'publish'])->name('releases.publish');
        Route::post('releases/{release}/unpublish', [ReleaseController::class, 'unpublish'])->name('releases.unpublish');
        Route::resource('artifacts', ArtifactController::class)->only(['index', 'show', 'destroy']);
        Route::resource('licenses', LicenseController::class)->only(['index', 'show', 'store']);
        Route::post('licenses/{license}/revoke', [LicenseController::class, 'revoke'])->name('licenses.revoke');
        Route::post('licenses/{license}/reset-activation', [LicenseController::class, 'resetActivation'])->name('licenses.reset-activation');
        Route::resource('orders', OrderController::class)->only(['index', 'show']);
        Route::post('orders/{order}/refund', [OrderController::class, 'refund'])->name('orders.refund');
        Route::resource('faqs', FaqController::class)->only(['index', 'store', 'update', 'destroy']);
    });
});

require __DIR__.'/settings.php';
