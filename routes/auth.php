<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\RegisteredSellerController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('cadastro', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('cadastro', [RegisteredUserController::class, 'store'])->name('register.request');
    
    // Route::get('cadastro-vendedor', [RegisteredSellerController::class, 'create'])->name('register.seller');
    // Route::post('cadastro-vendedor', [RegisteredSellerController::class, 'store'])->name('register.seller.request');


    Route::get('recuperar-senha', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('recuperar-senha', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('resetar-senha/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('resetar-senha', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
//    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
