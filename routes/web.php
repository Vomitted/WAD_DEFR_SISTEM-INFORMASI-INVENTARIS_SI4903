<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::middleware('cek.guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:10,1');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:10,1');
});

Route::middleware('cek.login')->group(function () {
    Route::get('/', [VendorController::class, 'index'])->name('home');
    Route::resource('vendors', VendorController::class)->except(['show']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Backwards compatibility for old native PHP link
    Route::get('/B_ModulVendorDanSupplier.php', function () {
        return redirect()->route('vendors.index');
    });
});
