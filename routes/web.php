<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Properites\PropertiesController;

Route::get('/', function () {
    return view('layouts.master');
});
#################################product################################

Route::prefix('product')->group(function () {
    Route::get('/rad/{id}', [ProductController::class, 'edit']);
    Route::put('/pro/{id}', [ProductController::class, 'update']);
    Route::get('/', [ProductController::class, 'show'])->name('products');
    
    Route::get('/create', [ProductController::class, 'create'])->name('product.properites');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/save', [ProductController::class, 'save'])->name('product.save');
    Route::get('/delete/{id}', [ProductController::class, 'destroy']);
    Route::get('/images/{id}', [ProductController::class, 'images']);
    // update-product/
    
});
// 
##################################################

Route::prefix('properties')->group(function () {
    // properties/rad/
    Route::get('/rad/{id}', [PropertiesController::class, 'edit']);
    Route::put('/pro/{id}', [PropertiesController::class, 'update']);
    Route::get('/showProp', [PropertiesController::class, 'show'])->name('properties.showProp');
    Route::get('/create', [PropertiesController::class, 'create'])->name('properties.create');
    Route::post('/save', [PropertiesController::class, 'save'])->name('properties.save');
    Route::get('/delete/{id}', [PropertiesController::class, 'destroy']);
    Route::get('/images/{id}', [PropertiesController::class, 'images']);
});