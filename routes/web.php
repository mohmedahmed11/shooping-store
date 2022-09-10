<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Properites\PropertiesController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Settings\RegonsController;
use App\Http\Controllers\Settings\SettingsController;
use App\Http\Controllers\Settings\BannerController;
use App\Http\Controllers\Dashboard\BestSellerController;
use App\Http\Controllers\Dashboard\NewProductController;
use App\Http\Controllers\Dashboard\LatestProductsController;
use App\Http\Controllers\Dashboard\NotificationController;

Route::get('/', function () {

    if (Auth::check()) {
        return redirect('/home');

    } else {
        return view('/auth.login');
    }
});

#################################product################################

    Route::group(['prefix' => 'product', 'namespace' => 'Backend', 'middleware' => 'auth' ], function()
    {
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

    Route::get('/similer/delete/{id}', [ProductController::class, 'deleteSimilerProduct']);
    Route::post('/crate_silmiler', [ProductController::class, 'crate_silmiler'])->name('products.crate_silmiler');

    Route::post('/productoption', [ProductController::class, 'productoption'])->name('product.productoption');
    Route::get('/option/delete/{id}', [ProductController::class, 'deleteOptionProduct']);


    //

});
//
##################################################

Route::group(['prefix' => 'properties', 'namespace' => 'Backend', 'middleware' => 'auth' ], function(){
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

Route::group(['prefix' => 'category', 'namespace' => 'Backend', 'middleware' => 'auth' ], function(){
    Route::get('/', [CategoryController::class , 'show'])->name('category');
    Route::post('store', [CategoryController::class , 'store'])->name('category.store');
    Route::get('edit/{id}', [CategoryController::class , 'edit'])->name('category.edit');
    Route::post('update/{id}', [CategoryController::class , 'update'])->name('category.update');
    Route::get('delete/{id}', [CategoryController::class , 'destroy'])->name('category.delete');
});


#########################   regons  #########################

Route::group(['prefix' => 'regon', 'namespace' => 'Backend', 'middleware' => 'auth' ], function(){
    Route::get('/', [RegonsController::class , 'show'])->name('regon');
    Route::post('store', [RegonsController::class , 'store'])->name('regon.store');
    Route::get('edit/{id}', [RegonsController::class , 'edit'])->name('regon.edit');
    Route::post('update/{id}', [RegonsController::class , 'update'])->name('regon.update');
    Route::get('delete/{id}', [RegonsController::class , 'destroy'])->name('regon.delete');
    Route::get('status/{id}', [RegonsController::class , 'status'])->name('regon.status');
});

#########################   regons  #########################

Route::group(['prefix' => 'settings', 'namespace' => 'Backend', 'middleware' => 'auth' ], function(){
    Route::get('/', [SettingsController::class , 'show'])->name('settings');
    Route::post('update', [SettingsController::class , 'update'])->name('settings.update');
});

#########################   banner  #########################

Route::group(['prefix' => 'banner', 'namespace' => 'Backend', 'middleware' => 'auth' ], function(){
    Route::get('/', [BannerController::class , 'show'])->name('banner');
    Route::get('/create', [BannerController::class , 'create'])->name('banner.create');
    Route::post('store', [BannerController::class , 'store'])->name('banner.store');
    Route::get('edit/{id}', [BannerController::class , 'edit'])->name('banner.edit');
    Route::post('update/{id}', [BannerController::class , 'update'])->name('banner.update');
    Route::get('delete/{id}', [BannerController::class , 'destroy'])->name('banner.delete');
    Route::get('status/{id}', [BannerController::class , 'status'])->name('banner.status');
    Route::get('find_product/{id}', [BannerController::class , 'find_product'])->name('banner.find_product');

});

#########################   order  #########################

Route::group(['prefix' => 'order', 'namespace' => 'Backend', 'middleware' => 'auth' ], function(){
    Route::get('/', [OrderController::class , 'show'])->name('order');
    Route::get('/create', [OrderController::class , 'create'])->name('order.create');
    Route::post('store', [OrderController::class , 'store'])->name('order.store');
    Route::post('status', [OrderController::class , 'status'])->name('order.status');
    Route::get('find_order/{id}', [OrderController::class , 'find_order'])->name('order.find_order');



});
Auth::routes();

Auth::routes();

Route::get('/home', [ProductController::class, 'show'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});
#################### Start Best Seller Products ######################
Route::group(['prefix' => 'homeApp', 'namespace' => 'Backend', 'middleware' => 'auth' ], function()
{
Route::get('/', [BestSellerController::class, 'show'])->name('homeApps');
Route::post('/create', [BestSellerController::class, 'create'])->name('create');
Route::get('delete/{id}', [BestSellerController::class , 'destroy'])->name('homeApp.delete');
});
#################### End Best Seller Products ######################


#################### Start Last_Products ####################

Route::group(['prefix' => 'latestproducts', 'namespace' => 'Backend', 'middleware' => 'auth' ], function()
{
Route::get('/', [LatestProductsController::class, 'show'])->name('latestproducts');
Route::post('/create', [LatestProductsController::class, 'createlatest'])->name('createlatest');
Route::get('delete/{id}', [LatestProductsController::class , 'destroy'])->name('latestproducts.delete');
});


#################### End New_Products_on_Application ######################

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});


Route::group(['prefix' => 'homeApp', 'namespace' => 'Backend', 'middleware' => 'auth' ], function()
{
Route::get('/', [BestSellerController::class, 'show'])->name('homeApps');
Route::post('/create', [BestSellerController::class, 'create'])->name('create');
Route::get('delete/{id}', [BestSellerController::class , 'destroy'])->name('homeApp.delete');
});

// Route::get('/notification', [ProductController::class, 'notification'])->name('product.notification');
// Notification
Route::group(['prefix' => 'notification', 'namespace' => 'Backend', 'middleware' => 'auth' ], function()
{
Route::get('/', [NotificationController::class, 'show'])->name('notification');
Route::post('/create', [NotificationController::class, 'create'])->name('notification.create');
Route::get('delete/{id}', [NotificationController::class , 'destroy'])->name('notification.delete');
Route::get('/send/{id}', [NotificationController::class, 'sendNotificationby'])->name('notification.send');
Route::post('/save-token', [HomeController::class, 'saveToken'])->name('save-token');
});
