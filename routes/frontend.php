<?php

use App\Http\Controllers\Frontend\Auth\TwoFactorAuthenticationController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductsController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\ReviewsController;
use App\Http\Controllers\Frontend\SendOTPController;
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

    Route::group(
        ['middleware' => ['auth:web','email_verified']],
        function () {
            Route::resource('cart', CartController::class);
            Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');
            Route::resource('reviews', ReviewsController::class);
            Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout.create');
            Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

            Route::get('/profile_edit', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::put('/profile_update', [ProfileController::class, 'update'])->name('profile.update');

        }
    );

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/user/get-cities', [ProfileController::class, 'getCities']);
    Route::get('/user/get-neighborhoods', [ProfileController::class, 'getNeighborhoods']);

    Route::get('/all_products', [ProductsController::class, 'index'])->name('products.show_all');
    Route::get('/product_autocomplete', [ProductsController::class, 'productAutocomplete'])->name('products.autocomplete');
    
    Route::get('/products/{product:slug}', [ProductsController::class, 'show'])->name('products.show_product');
    
    Route::get('/product_variant/{product:slug}', [ProductsController::class, 'show_variant'])->name('products.show_product_variant');


    Route::get('get_sub_total', [CartController::class, 'get_sub_total'])->name('get_sub_total');

    Route::get('/get-formatted-currency/{amount?}', [CartController::class,'getFormattedCurrency'])->name('get_formatted_currency');

    Route::get('get_all_total', [CartController::class, 'get_all_total'])->name('get_all_total');

    Route::get('/shop_grid/{categoryId?}', [ShopGridController::class, 'index'])->name('shop_grid.index');

    Route::get('/shop_grid_store/{storeId?}', [ShopGridController::class, 'indexStore'])->name('shop_grid.indexStore');

    Route::get('/all_filters', [ShopGridController::class, 'all_filters'])->name('all_filters');

    Route::get('/reset_filters', [ShopGridController::class, 'reset_filters'])->name('reset_filters');

    Route::get('auth/user/2fa', [TwoFactorAuthenticationController::class, 'index'])->name('front.2fa');

    Route::get('/send-otp', function () {
        return view('frontend.pages.send_otp');
    });
    Route::post('/send-otp', [SendOTPController::class,'sendOTP'])->name('send-otp');

    // Route::get('/categories_filter/{category_id}', [ShopGridController::class, 'categories_filter'])->name('categories_filter');

    // Route::get('/sort', [ShopGridController::class, 'sortBy'])->name('sort');

    // Route::get('/category_filter', [ShopGridController::class, 'category_filter'])->name('category_filter');

    // Route::get('/brand_filter', [ShopGridController::class, 'brand_filter'])->name('brand_filter');

    // Route::get('/search_products', [ShopGridController::class, 'search_products'])->name('search_products');

    // Route::get('/price_range', [ShopGridController::class, 'priceFilter'])->name('price_range');

});