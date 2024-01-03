<?php

use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ShopCategoryController;
use App\Http\Controllers\userController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('soqli/governorates', GovernorateController::class);
Route::apiResource('soqli/shop_category', ShopCategoryController::class);
Route::apiResource('soqli/product_category', ProductCategoryController::class);
Route::apiResource('soqli/users', userController::class);
Route::get('soqli/shop-owners', [UserController::class, 'getShopOwner']);
Route::post('login', [LoginController::class, 'login']);
