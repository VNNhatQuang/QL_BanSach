<?php

use App\Http\Controllers\Sell\AuthController;
use App\Http\Controllers\Sell\HomeController;
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


// SELL

Route::get('/', [AuthController::class, 'showLogin'])->name('auth.showLogin');
Route::post('/', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/home/{idLoai?}', [HomeController::class, 'index'])->name('home.index');
Route::get('/addToCart', [HomeController::class, 'addToCart'])->name('home.addToCart');
Route::get('/cart', [HomeController::class, 'showCart'])->name('cart.index');
Route::get('/handelCart', [HomeController::class, 'handelCart'])->name('cart.handle');





// ADMIN
