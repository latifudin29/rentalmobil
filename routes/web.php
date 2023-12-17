<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TransactionController;

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

// LOGIN
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

// REGISTER
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

// HOME
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// MANAGE CARS
Route::get('car/tampil', [CarController::class, 'tampilcar'])->name('tampilcar')->middleware('auth');
Route::get('car/tambah', [CarController::class, 'tambahcar'])->name('tambahcar')->middleware('auth');
Route::post('car/simpan', [CarController::class, 'simpancar'])->name('simpancar')->middleware('auth');
Route::get('car/ubah/{id}', [CarController::class, 'ubahcar'])->name('ubahcar')->middleware('auth');
Route::put('car/update/{id}', [CarController::class, 'updatecar'])->name('updatecar')->middleware('auth');
Route::get('car/hapus/{id}', [CarController::class, 'hapuscar'])->name('hapuscar')->middleware('auth');

// HISTORY SEWA
Route::get('history/tampil', [TransactionController::class, 'tampilhistori'])->name('tampilhistori')->middleware('auth');
Route::get('trans/tambah/{id}', [TransactionController::class, 'tambahsewa'])->name('tambahsewa')->middleware('auth');
Route::post('trans/simpan', [TransactionController::class, 'simpansewa'])->name('simpansewa')->middleware('auth');

// LOGOUT
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');