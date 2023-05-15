<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardPage;
use App\Http\Controllers\Master\BarangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth Pages Route
Route::group(['middleware' => ['guest']], function () {
   Route::get('/login', [LoginController::class, 'showLoginPages'])->name('login.view');
   Route::post('/login', [LoginController::class, 'loginProcess'])->name('login');
});
Route::group(['middleware' => ['auth']], function () {
   Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Admin Pages
Route::get('/', [DashboardPage::class, 'index'])->name('dashboard')->middleware('auth');

Route::prefix('master')->name('master.')->middleware('auth')->group(function () {

   // Master Pages Route
   Route::resource('barang', BarangController::class);
});
