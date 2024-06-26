<?php

use App\Http\Controllers\NoFoundController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;




Route::resource('users', UserController::class)->names('users.avances');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('stories', StoryController::class)->middleware('\App\Http\Middleware\CheckProfesional');
    Route::get('/patient',[PatientController::class,'index'])->name('patient.index')->middleware('\App\Http\Middleware\CheckRole');
    Route::put('/patient/{id}',[PatientController::class,'update'])->name('patient.update')->middleware('\App\Http\Middleware\CheckRole');
    Route::get('/stories/{story}', [StoryController::class, 'show'])->name('stories.show');
    Route::get('/nofound',[NoFoundController::class,'index'])->name('nofound.index');
    

});
require __DIR__.'/auth.php';