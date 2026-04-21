<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{BerandaController, BeritaController, AspirasiController, TentangController};
use App\Http\Controllers\Admin;
use App\Models\User;

use App\Http\Controllers\SitemapController;

// SEO
Route::get('/sitemap.xml', [SitemapController::class, 'index']);

// Frontend
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// Dashboard alias for Breeze
Route::middleware(['auth'])->get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');
Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store')->middleware('throttle:2,1');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

// Admin
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

    // SEKRETARIS (Berita, Proker, Kalender) + Admin
    Route::middleware(['role:' . User::ROLE_ADMIN . ',' . User::ROLE_SEKRETARIS])->group(function () {
        // Berita
        Route::resource('berita', Admin\BeritaController::class)->parameters([
            'berita' => 'berita'
        ]);
        Route::patch('berita/{berita}/publish', [Admin\BeritaController::class, 'togglePublish'])->name('berita.publish');

        // Program Kerja
        Route::resource('program-kerja', Admin\ProgramKerjaController::class);

        // Kalender
        Route::resource('kalender', Admin\KalenderController::class);
    });

    // MENDAGRI (Aspirasi) + Admin
    Route::middleware(['role:' . User::ROLE_ADMIN . ',' . User::ROLE_MENDAGRI])->group(function () {
        // Aspirasi
        Route::get('aspirasi', [Admin\AspirasiController::class, 'index'])->name('aspirasi.index');
        Route::get('aspirasi/export', [Admin\AspirasiController::class, 'export'])->name('aspirasi.export'); // New Export Route
        Route::get('aspirasi/{aspirasi}', [Admin\AspirasiController::class, 'show'])->name('aspirasi.show');
        Route::patch('aspirasi/{aspirasi}/status', [Admin\AspirasiController::class, 'updateStatus'])->name('aspirasi.updateStatus');
        Route::delete('aspirasi/{aspirasi}', [Admin\AspirasiController::class, 'destroy'])->name('aspirasi.destroy')->middleware('can:delete,aspirasi');
    });

    // ADMIN ONLY
    Route::middleware(['role:' . User::ROLE_ADMIN])->group(function () {
        // Hero
        Route::get('hero', [Admin\HeroController::class, 'edit'])->name('hero.edit');
        Route::put('hero', [Admin\HeroController::class, 'update'])->name('hero.update');

        // Struktur
        Route::resource('struktur', Admin\StrukturController::class);

        // Profile BEM
        Route::get('profile', [Admin\ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [Admin\ProfileController::class, 'update'])->name('profile.update');

        // SEO
        Route::get('seo', function() {
            return view('admin.seo');
        })->name('seo.index');
    });
});

// Auth routes (from Breeze)
require __DIR__.'/auth.php';
