<?php

use App\Http\Controllers\Auth\AuthOwnerController;
use App\Http\Controllers\Auth\AuthUserController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\UserKostRequestController;
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

Route::post('/user/register', [AuthUserController::class, 'register'])->name('api.user.register');
Route::post('/user/login', [AuthUserController::class, 'login'])->name('api.user.login');

Route::get('/kosts', [KostController::class, 'index'])->name('api.kost.index');
Route::get('/kosts/{id}', [KostController::class, 'show'])->name('api.kost.show');

Route::middleware(['auth:owners', 'role:owner'])->group(function () {
    Route::post('/owner/logout', [AuthOwnerController::class, 'logout'])->name('api.owner.logout');
    Route::post('/kosts', [KostController::class, 'store'])->name('api.kost.store');
    Route::put('/kosts/{id}', [KostController::class, 'update'])->name('api.kost.update');
    Route::delete('/kosts/{id}', [KostController::class, 'destroy'])->name('api.kost.destroy');
});

Route::middleware(['auth:users', 'role:premium-user|regular-user'])->group(function () {
    Route::post('/user/logout', [AuthUserController::class, 'logout'])->name('api.user.logout');
    Route::post('/kosts/{id}/ask', [UserKostRequestController::class, 'store'])->name('api.kost.ask.store');
});
