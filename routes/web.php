<?php


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PageController;
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

    // Página de produto
    Route::get('produto/{slug}', [PageController::class, 'productPage']);


    // Páginas autenticadas

    // Vendedor
    Route::group(['middleware' => ['auth:seller']], function () {
        Route::get('/adicionar-produto', [PageController::class, 'addProduct']);
        Route::get('/meus-produtos', [PageController::class, 'getProducts']);
        Route::get('/minhas-vendas', [PageController::class, 'mySales']);
        Route::get('/editar-produto/{slug}', [PageController::class, 'updateProduct']);
        Route::get('/logoutSeller', [AuthenticatedSessionController::class, 'logoutSeller']);
    });

    //Cliente
    Route::group(['middleware' => ['auth:client']], function () {
        Route::get('/favoritos', [PageController::class, 'wishlist']);
        Route::get('/minha-conta', [PageController::class, 'myAccount']);
        Route::get('/minhas-compras', [PageController::class, 'myOrders']);
        Route::get('/logoutClient', [AuthenticatedSessionController::class, 'logoutClient'])->name('logout-client');
    });


    require __DIR__ . '/auth.php';
});
