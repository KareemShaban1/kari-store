<?php

use App\Http\Controllers\Frontend\Auth\TwoFactorAuthenticationController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductsController;
use App\Http\Controllers\Frontend\ShopGridController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

 
Route::group([
          // url prefix
          'prefix' => LaravelLocalization::setLocale(),
          'middleware' => [
                    'localeCookieRedirect', 'localizationRedirect', 'localeViewPath'
          ],

], function () {

          Route::get('/', [HomeController::class, 'index'])->name('home');

          Route::get('/all_products', [ProductsController::class, 'index'])->name('products.show_all');
          Route::get('/products/{product:slug}', [ProductsController::class, 'show'])->name('products.show_product');

          Route::resource('cart', CartController::class);

          Route::get('get_sub_total', [CartController::class,'get_sub_total'])->name('get_sub_total');

          Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout.create');
          Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

          Route::get('/shop_grid', [ShopGridController::class, 'index'])->name('shop_grid.index');

          Route::get('/sort', [ShopGridController::class, 'sortBy'])->name('sort');

          Route::get('/all_filters', [ShopGridController::class, 'all_filters'])->name('all_filters');

          Route::get('/reset_filters', [ShopGridController::class, 'reset_filters'])->name('reset_filters');

          Route::get('/category_filter', [ShopGridController::class, 'category_filter'])->name('category_filter');

          Route::get('/brand_filter', [ShopGridController::class, 'brand_filter'])->name('brand_filter');

          Route::get('/search_products', [ShopGridController::class, 'search_products'])->name('search_products');

          Route::get('/price_range', [ShopGridController::class, 'priceFilter'])->name('price_range');

          Route::get('auth/user/2fa', [TwoFactorAuthenticationController::class, 'index'])->name('front.2fa');
});
