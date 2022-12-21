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
Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'show']);
Route::post('/users/{id}', [App\Http\Controllers\UserController::class, 'update']);

Route::apiResource('/verif', App\Http\Controllers\VerifController::class);
Route::post('/verif/{id}', [App\Http\Controllers\VerifController::class, 'store']);

Route::get('email/verify/{id}', [EmailController::class, 'verify'])->name('verification.verify');
Route::get('email/resend', [EmailController::class, 'resend'])->name('verification.resend');

Route::get('ticketKereta/{id}', [App\Http\Controllers\TicketController::class, 'getKereta']);
Route::get('ticketBus/{id}', [App\Http\Controllers\TicketController::class, 'getBus']);
Route::get('ticketPesawat/{id}', [App\Http\Controllers\TicketController::class, 'getPesawat']);

Route::post('ticketKereta/lunas/{id}', [App\Http\Controllers\TicketController::class, 'lunasKereta']);
Route::post('ticketBus/lunas/{id}', [App\Http\Controllers\TicketController::class, 'lunasBus']);
Route::post('ticketPesawat/lunas/{id}', [App\Http\Controllers\TicketController::class, 'lunasPesawat']);

Route::post('ticketKereta/{id}', [App\Http\Controllers\TicketController::class, 'kereta']);
Route::post('ticketPesawat/{id}', [App\Http\Controllers\TicketController::class, 'pesawat']);
Route::post('ticketBus/{id}', [App\Http\Controllers\TicketController::class, 'bus']);

Route::post('ticketKereta', [App\Http\Controllers\TicketController::class, 'storeKereta']);
Route::post('ticketPesawat', [App\Http\Controllers\TicketController::class, 'storePesawat']);
Route::post('ticketBus', [App\Http\Controllers\TicketController::class, 'storeBus']);

Route::delete('ticketKeretas/{id}', [App\Http\Controllers\TicketController::class, 'destroyKereta']);
Route::delete('ticketPesawats/{id}', [App\Http\Controllers\TicketController::class, 'destroyPesawat']);
Route::delete('ticketBuses/{id}', [App\Http\Controllers\TicketController::class, 'destroyBus']);

// Route::delete('/pesawats/{id}', [App\Http\Controllers\PesawatController::class, 'destroy']);
Route::delete('/keretas/{id}', [App\Http\Controllers\KeretasController::class, 'destroy']);
Route::delete('/buses/{id}', [App\Http\Controllers\BusController::class, 'destroy']);

Route::post('/buses/{id}', [App\Http\Controllers\BusController::class, 'update']);
Route::post('/keretas/{id}', [App\Http\Controllers\KeretaController::class, 'update']);
Route::post('/pesawats/{id}', [App\Http\Controllers\PesawatController::class, 'update']);