<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [ProductController::class, 'show'])->middleware('auth')->name('products');
Route::get('/product/{id}', [ProductController::class, 'view'])->middleware('auth')->name('single_product');
Route::get('/cart', [OrderController::class, 'show'])->middleware('auth')->name('cart');

