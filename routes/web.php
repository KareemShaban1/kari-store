<?php

use App\Http\Controllers\Auth\CustomVerificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('route/{parameter}/{optional_parameter?}',[Controller,'function/method'])->name('route_name);

// Route::group(
//     ['middleware' => ['auth:web']],
//     function () {
//     });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('verify', [CustomVerificationController::class, 'verify'])
    ->name('custom_verification');

Route::get('/verify', function () {
        return view('frontend.auth.verify');
    })->name('custom_verification');

require __DIR__.'/backend.php';

require __DIR__.'/frontend.php';