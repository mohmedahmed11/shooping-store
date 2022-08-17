<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\RegonController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\COntrollers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('setting', [SettingController::class, 'index']);
Route::get('user/{id}', [UserController::class, 'index']);
Route::get('regons', [RegonController::class, 'index']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('banners', [BannerController::class, 'index']);
Route::get('products_list/{id}', [ProductController::class, 'productsList']);
Route::get('best_seller', [ProductController::class, 'bestSeller']);
Route::get('latest', [ProductController::class, 'latest']);
Route::get('similar_products/{id}', [ProductController::class, 'similarProducts']);
Route::get('orders/{user_id}', [OrderController::class, 'history']);
Route::get('order/{order_id}', [OrderController::class, 'order_info']);

Route::post('order', [OrderController::class, 'add']);
Route::post('login', [UserController::class, 'login']);
Route::post('update_user', [UserController::class, 'update']);
