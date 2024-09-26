<?php

// admin controllers
use  App\Http\Controllers\Backend\Admin\{
    AdminController,
    AttributesController,
    AttributeValuesController,
    BannerController,
    BrandsController,
    CategoriesController,
    ConfigNotificationsController,
    ConfigPaymentsController,
    ConfigSettingsController,
    ConfigSMSController,
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
    PaymentGatewayController,
    ProductPropertiesController,
    ReportsController
};
use App\Http\Controllers\Backend\Admin\Payment\PaymobController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::post('payment/paymob', [PaymobController::class,'pay'])->name('paymob');

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


        Route::get('payment/paymob', [PaymobController::class,'pay'])->name('paymobTest');


        Route::get('/notifications_config', [ConfigNotificationsController::class, 'index'])->name('config.notifications');
        Route::post('/updatePusherSettings', [ConfigNotificationsController::class, 'updatePusherSettings'])
        ->name('config.updatePusherSettings');

        Route::get('/sms_config', [ConfigSMSController::class, 'index'])->name('config.sms');
        Route::post('/updateUltraMessageSettings', [ConfigSMSController::class, 'updateUltraMessageSettings'])
        ->name('config.updateUltraMessageSettings');



        Route::get('/payment_config', [ConfigPaymentsController::class, 'paymentConfig'])->name('config.payment');
        Route::post('/updatePaymobSettings', [ConfigPaymentsController::class, 'updatePaymobSettings'])
        ->name('config.updatePaymobSettings');


        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/charts', function () {
            return view('backend.Admin_Dashboard.dashboard.charts');
        });

        Route::resource('/categories', CategoriesController::class);
        Route::get('/trash', [CategoriesController::class, 'trash'])->name('categories.trash');
        Route::put('/restore/{category_id}', [CategoriesController::class, 'restore'])->name('categories.restore');
        Route::delete('/force_delete/{category_id}', [CategoriesController::class, 'forceDelete'])->name('categories.forceDelete');

        Route::resource('/banners', BannerController::class);

        Route::resource('/stores', StoresController::class);
        Route::get('/get-cities', [StoresController::class, 'getCities']);
        Route::get('/get-neighborhoods', [StoresController::class, 'getNeighborhoods']);
        Route::post('/updateStoreFeatured/{store_id}', [StoresController::class, 'updateStoreFeatured'])->name('stores.updateStoreFeatured');
        Route::post('/updateStoreStatus/{store_id}', [StoresController::class, 'updateStoreStatus'])->name('stores.updateStoreStatus');



        Route::resource('/destinations', DestinationController::class);

        Route::resource('/vendors', VendorController::class);
        Route::put('/updateVendorStatus/{vendor_id}', [VendorController::class, 'updateVendorStatus'])->name('vendors.updateVendorStatus');


        Route::resource('/products', ProductsController::class);
        Route::get('/add_variant/{product_id}', [ProductsController::class, 'add_variant'])->name('products.add_variant');

        Route::resource('/product_variants', ProductVariantsController::class);
        Route::get('/create_variant/{product_id}', [ProductVariantsController::class, 'create'])->name('product_variants.create');
        Route::get('/get_attribute_value/{attribute_id}', [ProductVariantsController::class, 'get_attribute_value'])->name('get_attribute_value');

        Route::resource('/attributes', AttributesController::class);

        Route::resource('/attribute_values', AttributeValuesController::class);

        Route::resource('/product_properties', ProductPropertiesController::class);

        Route::resource('/coupons', CouponController::class);

        Route::resource('/orders', OrderController::class);

        Route::get('/changeStatus/{order}/{status}', [OrderController::class,'changeStatus'])->name('orders.changeStatus');

        Route::post('/order/assign_delivery', [OrderController::class,'assignDelivery'])->name('orders.assignDelivery');

        Route::resource('/websiteParts', WebsitePartsController::class);

        Route::resource('/brands', BrandsController::class);

        Route::resource('/deliveries', DeliveryController::class);

        Route::resource('/roles', RoleController::class);

        Route::resource('/admins', AdminController::class);

        Route::get('/orders_report/{status?}', [ReportsController::class,'index'])->name('reports.orders');

        Route::get('paymentGateways', [PaymentGatewayController::class,'index'])->name('paymentGateways.index');
        Route::get('paymentGateways/create', [PaymentGatewayController::class,'create'])->name('paymentGateways.create');
        Route::post('paymentGateways/store', [PaymentGatewayController::class,'store'])->name('paymentGateways.store');

        Route::get('paymentGateways/edit/{id}', [PaymentGatewayController::class,'edit'])->name('paymentGateways.edit');
        Route::put('paymentGateways/update/{id}', [PaymentGatewayController::class,'update'])->name('paymentGateways.update');
        Route::delete('paymentGateways/delete/{id}', [PaymentGatewayController::class,'delete'])->name('paymentGateways.destroy');

    }
);
