<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Properites\PropertiesController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Settings\RegonsController;
use App\Http\Controllers\Settings\SettingsController;
use App\Http\Controllers\Settings\BannerController;

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

//
#########################   category  #########################

Route::group(['prefix' => 'category'], function(){
    Route::get('/', [CategoryController::class , 'show'])->name('category');
    Route::post('store', [CategoryController::class , 'store'])->name('category.store');
    Route::get('edit/{id}', [CategoryController::class , 'edit'])->name('category.edit');
    Route::post('update/{id}', [CategoryController::class , 'update'])->name('category.update');
    Route::get('delete/{id}', [CategoryController::class , 'destroy'])->name('category.delete');
});


#########################   regons  #########################

Route::group(['prefix' => 'regon'], function(){
    Route::get('/', [RegonsController::class , 'show'])->name('regon');
    Route::post('store', [RegonsController::class , 'store'])->name('regon.store');
    Route::get('edit/{id}', [RegonsController::class , 'edit'])->name('regon.edit');
    Route::post('update/{id}', [RegonsController::class , 'update'])->name('regon.update');
    Route::get('delete/{id}', [RegonsController::class , 'destroy'])->name('regon.delete');
    Route::get('status/{id}', [RegonsController::class , 'status'])->name('regon.status');
});

#########################   regons  #########################

Route::group(['prefix' => 'settings'], function(){
    Route::get('/', [SettingsController::class , 'show'])->name('settings');
    Route::post('update', [SettingsController::class , 'update'])->name('settings.update');
});

#########################   banner  #########################

Route::group(['prefix' => 'banner'], function(){
    Route::get('/', [BannerController::class , 'show'])->name('banner');
    Route::get('/create', [BannerController::class , 'create'])->name('banner.create');
    Route::post('store', [BannerController::class , 'store'])->name('banner.store');
    Route::get('edit/{id}', [BannerController::class , 'edit'])->name('banner.edit');
    Route::post('update/{id}', [BannerController::class , 'update'])->name('banner.update');
    Route::get('delete/{id}', [BannerController::class , 'destroy'])->name('banner.delete');
    Route::get('status/{id}', [BannerController::class , 'status'])->name('banner.status');
    Route::get('find_product/{id}', [BannerController::class , 'find_product'])->name('banner.find_product');

});
