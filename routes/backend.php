<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AttributesController;
use App\Http\Controllers\Backend\AttributeValuesController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\StoresController;
use App\Http\Controllers\Backend\WebsitePartsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
  // url prefix
  'prefix' => LaravelLocalization::setLocale() . '/backend',
  'as' => 'backend.',
  'middleware' => [
    'auth:admin',
    'verified',
    'localeCookieRedirect', 'localizationRedirect', 'localeViewPath'
  ],



], function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('/profile_edit', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile_update', [ProfileController::class, 'update'])->name('profile.update');


  Route::resource('/categories', CategoriesController::class);
  Route::get('/trash', [CategoriesController::class, 'trash'])->name('categories.trash');
  Route::put('/restore/{category_id}', [CategoriesController::class, 'restore'])->name('categories.restore');
  Route::delete('/force_delete/{category_id}', [CategoriesController::class, 'forceDelete'])->name('categories.forceDelete');

  Route::resource('/banners', BannerController::class);

  Route::resource('/stores', StoresController::class);

  Route::resource('/products', ProductsController::class);

  Route::resource('/attributes', AttributesController::class);

  Route::resource('/attribute_values', AttributeValuesController::class);

  Route::resource('/coupons', CouponController::class);

  Route::resource('/orders', OrderController::class);

  Route::resource('/websiteParts', WebsitePartsController::class);

  Route::group([
    'prefix'=>'brands',
    'as'=>'brands.'
  ],function(){
    Route::get('/',[BrandsController::class,'index'])->name('index');
    Route::get('/add_brand',[BrandsController::class,'create'])->name('create');
    Route::post('/store_brand',[BrandsController::class,'store'])->name('store');
    Route::get('/edit_brand',[BrandsController::class,'edit'])->name('edit');
    Route::put('/update_brand/{brand_id}',[BrandsController::class,'update'])->name('update');
    Route::delete('/delete_brand/{brand_id}', [BrandsController::class, 'destroy'])->name('destroy');

    
  });

  Route::resource('/roles', RoleController::class);
  Route::resource('/admins', AdminController::class);


  // Route::group([
  //   'prefix'=>'roles',
  //   'as'=>'roles.'
  // ],function(){
  //   Route::get('/roles',[RoleController::class,'index'])->name('index');
  //   Route::get('/add_role',[RoleController::class,'create'])->name('create');
  //   Route::post('/store_role',[RoleController::class,'store'])->name('store');
  //   Route::get('/edit_role/{role_id}',[RoleController::class,'edit'])->name('edit');
  //   Route::put('/update_role/{role_id}',[RoleController::class,'update'])->name('update');
  //   Route::delete('/delete_role/{role_id}', [RoleController::class, 'destroy'])->name('destroy');

    
  // });

});
