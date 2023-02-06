<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'inicio'])->name('inicio');

Route::get('/contacto', [MainController::class, 'contacto'])->name('contacto');

Route::get('/trabaja', [MainController::class, 'trabaja'])->name('trabaja');

Route::resource('discos', 'App\Http\Controllers\DiscoController');

Auth::routes();

// RUTAS PARA EL CARRITO DE COMPRA

Route::post('/cart-add', [CartController::class, 'add'])->name('cart.add');

Route::get('/cart-cart',[CartController::class , 'cart'])->name('cart.cart');

Route::get('/cart-checkout',[CartController::class , 'checkout'])->name('cart.checkout');

Route::post('/cart-update', [CartController::class, 'update'])->name('cart.update');

Route::post('/cart-clear', [CartController::class, 'clear'])->name('cart.clear');

Route::post('/cart-removeitem', [CartController::class , 'removeitem'])->name('cart.removeitem');
