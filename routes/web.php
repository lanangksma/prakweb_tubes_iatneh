<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [ProductController::class, 'index'])->name('product.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('dashboard/products', [DashboardProductController::class, 'index'])->name('dashboardProducts');
    Route::get('/products/create', [DashboardProductController::class, 'create'])->name('dashboardProducts.create');
    Route::post('/products', [DashboardProductController::class, 'store'])->name('dashboardProducts.store');
    Route::get('/products', [DashboardProductController::class, 'index'])->name('dashboardProducts.index');
});

require __DIR__.'/auth.php';
