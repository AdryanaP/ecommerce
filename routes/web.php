<?php

use App\Http\Controllers\Actions\NewsletterController;
use App\Http\Controllers\Actions\SacController;
use App\Http\Controllers\Api\v1\WishlistController;
use App\Http\Controllers\Auth\RegisteredSellerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Checkout\DoPayController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\Pages\ViewProductPage;
use App\Http\Controllers\Pages\ViewProductsPage;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\Utils\CheckoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware('splade')->group(function () {
    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    // Página inicial
    Route::get('/', [PageController::class, 'welcome'])->name('welcome');

    // Cadastro Vendedor
    Route::get('/cadastro-vendedor', [RegisteredSellerController::class, 'create'])->name('register.seller');
    Route::post('/cadastro-vendedor', [RegisteredSellerController::class, 'store'])->name('register.seller.request');

    // Login Vendedor
    Route::get('login-vendedor', [AuthenticatedSessionController::class, 'pageSellerLogin']);
    Route::post('login-vendedor', [AuthenticatedSessionController::class, 'sellerLogin'])->name('login.seller');


    Route::get('login-tipo', [PageController::class, 'loginType']);
    Route::get('login', [AuthenticatedSessionController::class, 'pageClientLogin'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'clientLogin']);

    Route::get('confirmar-email/{id}', [PageController::class, 'confirmeEmail']);

    // Página de produto
    Route::get('produto/{slug}', [PageController::class, 'productPage']);


    // Páginas autenticadas

    // Vendedor
    Route::group(['middleware' => ['auth:seller']], function () {
        // Página de adição de produto
        Route::get('/adicionar-produto', [PageController::class, 'addProduct']);
        Route::get('/meus-produtos', [PageController::class, 'getProducts']);
        Route::get('/minhas-vendas', [PageController::class, 'mySales']);
        Route::get('/editar-produto/{slug}', [PageController::class, 'updateProduct']);
        Route::get('/logoutSeller', [AuthenticatedSessionController::class, 'logoutSeller']);
    });

    //Cliente
    Route::group(['middleware' => ['auth:client']], function () {
        // Página de favoritos
        Route::get('/favoritos', [PageController::class, 'wishlist']);
        Route::get('/minha-conta', [PageController::class, 'myAccount']);
        Route::get('/minhas-compras', [PageController::class, 'myOrders']);
        Route::get('/logoutClient', [AuthenticatedSessionController::class, 'logoutClient'])->name('logout-client');
    });


    require __DIR__ . '/auth.php';
});
