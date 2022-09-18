<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlatController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ReceiptController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/flat', [FlatController::class, 'index'])->name('flat');
    Route::get('/flat/create', [FlatController::class, 'create'])->name('flat.create');
    Route::post('/flat', [FlatController::class, 'store']);
    Route::get('/flat/{id}/edit', [FlatController::class, 'edit'])->name('flat.edit');
    Route::post('/flat/{id}/update', [FlatController::class, 'update'])->name('flat.update');
    Route::get('/flat/{id}/destroy', [FlatController::class, 'destroy']);

    Route::get('/tenant', [TenantController::class, 'index'])->name('tenant');
    Route::get('/tenant/create', [TenantController::class, 'create'])->name('tenant.create');
    Route::post('/tenant', [TenantController::class, 'store']);
    Route::get('/tenant/{id}/edit', [TenantController::class, 'edit'])->name('tenant.edit');
    Route::post('/tenant/{id}/update', [TenantController::class, 'update'])->name('tenant.update');
    Route::get('/tenant/{id}/destroy', [TenantController::class, 'destroy']);

    Route::get('/receipt', [ReceiptController::class, 'index'])->name('receipt');
    Route::post('/receipt/generate', [ReceiptController::class, 'generate'])->name('receipt.generate');
});