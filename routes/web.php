<?php

use App\Http\Controllers\AddController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::prefix('admin')->group(function () {
    Route::resource('admin', AdminController::class);
    Route::resource('books', BooksController::class);
    Route::resource('add-admin', AddController::class);
});
Route::middleware(['web'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'user'])->name('dashboard');
    Route::get('/kajur', [App\Http\Controllers\HomeController::class, 'kajur'])->name('kajur');
});

Route::resource('Transaksi', TransaksiController::class);

Route::resource('anggota', AnggotaController::class);

Route::get('/kembali/{id}', [App\Http\Controllers\AnggotaController::class, 'kembali'])->name('kembali');

// search
Route::get('/books/search', [BooksController::class, 'search']);
Route::get('/admin/search', [AdminController::class, 'search']);
Route::get('/transaksi/search', [TransaksiController::class, 'search']);
