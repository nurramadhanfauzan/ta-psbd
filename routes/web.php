<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HeroController;

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

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('/', [HeroController::class, 'index'])->name('index'); 
Route::get('add', [HeroController::class, 'create'])->name('add'); 
Route::post('store', [HeroController::class, 'store'])->name('store');
Route::get('edit/{id}', [HeroController::class, 'edit'])->name('edit'); 
Route::post('update/{id}', [HeroController::class,  'update'])->name('update');
Route::get('removeIndex', [HeroController::class,  'removeIndex'])->name('removed');
Route::post('remove/{id}', [HeroController::class,  'softDelete'])->name('remove');
Route::get('restore/{id}', [HeroController::class, 'restore'])->name('restore');
Route::post('delete/{id}', [HeroController::class, 'destroy'])->name('delete');
Route::get('/search', [HeroController::class, 'search'])->name('search');