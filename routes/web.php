<?php

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

use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('surat', SuratMasukController::class);
    Route::get('/surat-cetak', [SuratMasukController::class, 'print'])->name('surat.print');
    Route::get('/surat-excel', [SuratMasukController::class, 'exportExcel'])->name('surat.excel');
    Route::get('/surat-word', [SuratMasukController::class, 'exportWord'])->name('surat.word');

    Route::resource('surat-keluar', SuratKeluarController::class);
    Route::get('/surat-keluar-cetak', [SuratKeluarController::class, 'print'])->name('surat-keluar.print');
    Route::get('/surat-keluar-excel', [SuratKeluarController::class, 'exportExcel'])->name('surat-keluar.excel');
    Route::get('/surat-keluar-word', [SuratKeluarController::class, 'exportWord'])->name('surat-keluar.word');

    Route::resource('menu', MenuController::class);
    Route::resource('user', UserController::class);
});
