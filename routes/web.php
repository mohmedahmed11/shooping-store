<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Properites\PropertiesController;
use App\Http\Controllers\Dashboard\CategoryController;

Route::get('/', function () {
    return view('layouts.master');
});
#################################product################################

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'show'])->name('products');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/save', [ProductController::class, 'save'])->name('product.save');
    Route::get('/delete/{id}', [ProductController::class, 'destroy']);
    Route::get('/update/{id}', [ProductController::class, 'update']);
    Route::get('/images/{id}', [ProductController::class, 'images'])->name('product.images');

    Route::put('/save_update/{id}', [ProductController::class, 'edit']);
    Route::get('/properites/{id}', [ProductController::class, 'properites'])->name('product.properites');
    Route::post('/carete_proparity', [ProductController::class, 'carete_proparity'])->name('product.carete_proparity');


    Route::post('/image/store/{id}', [ProductController::class, 'imagestore'])->name('products.image.store');
    Route::get('/image/delete/{id}', [ProductController::class, 'imagedelete'])->name('products.image.delete');
});
//
##################################################

Route::prefix('properties')->group(function () {
    Route::get('/rad/{id}', [PropertiesController::class, 'edit']);
    Route::put('/pro/{id}', [PropertiesController::class, 'update']);
    Route::get('/showProp', [PropertiesController::class, 'show'])->name('properties.showProp');
    Route::get('/create', [PropertiesController::class, 'create'])->name('properties.create');
    Route::post('/save', [PropertiesController::class, 'save'])->name('properties.save');
    Route::get('/delete/{id}', [PropertiesController::class, 'destroy']);
    Route::get('/images/{id}', [PropertiesController::class, 'images']);
});


//
#########################   category  #########################

Route::group(['prefix' => 'category'], function(){
    Route::get('/', [CategoryController::class , 'show'])->name('category');
    Route::get('create', [CategoryController::class , 'create'])->name('category.create');
    Route::post('store', [CategoryController::class , 'store'])->name('category.store');
    Route::get('edit/{id}', [CategoryController::class , 'edit'])->name('category.edit');
    Route::post('update/{id}', [CategoryController::class , 'update'])->name('category.update');
    Route::get('delete/{id}', [CategoryController::class , 'destroy'])->name('category.delete');
});
