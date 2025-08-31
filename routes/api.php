<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;



// ✨ غير محمي
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/register', [ApiAuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [ApiAuthController::class, 'user']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::post('/user/upload-image', [UserController::class, 'uploadImage']);
    Route::post('/user/update', [UserController::class, 'update']);
});

Route::prefix('orders')->group(function() {
    Route::get('/', [OrderController::class, 'index']); // عرض جميع الطلبات
    Route::post('/', [OrderController::class, 'store']); // إضافة طلب جديد
    Route::get('{id}', [OrderController::class, 'show']); // عرض طلب معين
    Route::put('{id}', [OrderController::class, 'update']); // تحديث الطلب
    Route::delete('{id}', [OrderController::class, 'destroy']); // حذف الطلب
});
