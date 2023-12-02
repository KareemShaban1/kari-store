<?php

use  App\Http\Controllers\Backend\Vendor\{

          DashboardController as VendorDashboardController,
          ProductsController as VendorProductsController,
          ProductVariantsController as VendorProductVariantsController,
          AttributesController as VendorAttributesController,
          AttributeValuesController as VendorAttributeValuesController,
          NotificationsController as VendorNotificationsController ,
          OrderController as VendorOrderController,
          CouponController as VendorCouponController
          
          
      };
      
      use Illuminate\Support\Facades\Route;
      use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
      

      
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
        
              Route::get('/edit_products_price', [VendorProductsController::class,'edit_products_price'])->name('products.edit_products_price');
        
              Route::put('/update_products_price', [VendorProductsController::class,'updateProductsPrice'])->name('products.update_products_price');
        
              // Route::get('/add_variant/{product_id}', [VendorProductsController::class, 'add_variant'])->name('products.add_variant');
        
              // Route::resource('/product_variants', VendorProductVariantsController::class);
              
              Route::get('/product_variant', [VendorProductVariantsController::class, 'index'])->name('product_variants.index');
              Route::get('/create_product_variant/{product_id}', [VendorProductVariantsController::class, 'create'])->name('product_variants.create');
              Route::post('/store_product_variant', [VendorProductVariantsController::class, 'store'])->name('product_variants.store');
        
              Route::get('/edit_product_variant/{product_id}', [VendorProductVariantsController::class, 'edit'])->name('product_variants.edit');
              Route::put('/update_product_variant/{product_id}', [VendorProductVariantsController::class, 'update'])->name('product_variants.update');
        
              Route::get('/show_product_variant/{product_id}', [VendorProductVariantsController::class, 'show'])->name('product_variants.show');
        
              Route::get('/delete_product_variant/{product_id}', [VendorProductVariantsController::class, 'destroy'])->name('product_variants.destroy');
        
              // notes
              // Route::get('/create_product_variant/{product_id}', [VendorProductVariantsController::class, 'create'])->name('vendor.product_variants.create');
        
              Route::get('/get_attribute_value/{attribute_id}', [VendorProductVariantsController::class, 'get_attribute_value'])->name('get_attribute_value');
        
              Route::resource('/attributes', VendorAttributesController::class);
        
              Route::resource('/attribute_values', VendorAttributeValuesController::class);
        
              Route::resource('/coupons',VendorCouponController::class);
        
              Route::resource('/orders', VendorOrderController::class);
        
              Route::get('/notifications', [VendorNotificationsController::class, 'index'])->name('notifications.index');
        
          });
        