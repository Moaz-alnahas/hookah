<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Web\WebAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\OrderController;



Route::get('/', function () {
    return view('auth/login');
});
// الصفحات الخاصة بالمصادقة
Route::get('/login', [WebAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [WebAuthController::class, 'login']);

Route::get('/register', [WebAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [WebAuthController::class, 'register']);

Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout');

// حصر الداش بورد على المستخدمين المسجلين فقط
Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Products routes
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('dashboard.products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('dashboard.products.create');
        Route::post('/', [ProductController::class, 'store'])->name('dashboard.products.store');
    });
    
    Route::get('/stores', [StoreController::class, 'index'])->name('dashboard.stores.index');
    Route::get('/orders', [OrderController::class, 'index'])->name('dashboard.orders.index');
});
