<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// operators / managers
Route::prefix('operator')
    ->middleware(['auth', 'role:operator|admin'])
    ->group(function () {
        Route::get('/front-desk', function () {
            return view('operator.front-desk');
        })->name('operator.front-desk');

        Route::get('/sena', function () {
            return view('operator.sena');
        })->name('operator.sena');
    });

// displays
Route::get('/', function () {
    return redirect()->route('display.front-desk');
});

Route::get('/front-desk', function () {
    return view('display.front-desk');
})->name('display.front-desk');

Route::get('/sena', function () {
    return view('display.sena');
})->name('display.sena');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
