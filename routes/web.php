<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlatController;

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

/*Route::get('/', function () {
    return view('index');
});*/

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/logout', [LogoutController::class, 'index'])->name('logout');

Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/flat', [FlatController::class, 'index'])->name('flat');
Route::get('/flat/create', [FlatController::class, 'create'])->name('flat.create');
Route::post('/flat', [FlatController::class, 'store']);
Route::get('/flat/{id}/edit', [FlatController::class, 'edit'])->name('flat.edit');
Route::post('/flat/{id}/update', [FlatController::class, 'update'])->name('flat.update');
Route::get('flat/{id}/destroy', [FlatController::class, 'destroy']);
