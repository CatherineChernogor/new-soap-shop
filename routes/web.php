<?php

use App\Events\BuyEvent;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
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

Route::view('/', 'welcome');

Route::prefix('admin')->group(function () {

    Route::get('products', [AdminProductController::class, 'show'])->middleware('auth')->name('admin_products');
    Route::post('products/create', [AdminProductController::class, 'create'])->middleware('auth')->name('create_product');
    Route::post('products/delete', [AdminProductController::class, 'delete'])->middleware('auth')->name('delete_product');
    Route::get('orders', [AdminOrderController::class, 'show'])->middleware('auth')->name('admin_orders');
});

Route::get('/home', [ProductController::class, 'show'])->middleware('auth')->name('products');
Route::get('/product/{id}', [ProductController::class, 'view'])->middleware('auth')->name('single_product');
Route::post('/cart/add', [OrderController::class, 'add'])->middleware('auth')->name('add_order');

Route::get('/cart', [OrderController::class, 'show'])->middleware('auth')->name('cart');
Route::post('/cart/delete', [OrderController::class, 'delete'])->middleware('auth')->name('delete_order');
Route::get('/cart/buy', [AdminOrderController::class, 'buy'])->middleware('auth')->name('buy');


Route::get('/event', function (){
    event(new BuyEvent('You bought it'));
});
