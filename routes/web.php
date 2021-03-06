<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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




Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login']);
Route::post('login/logout', [LoginController::class, 'logout']);


Route::get('usuarios', [UserController::class, 'index'])->name('usuarios')->middleware('auth');
Route::post('usuarios/store', [UserController::class, 'store'])->name('usuarios/store');
Route::post('usuarios/edit', [UserController::class, 'edit'])->name('usuarios/edit');
Route::post('usuarios/update', [UserController::class, 'update'])->name('usuarios/update');
