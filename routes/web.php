<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\CertaintyFactor\DiagnosisController;
use App\Http\Controllers\CertaintyFactor\CertaintyFactorController;
use App\Http\Controllers\ForwardChaining\ForwardChainingController;
use App\Http\Controllers\ForwardChaining\RuleController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('landingpage');
});

// Redirect sesuai role ke dashboard masing-masing
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    // Jika user biasa, tampilkan view dashboard langsung (tanpa controller)
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

// Halaman profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Certainty Factor Diagnosis Routes
    Route::prefix('certainty-factor')->name('certainty-factor.')->group(function () {
        Route::get('/form', [DiagnosisController::class, 'index'])->name('form');
        Route::post('/store', [DiagnosisController::class, 'store'])->name('store');
        Route::post('/calculate', [DiagnosisController::class, 'calculate'])->name('calculate');
        Route::get('/history', [DiagnosisController::class, 'history'])->name('history');
    });

    // Forward Chaining Diagnosis Routes
    Route::prefix('forward-chaining')->name('forward-chaining.')->group(function () {
        Route::get('/form', [ForwardChainingController::class, 'showForm'])->name('form');
        Route::post('/diagnose', [ForwardChainingController::class, 'diagnose'])->name('diagnose');
        Route::get('/history', [ForwardChainingController::class, 'history'])->name('history');
        Route::post('/store', [ForwardChainingController::class, 'store'])->name('store');
    });
});

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Penyakit
    Route::resource('penyakit', PenyakitController::class);

    // Gejala
    Route::resource('gejala', GejalaController::class);

    // Certainty Factor
    Route::resource('certainty-factor', CertaintyFactorController::class);  

    // Rules
    Route::resource('rules', RuleController::class);
    Route::resource('forward-chaining', RuleController::class);
});

require __DIR__.'/auth.php';
