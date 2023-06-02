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

    // // Página do produto
    // Route::get('/produto/{product}', ViewProductPage::class)->name('pages.product');

    // // Página de carrinho
    // Route::get('sacola', [CartController::class, 'cartList'])->name('cart.list');
    // Route::post('sacola', [CartController::class, 'addToCart'])->name('cart.store');
    // Route::put('sacola/{item}', [CartController::class, 'updateCart'])->name('cart.update');
    // Route::delete('sacola/{item}', [CartController::class, 'removeCart'])->name('cart.remove');
    // Route::post('sacola/limpar', [CartController::class, 'clearAllCart'])->name('cart.clear');

    // Cadastro Vendedor
    Route::get('/cadastro-vendedor', [RegisteredSellerController::class, 'create'])->name('register.seller');
    Route::post('/cadastro-vendedor', [RegisteredSellerController::class, 'store'])->name('register.seller.request');

    // Login Vendedor
    Route::get('login-vendedor', [AuthenticatedSessionController::class, 'pageLogin']);
    Route::post('login-vendedor', [AuthenticatedSessionController::class, 'sellerLogin'])->name('login.seller');


    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'clientLogin']);

    // Página de produto
    Route::get('produto/{slug}', [PageController::class, 'productPage']);

    Route::get('login-tipo', [PageController::class, 'loginType']);

    // Páginas autenticado

    // Vendedor
    Route::group(['middleware' => ['auth:seller']], function () {
        // Página de adição de produto
        Route::get('/adicionar-produto', [PageController::class, 'addProduct']);
        Route::get('/meus-produtos', [PageController::class, 'getProducts']);
    });

    //Cliente
    Route::group(['middleware' => ['auth:client']], function () {
        // Página de favoritos
        Route::get('/favoritos', [PageController::class, 'wishlist']);
    });
    Route::middleware('auth')->group(function () {

        // // Página de minha conta
        // Route::get('/minha-conta', [PageController::class, 'myaccount'])->name('pages.myaccount');

        // // Página de editar meus dados
        // Route::get('/meus-dados', [PageController::class, 'mypersonaldata'])->name('pages.mypersonaldata');
        // Route::post('/meus-dados', [PageController::class, 'mypersonaldataUpdate'])->name('pages.mypersonaldata.update');

        // // Página de meus pedidos
        // Route::get('/meus-pedidos', [PageController::class, 'myorders'])->name('pages.myorders');
        // Route::get('/pedido/{order}', OrderController::class)->name('pages.myorder');

        // // Página de lista de desejos
        // Route::get('/meus-favoritos', [PageController::class, 'mywishlist'])->name('pages.mywishlist');
        // Route::post('/meus-favoritos/remover', [PageController::class, 'mywishlistRemove'])->name('pages.mywishlist.remove');

        // // Página de checkout
        // Route::get('/pagamento', [CheckoutController::class, 'index'])->name('pages.checkout.index');
        // Route::post('/pagamento', DoPayController::class)->name('checkout.pay');
        // Route::get('/pagamento/{orderId}', [PageController::class, 'thankyou'])->name('pages.checkout.success');
        // Route::get('/sucesso/{orderId}', [PageController::class, 'success'])->name('pages.success');
    });

    require __DIR__ . '/auth.php';
});
