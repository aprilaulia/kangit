<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Login Routes
Route::get('/', [AuthController::class, 'index']);
Route::post('/cek_login', [AuthController::class, 'cek_login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Admin-only Routes
Route::group(['middleware' => ['auth', 'checkRole:admin']], function() {
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy']);

    // AuthController-specific routes for user management
    Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/auth/store', [AuthController::class, 'store'])->name('auth.store');
    Route::get('/auth/{id}/edit', [AuthController::class, 'edit'])->name('auth.edit');
    Route::post('/auth/{id}/update', [AuthController::class, 'update'])->name('auth.update');
    Route::get('/auth/{id}/delete', [AuthController::class, 'destroy'])->name('auth.destroy');
});

// Routes for Admin, Petugas, and Pimpinan Users
Route::group(['middleware' => ['auth', 'checkRole:admin,petugas,pimpinan']], function() {
    Route::get('/home', [HomeController::class, 'index']);
});
