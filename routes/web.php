<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\OrderLineController;
use App\Http\Controllers\ProductController;

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

/**
 * Rutas Controladores
 */
Route::resource('order', OrderController::class);
Route::resource('user', UserController::class);
Route::resource('provider', ProviderController::class);
Route::resource('orderLine', OrderLineController::class);
Route::resource('product', ProductController::class);

Route::get('/order-no-dealer', [App\Http\Controllers\OrderController::class, 'noDealer'])->name('noDealer');
Route::get('/order/{id}/create', [App\Http\Controllers\OrderController::class, 'createIdProduct'])->name('createIdProduct');

Route::get('/product/categorie/{id}', [App\Http\Controllers\ProductController::class, 'indexByCategorie'])->name('indexByCategorie');

// Ruta home
Route::get('/', [App\Http\Controllers\ProductController::class, 'productsHome'])->name('home');

// Ruta about
Route::get('/about', function () { return view('about'); })->name('about');

/**
 * Rutas Autenticación
 */
Auth::routes();
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('exit');
