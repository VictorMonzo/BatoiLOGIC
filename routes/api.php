<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Ruta API - Modificadas

// Esta
Route::apiResource('order-api', App\Http\Controllers\Api\OrderController::class);

Route::apiResource('state', App\Http\Controllers\Api\StateController::class);
Route::apiResource('product-api', App\Http\Controllers\Api\ProductController::class);
Route::apiResource('order-line', App\Http\Controllers\Api\OrderLineController::class);

// Esta
Route::apiResource('user-api', App\Http\Controllers\Api\UserController::class);

Route::apiResource('categorie', App\Http\Controllers\Api\CategorieController::class);
Route::apiResource('provider-api', App\Http\Controllers\Api\ProviderController::class);


Route::get('/order-dealer/{id}', [App\Http\Controllers\Api\OrderController::class, 'indexbyIdDealer'])->name('indexbyIdDealer');
Route::get('/order-customer/{id}', [App\Http\Controllers\Api\OrderController::class, 'indexByIdCustomer'])->name('indexByIdCustomer');
Route::get('/order-customer-all/{id}', [App\Http\Controllers\Api\OrderController::class, 'indexByIdCustomerAll'])->name('indexByIdCustomerAll');

// Ruta Auth
Route::post('login-dealer', [App\Http\Controllers\Api\LoginController::class, 'loginDealer']);
Route::post('login-customer', [App\Http\Controllers\Api\LoginController::class, 'loginCustomer']);
