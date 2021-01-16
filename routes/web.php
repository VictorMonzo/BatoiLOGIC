<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

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

//Ruta home
Route::get('/', function () { return view('home'); });

/**
 * Rutas Autenticación
 */
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('exit');
