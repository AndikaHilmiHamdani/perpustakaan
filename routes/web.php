<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BooksController;
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
Route::resource('admin',AdminController::class);
Route::resource('books',BooksController::class);
Route::get('/jmlbooks', [App\Http\Controllers\BooksController::class, 'books'])->name('books');
Auth::routes();

Route::middleware(['web'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'user'])->name('dashboard');
    Route::get('/kajur', [App\Http\Controllers\HomeController::class, 'kajur'])->name('kajur');
});
