<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\RegisteredSellerController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('cadastro', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('cadastro', [RegisteredUserController::class, 'store'])->name('register.request');

    Route::get('recuperar-senha', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('recuperar-senha', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('resetar-senha/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('resetar-senha', [NewPasswordController::class, 'store'])->name('password.store');

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
});


Route::middleware('auth')->group(function () {
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
});
