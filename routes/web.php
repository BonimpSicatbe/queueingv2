<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// admin
Route::prefix('admin')
    ->group(function () {})->middleware(['auth', 'role:admin']);

// operators / managers
Route::prefix('operator')
    ->group(function () {
        Route::get('/front-desk', function () {
            return view('operator.front-desk');
        })->name('operator.front-desk');
    })->middleware(['auth']);

// officers
Route::prefix('officer')
    ->group(function () {})->middleware(['auth']);

// displays
Route::prefix('display')->group(function () {
    Route::get('/front-desk', function () {
        return view('display.front-desk');
    })->name('display.front-desk');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
