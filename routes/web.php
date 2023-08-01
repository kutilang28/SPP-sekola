<?php

use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaLogin;
use App\Http\Controllers\SppController;
use App\Http\Controllers\TransaksiController;
use GuzzleHttp\Middleware;

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

// Route::get('/', function () {
//     return view('dashboard');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::group(['middleware' => ['auth']], function () {
    Route::get('admin', [AdminLogin::class, 'index'])->name('admin');
    Route::get('siswaa', [SiswaLogin::class, 'index'])->name('siswaa');
    Route::get('petugas', [PetugasController::class, 'index'])->name('petugas');
});

Route::middleware(['level:admin'])->group(function () {
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('spp', SppController::class);
    Route::resource('petugas', PetugasController::class);
    Route::resource('transaksi', TransaksiController::class);
});
Route::middleware(['level:petugas'])->group(function () {
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('spp', SppController::class);
    Route::resource('petugas', PetugasController::class);
    Route::resource('transaksi', TransaksiController::class);
});

// Route::get('/siswadash', [])->middleware(['level:siswa']);

