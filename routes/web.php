<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Properites\PropertiesController;

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
    Route::get('/images/{id}', [ProductController::class, 'images']);

    Route::put('/save_update/{id}', [ProductController::class, 'edit']);
    Route::get('/properites/{id}', [ProductController::class, 'properites'])->name('product.properites');
    Route::post('/carete_proparity', [ProductController::class, 'carete_proparity'])->name('product.carete_proparity');
    
    Route::get('/details/{id}', [ProductController::class, 'details'])->name('product.details');
 
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