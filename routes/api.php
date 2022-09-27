<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\RegonController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Api\OrderApisController;


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
Route::get('user/{id}', [CustomerController::class, 'index']);
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
Route::post('login', [CustomerController::class, 'login']);
Route::post('update_user', [CustomerController::class, 'update']);

Route::post('cancel_order', [OrderController::class, 'cancel_order']);

Route::get('delete_user/{id}', [CustomerController::class, 'delete_account']);

Route::group(['prefix' => 'config' ], function()
{
    Route::get('order/{id}', [OrderApisController::class, 'getOrder']);
    Route::get('orders', [OrderApisController::class, 'getOrders']);
    Route::post('order/add', [OrderApisController::class, 'createOrder']);
    Route::put('order/update/{id}', [OrderApisController::class, 'updateOrder']);
    Route::put('order/status/{id}/{status}', [OrderApisController::class, 'updateStatus']);
    Route::delete('order/delete/{id}', [OrderApisController::class, 'destroy']);
});

Route::post('token', [SettingController::class, 'token']);
