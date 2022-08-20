<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.master');
});
#################################product################################
Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'show'])->name('products');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/save', [ProductController::class, 'save'])->name('product.save');
    Route::get('/update/{id}', [ProductController::class, 'update']);
    Route::get('/delete/{id}', [ProductController::class, 'destroy']);

    Route::get('/images/{id}', [ProductController::class, 'images']);
   
});
###########################################################