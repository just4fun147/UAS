<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/pesawats', App\Http\Controllers\PesawatController::class);
Route::apiResource('/keretas', App\Http\Controllers\KeretaController::class);
Route::apiResource('/buses', App\Http\Controllers\BusController::class);
Route::apiResource('/logins', App\Http\Controllers\LoginController::class);
Route::apiResource('/registers', App\Http\Controllers\UserController::class);
Route::apiResource('/verif/{id}', App\Http\Controllers\VerifController::class);

Route::get('email/verify/{id}', [EmailController::class, 'verify'])->name('verification.verify');
Route::get('email/resend', [EmailController::class, 'resend'])->name('verification.resend');

// Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//     ->middleware(['signed', 'throttle:6,1'])
//     ->name('verification.verify');

// // Resend link to verify email
// Route::post('/email/verify/resend', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth:api', 'throttle:6,1'])->name('verification.send');