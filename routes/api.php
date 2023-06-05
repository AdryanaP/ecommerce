<?php

use App\Http\Controllers\Actions\SearchController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FreteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController ;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - v1
|--------------------------------------------------------------------------
*/


// Wishlist
Route::post('/wishlist/delete', [PageController::class, "mywishlistRemove"]);

// Lista de desejos
Route::post('/wishlist/check', [WishlistController::class, 'check']);
Route::post('/wishlist/toggle', [WishlistController::class, 'toggle']);

// Produtos
Route::get('/products/{orderBy}', [ProductController::class, 'index']);
Route::get('/my-products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);

Route::get('/categories', [ProductController::class, 'category']);

// Cliente
Route::put('/client/{id}', [ClientController::class, 'update']);
Route::put('/client-credits/{id}', [ClientController::class, 'edit']);

// Vendedor 
Route::put('/seller-credits/{id}', [SellerController::class, 'edit']);

// Pedido
Route::post('/order', [OrderController::class, 'store']);
Route::get('/client-orders/{id}', [OrderController::class, 'show']);
Route::get('/seller-orders/{id}', [OrderController::class, 'showSeller']);
