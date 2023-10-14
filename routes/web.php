<?php

use App\Http\Controllers\SpeedtestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('welcome');
});

//Middleware Grup Dengan Syarat Pengguna Terautentikasi / Harus Login
Route::middleware('auth')->group(function () {
    //Dashboard Admin
    Route::prefix('admin')->group(function () {
        //Route Dashboard Admin
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        //Route Speedtest Admin
        Route::resource('speedtest', SpeedtestController::class);
        //Route Pengguna Admin
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        //Route Absen Admin
        Route::resource('absen', AbsenController::class);
    });

});

require __DIR__.'/auth.php';

