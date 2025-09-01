<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/items/{service:slug}', [MainController::class, 'show'])->name('main.show');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



    Route::get('/merchants/{merchant:slug}/edit', [MerchantController::class, 'edit'])->name('merchant.edit');
    Route::patch('/merchants/{merchant:slug}', [MerchantController::class, 'update'])->name('merchant.update');
    Route::get('/merchants/{merchant:slug}', [MerchantController::class, 'show'])->name('merchant.show');
    Route::delete('/merchants/{merchant:slug}', [MerchantController::class, 'destroy'])->name('merchant.destroy');



    Route::get('/services/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/services/{service:slug}', [ServiceController::class, 'show'])->name('service.show');
    Route::get('/services/{service:slug}/edit', [ServiceController::class, 'edit'])->name('service.edit');

    Route::patch('/services/{service:slug}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/services/{service:slug}', [ServiceController::class, 'destroy'])->name('service.destroy');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/biography', [ProfileController::class, 'updateBiography'])->name('profile.biography.update');
    Route::patch('/profile/phone', [ProfileController::class, 'updatePhone'])->name('profile.phone.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
