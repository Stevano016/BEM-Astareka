<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{BerandaController, BeritaController, AspirasiController, TentangController};
use App\Http\Controllers\Admin;

// Frontend
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// Dashboard alias for Breeze
Route::middleware(['auth'])->get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');
Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

// Admin
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
    // Berita
    Route::resource('berita', Admin\BeritaController::class)->parameters([
        'berita' => 'berita'
    ]);
    Route::patch('berita/{berita}/publish', [Admin\BeritaController::class, 'togglePublish'])->name('berita.publish');

    // Aspirasi
    Route::get('aspirasi', [Admin\AspirasiController::class, 'index'])->name('aspirasi.index');
    Route::get('aspirasi/{id}', [Admin\AspirasiController::class, 'show'])->name('aspirasi.show');
    Route::patch('aspirasi/{id}/status', [Admin\AspirasiController::class, 'updateStatus'])->name('aspirasi.updateStatus');

    // Hero
    Route::get('hero', [Admin\HeroController::class, 'edit'])->name('hero.edit');
    Route::put('hero', [Admin\HeroController::class, 'update'])->name('hero.update');

    // Program Kerja
    Route::resource('program-kerja', Admin\ProgramKerjaController::class);

    // Struktur
    Route::resource('struktur', Admin\StrukturController::class);

    // Profile BEM
    Route::get('profile', [Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [Admin\ProfileController::class, 'update'])->name('profile.update');
});

// Auth routes (from Breeze)
require __DIR__.'/auth.php';
