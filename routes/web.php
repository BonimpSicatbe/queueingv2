<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/**
 *
 * admin / super admin
 *
 **/
Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('admin.user.edit');
    });

/**
 *
 * operators / managers
 *
 **/

Route::prefix('operator')
    ->middleware(['auth', 'role:operator|officer|admin'])
    ->group(function () {
        Route::get('/queue-display', function () {
            return view('operator.queue-display');
        })->name('operator.queue-display');

        Route::get('/sena', function () {
            return view('operator.sena');
        })->name('operator.sena');
    });

/*
 *
 * public screen displays
 *
 * */
Route::get('/queue-display', function () {
    return view('display.queue-display');
})->name('display.queue-display');

Route::get('/', function () {
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('display.queue-display');
    }

    if ($user->role === 'admin' || $user->role === 'operator' || $user->role === 'officer') {
        return redirect()->route('operator.queue-display');
    } else {
        return redirect()->route('operator.queue-display');
    }
})->name('homepage');

// // front-desk
// Route::get('/front-desk', function () {
//     return view('display.front-desk');
// })->name('display.front-desk');

// // sena
// Route::get('/sena', function () {
//     return view('display.sena');
// })->name('display.sena');

/**
 *
 * fethching of qz tray private key
 *
 **/
Route::post('/sign', function (Request $request) {
    $toSign = $request->input('toSign');

    // Load your private key (ensure this is stored securely)
    $privateKey = file_get_contents(public_path('keys/private-key.pem'));

    openssl_sign($toSign, $signature, $privateKey, OPENSSL_ALGO_SHA512);

    return base64_encode($signature);
});

// welcome interface
Route::prefix('/welcome')
    ->as('welcome.')
    ->group(function () {
        // test template
        Route::get('/test', function () {
            return view('welcome.partials.ticket-layout', [
                'queue_number' => request()->get('queue_number'),
                'queue_type' => request()->get('queue_type'),
            ]);
        })->name('queue.print');

        // default
        Route::get('/', function () {
            return view('welcome.index');
        })->name('index');

        // receiving
        Route::get('/receiving', function () {
            return view('welcome.receiving');
        })->name('receiving');

        // compliance
        Route::get('/compliance', function () {
            return view('welcome.compliance');
        })->name('compliance');

        // sena
        Route::get('/sena-inquiries', function () {
            return view('welcome.sena-inquiries');
        })->name('sena-inquiries');

        // inquiries
        Route::get('/inquiries', function () {
            return view('welcome.inquiries');
        })->name('inquiries');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
