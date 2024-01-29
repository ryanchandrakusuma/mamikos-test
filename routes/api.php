<?php

use App\Http\Controllers\Auth\AuthOwnerController;
use App\Http\Controllers\KostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//public API
Route::post('/owner/register', [AuthOwnerController::class, 'register'])->name('api.owner.register');
Route::post('/owner/login', [AuthOwnerController::class, 'login'])->name('api.owner.login');

Route::get('/kosts', [KostController::class, 'index'])->name('api.kost.index');
Route::get('/kosts/{id}', [KostController::class, 'show'])->name('api.kost.show');

Route::middleware('auth:owners')->group(function () {
    Route::post('/owner/logout', [AuthOwnerController::class, 'logout'])->name('api.owner.logout');

    Route::middleware('role:owner')->group(function () {
        Route::post('/kosts', [KostController::class, 'store'])->name('api.kost.store');
    });
});
