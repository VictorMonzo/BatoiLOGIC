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

//Ruta home
Route::get('/', function () { return view('home'); });

//Ruta para guardar imágenes
//Route::get('formulario', 'StorageController@index');
//Route::post('storage/create', 'StorageController@save');

/**
 * Rutas Autenticación
 */
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('exit');
