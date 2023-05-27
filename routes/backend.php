<?php
// admin controllers
use  App\Http\Controllers\Backend\Admin\ {
  AdminController,
  AttributesController,
  AttributeValuesController,
  BannerController,
  BrandsController,
  CategoriesController,
  CouponController,
  DashboardController,
  OrderController,
  ProductsController,
    ProductVariantsController,
    ProfileController,
  RoleController,
  StoresController,
  VendorController,
  WebsitePartsController,
};

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


//// admin routes
Route::group([
      //// url prefix => ar/admin/
      'prefix' => LaravelLocalization::setLocale() . '/admin',
      'as' => 'admin.',
      'middleware' => [
        'auth:admin',
        'verified',
        'localeCookieRedirect', 'localizationRedirect', 'localeViewPath'],
      ], 
      function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

   
        Route::resource('/categories', CategoriesController::class);
        Route::get('/trash', [CategoriesController::class, 'trash'])->name('categories.trash');
        Route::put('/restore/{category_id}', [CategoriesController::class, 'restore'])->name('categories.restore');
        Route::delete('/force_delete/{category_id}', [CategoriesController::class, 'forceDelete'])->name('categories.forceDelete');

        Route::resource('/banners', BannerController::class);

        Route::resource('/stores', StoresController::class);

        Route::resource('/vendors', VendorController::class);

        Route::resource('/products', ProductsController::class);
        Route::get('/add_variant/{product_id}', [ProductsController::class, 'add_variant'])->name('products.add_variant');

        Route::resource('/product_variants', ProductVariantsController::class);
        Route::get('/create/{product_id}', [ProductVariantsController::class, 'create'])->name('product_variants.create');

        Route::get('/get_attribute_value/{attribute_id}', [ProductVariantsController::class, 'get_attribute_value'])->name('get_attribute_value');

        Route::resource('/attributes', AttributesController::class);

        Route::resource('/attribute_values', AttributeValuesController::class);

        Route::resource('/coupons', CouponController::class);

        Route::resource('/orders', OrderController::class);

        Route::resource('/websiteParts', WebsitePartsController::class);

        Route::resource('/brands', BrandsController::class);

        // Route::group([
        //   'prefix' => 'brands',
        //   'as' => 'brands.'
        // ], function () {
        //   Route::get('/', [BrandsController::class, 'index'])->name('index');
        //   Route::get('/add_brand', [BrandsController::class, 'create'])->name('create');
        //   Route::post('/store_brand', [BrandsController::class, 'store'])->name('store');
        //   Route::get('/edit_brand', [BrandsController::class, 'edit'])->name('edit');
        //   Route::put('/update_brand/{brand_id}', [BrandsController::class, 'update'])->name('update');
        //   Route::delete('/delete_brand/{brand_id}', [BrandsController::class, 'destroy'])->name('destroy');
        // });

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



Route::group([
  // url prefix
  'prefix' => LaravelLocalization::setLocale() . '/vendor',
  'as' => 'vendor.',
  'middleware' => [
    'auth:vendor',
    'verified',
    'localeCookieRedirect', 'localizationRedirect', 'localeViewPath'
  ],



], function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::resource('/products', ProductsController::class);

  Route::resource('/coupons', CouponController::class);

  Route::resource('/orders', OrderController::class);





});
