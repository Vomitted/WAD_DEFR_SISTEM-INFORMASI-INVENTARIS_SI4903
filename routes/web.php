
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KendaraanController;


Route::get('/register', [RegisterController::class, 'index'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register']);


Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login']);


Route::middleware(['ceklogin'])->group(function () {

    // read
    Route::get('/', [KendaraanController::class, 'index'])
        ->name('kendaraan.index');

    // create
    Route::get('/kendaraan/tambah', [KendaraanController::class, 'create'])
        ->name('kendaraan.create');

    Route::post('/kendaraan', [KendaraanController::class, 'store'])
        ->name('kendaraan.store');

    // update
    Route::get('/kendaraan/edit/{id}', [KendaraanController::class, 'edit'])
        ->name('kendaraan.edit');

    Route::put('/kendaraan/{id}', [KendaraanController::class, 'update'])
        ->name('kendaraan.update');

    // delete
    Route::delete('/kendaraan/{id}', [KendaraanController::class, 'destroy'])
        ->name('kendaraan.destroy');

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');
});
