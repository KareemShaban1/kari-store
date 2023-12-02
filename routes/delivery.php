<?php

use  App\Http\Controllers\Backend\Delivery\{

          DashboardController as DeliveryDashboardController,
          OrdersController as DeliveryOrdersController,
      
      };
      
      use Illuminate\Support\Facades\Route;
      use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
      



// delivery dashboard
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
        
              Route::get('/changeStatus/{order_id}/{status}', [DeliveryOrdersController::class,'changeStatus'])->name('orders.changeStatus');
              Route::get('/changeOrdersStatus/{cart_id}/{status}', [DeliveryOrdersController::class,'changeOrdersStatus'])->name('orders.changeOrdersStatus');

              
              Route::get('/orders_report/{status?}', [DeliveryOrdersController::class,'orderReports'])->name('orders.reports');

              Route::get('/delivered_reports', [DeliveryOrdersController::class,'deliveredOrdersReport'])->name('deliveredOrders.reports');

          });