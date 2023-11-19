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
use App\Http\Controllers\Dashboard\LatestProductsController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Api\OrderApiesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\RevenuesController;
use App\Http\Controllers\Dashboard\ExpensesController;
use App\Http\Controllers\Dashboard\CapitalController;
use App\Http\Controllers\Dashboard\RetrieverController;
use App\Http\Controllers\Dashboard\SupplierController;
use App\Http\Controllers\Dashboard\TrademarkController;

// Clear application cache:
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});

//Clear route cache:
Route::get('/route-cache', function() {
	Artisan::call('route:cache');
    return 'Routes cache has been cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
 	Artisan::call('config:cache');
 	return 'Config cache has been cleared';
}); 

// Clear view cache:
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});

Route::get('/', function () {
    return view('/index');
});

Route::get('/pull', function () {
  shell_exec('git pull origin master');
    return view('/index');
});


Route::get('/privacy', function () {
  return view('/privacy');
});

Route::get('/dashboard', function () {

    if (Auth::check()) {
        return view('/dashboard');
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

    Route::get('/new', [ProductController::class, 'new'])->name('new');

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
    Route::get('create/{id}', [OrderController::class , 'create'])->name('order.create');
    Route::post('store/{id}', [OrderController::class , 'store'])->name('order.store');
    Route::get('status/{id}/{status}', [OrderController::class , 'status'])->name('order.status');
    Route::get('find_order/{id}', [OrderController::class , 'find_order'])->name('order.find_order');
    Route::get('add_item_to_session/{id}/{count}', [OrderController::class , 'setToSession'])->name('order.add_item_to_session');
    Route::get('delete_item_from_session/{index}', [OrderController::class , 'deleteItemFromSession'])->name('order.delete_item_from_session');
    Route::get('orders', [OrderController::class, 'getOrder']);

});

Auth::routes();

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/dashboard');
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


#########################   admins  #########################
Route::group(['prefix' => 'admins', 'namespace' => 'Backend', 'middleware' => 'auth' ], function(){
    Route::get('/', [AdminsController::class , 'show'])->name('admins');
    Route::get('/create', [AdminsController::class , 'create'])->name('admins.create');
    Route::post('store', [AdminsController::class , 'store'])->name('admins.store');
    Route::get('edit/{id}', [AdminsController::class , 'edit'])->name('admins.edit');
    Route::post('update/{id}', [AdminsController::class , 'update'])->name('admins.update');
    Route::get('delete/{id}', [AdminsController::class , 'destroy'])->name('admins.delete');
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



// Route::group(['prefix' => 'homeApp', 'namespace' => 'Backend', 'middleware' => 'auth' ], function()
// {
// Route::get('/', [OrderApiesController::class, 'show'])->name('homeApps');
// });


#########################   customers  #########################
Route::group(['prefix' => 'customers', 'middleware' => 'auth'], function(){
    Route::get('/', [CustomerController::class , 'show'])->name('customers');
    Route::get('/create', [CustomerController::class , 'create'])->name('customers.create');
    Route::post('store', [CustomerController::class , 'store'])->name('customers.store');
    Route::get('edit/{id}', [CustomerController::class , 'edit'])->name('customers.edit');
    Route::post('update/{id}', [CustomerController::class , 'update'])->name('customers.update');
    Route::get('delete/{id}', [CustomerController::class , 'destroy'])->name('customers.delete');
});

#########################   revenues  #########################
Route::group(['prefix' => 'revenues', 'middleware' => 'auth'], function(){
    Route::get('/', [RevenuesController::class , 'show'])->name('revenues');
    Route::get('/create', [RevenuesController::class , 'create'])->name('revenues.create');
    Route::post('store', [RevenuesController::class , 'store'])->name('revenues.store');
    Route::get('delete/{id}', [RevenuesController::class , 'destroy'])->name('revenues.delete');
});

#########################   expenses  #########################
Route::group(['prefix' => 'expenses', 'middleware' => 'auth'], function(){
    Route::get('/', [ExpensesController::class , 'show'])->name('expenses');
    Route::get('/create', [ExpensesController::class , 'create'])->name('expenses.create');
    Route::post('store', [ExpensesController::class , 'store'])->name('expenses.store');
    Route::get('delete/{id}', [ExpensesController::class , 'destroy'])->name('expenses.delete');
});

#########################   capital  #########################
Route::group(['prefix' => 'capital', 'middleware' => 'auth'], function(){
    Route::get('/', [CapitalController::class , 'show'])->name('capital');
    Route::get('/create', [CapitalController::class , 'create'])->name('capital.create');
    Route::post('store', [CapitalController::class , 'store'])->name('capital.store');
    Route::get('delete/{id}', [CapitalController::class , 'destroy'])->name('capital.delete');
});

#########################  retriever  #########################
Route::group(['prefix' => 'retriever', 'middleware' => 'auth'], function(){
    Route::get('/', [RetrieverController::class , 'show'])->name('retriever');
    Route::get('/create', [RetrieverController::class , 'create'])->name('retriever.create');
    Route::post('store', [RetrieverController::class , 'store'])->name('retriever.store');
    Route::get('delete/{id}', [RetrieverController::class , 'destroy'])->name('retriever.delete');
});





#########################   suppliers  #########################
Route::group(['prefix' => 'suppliers', 'middleware' => 'auth'], function(){
    Route::get('/', [SupplierController::class , 'show'])->name('suppliers');
    Route::get('/create', [SupplierController::class , 'create'])->name('suppliers.create');
    Route::post('store', [SupplierController::class , 'store'])->name('suppliers.store');
    Route::get('edit/{id}', [SupplierController::class , 'edit'])->name('suppliers.edit');
    Route::post('update/{id}', [SupplierController::class , 'update'])->name('suppliers.update');
    Route::get('delete/{id}', [SupplierController::class , 'destroy'])->name('suppliers.delete');
});

#########################   trademarks  #########################
Route::group(['prefix' => 'trademarks', 'middleware' => 'auth'], function(){
    Route::get('/', [TrademarkController::class , 'show'])->name('trademarks');
    Route::get('/create', [TrademarkController::class , 'create'])->name('trademarks.create');
    Route::post('store', [TrademarkController::class , 'store'])->name('trademarks.store');
    Route::get('edit/{id}', [TrademarkController::class , 'edit'])->name('trademarks.edit');
    Route::post('update/{id}', [TrademarkController::class , 'update'])->name('trademarks.update');
    Route::get('delete/{id}', [TrademarkController::class , 'destroy'])->name('trademarks.delete');
});

