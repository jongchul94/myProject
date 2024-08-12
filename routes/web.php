<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\TaskController;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    return view('welcome');
});

//
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    });

    Route::get('account', function () {
        return view('account');
    });
});

Route::middleware(['throttle:uploads'])->group(function () {
    Route::post('/photos', function () {
        //
    });
});

// RateLimiter::for('uploads', function (Request $request) {
//     return Limit::perMinute(1000);
// });

Route::fallback(function () {
    //
});

Route::domain('api.myapp.com')->group(function () {
    Route::get('/', function () {
        return 'Hello World';
    });
});

// Route::get('/', [Controller::class, 'index']);

// Route::namespace('App\Http\Controllers\Dashboard')->group(function () {
//     // APP\Http\Controllers\Dashboard\PurchaseController
//     Route::get('dashboard/purchase', 'PurchaseController@index');
// });


// URL::route('invitations', ['invitaion' => 5816, 'group' => 678]);

// URL::signedRoute('invitations', ['invitaion' => 5816, 'group' => 678]);

// URL::temporarySignedRoute('invitations', now()->addHours(4), ['invitaion' => 5816, 'group' => 678]);


// Route::get('/', [TaskController::class, 'index']);
Route::get('tasks/create', [TaskController::class, 'create']);
Route::post('tasks', [TaskController::class, 'store']);

Route::resource('tasks', TaskController::class);
