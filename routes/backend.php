<?php

// admin controllers
use  App\Http\Controllers\Backend\Admin\{
    AdminController,
    AttributesController,
    AttributeValuesController,
    BannerController,
    BrandsController,
    CategoriesController,
    CouponController,
    DashboardController,
    DestinationController,
    OrderController,
    ProductsController,
    ProductVariantsController,
    RoleController,
    StoresController,
    VendorController,
    WebsitePartsController,
    DeliveryController,
    ProductPropertiesController,
    ReportsController
};

use  App\Http\Controllers\Backend\Vendor\{

    DashboardController as VendorDashboardController,
    ProductsController as VendorProductsController,
    ProductVariantsController as VendorProductVariantsController,
    AttributesController as VendorAttributesController,
    AttributeValuesController as VendorAttributeValuesController,
    NotificationsController as VendorNotificationsController
};

use  App\Http\Controllers\Backend\Delivery\{

    DashboardController as DeliveryDashboardController,
    OrdersController as DeliveryOrdersController,

};

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

//// admin routes
Route::group(
    [
    //// url prefix => ar/admin/
    'prefix' => LaravelLocalization::setLocale() . '/admin',
    'as' => 'admin.',
    'middleware' => [
      'auth:admin',
      'verified',
      'localeCookieRedirect', 'localizationRedirect', 'localeViewPath'
    ],
  ],
    function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


        Route::resource('/categories', CategoriesController::class);
        Route::get('/trash', [CategoriesController::class, 'trash'])->name('categories.trash');
        Route::put('/restore/{category_id}', [CategoriesController::class, 'restore'])->name('categories.restore');
        Route::delete('/force_delete/{category_id}', [CategoriesController::class, 'forceDelete'])->name('categories.forceDelete');

        Route::resource('/banners', BannerController::class);

        Route::resource('/stores', StoresController::class);

        Route::get('/get-cities', [StoresController::class, 'getCities']);

        Route::get('/get-neighborhoods', [StoresController::class, 'getNeighborhoods']);

        Route::resource('/destinations', DestinationController::class);

        Route::resource('/vendors', VendorController::class);

        Route::resource('/products', ProductsController::class);
        Route::get('/add_variant/{product_id}', [ProductsController::class, 'add_variant'])->name('products.add_variant');

        Route::resource('/product_variants', ProductVariantsController::class);
        Route::get('/create/{product_id}', [ProductVariantsController::class, 'create'])->name('product_variants.create');

        Route::get('/get_attribute_value/{attribute_id}', [ProductVariantsController::class, 'get_attribute_value'])->name('get_attribute_value');

        Route::resource('/attributes', AttributesController::class);

        Route::resource('/attribute_values', AttributeValuesController::class);

        Route::resource('/product_properties', ProductPropertiesController::class);


        Route::resource('/coupons', CouponController::class);

        Route::resource('/orders', OrderController::class);

        Route::post('/order/assign_delivery', [OrderController::class,'assignDelivery'])->name('orders.assignDelivery');

        Route::resource('/websiteParts', WebsitePartsController::class);

        Route::resource('/brands', BrandsController::class);

        Route::resource('/deliveries', DeliveryController::class);

        Route::resource('/roles', RoleController::class);

        Route::resource('/admins', AdminController::class);


        Route::get('/orders_report/{status?}', [ReportsController::class,'index'])->name('reports.orders');

    }
);








// vendor dashboard
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
      Route::get('/dashboard', [VendorDashboardController::class, 'index'])->name('dashboard');

      Route::resource('/products', VendorProductsController::class);

      Route::get('/add_variant/{product_id}', [VendorProductsController::class, 'add_variant'])->name('products.add_variant');

      Route::resource('/product_variants', VendorProductVariantsController::class);
      Route::get('/create/{product_id}', [VendorProductVariantsController::class, 'create'])->name('product_variants.create');

      Route::get('/get_attribute_value/{attribute_id}', [VendorProductVariantsController::class, 'get_attribute_value'])->name('get_attribute_value');

      Route::resource('/attributes', VendorAttributesController::class);

      Route::resource('/attribute_values', VendorAttributeValuesController::class);


      Route::resource('/coupons', CouponController::class);

      Route::resource('/orders', OrderController::class);

      Route::get('/notifications', [VendorNotificationsController::class, 'index'])->name('notifications.index');

  });





// vendor dashboard
Route::group([
  // url prefix
  'prefix' => LaravelLocalization::setLocale() . '/delivery',
  'as' => 'delivery.',
  'middleware' => [
    'auth:delivery',
    'verified',
    'localeCookieRedirect', 'localizationRedirect', 'localeViewPath'
  ],

  ], function () {

      Route::get('/dashboard', [DeliveryDashboardController::class, 'index'])->name('dashboard');

      Route::resource('/orders', DeliveryOrdersController::class);

  });