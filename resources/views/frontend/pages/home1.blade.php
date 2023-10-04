<x-front-layout title="{{ config('app.name') }}">

    @push('styles')

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <style>
            /* Style for the autocomplete container */
            .product-suggestion {
                display: flex;
                /* Use flexbox to arrange image and name in a row */
                flex-direction: row;
                /* Ensure a horizontal layout */
                align-items: center;
                /* Vertically center items within the suggestion container */
                padding: 5px;
                /* Add padding for spacing */
                border-bottom: 1px solid #ccc;
                /* Add a border between suggestions */
            }

            /* Style for the product image */
            .product-image {
                width: 50px;
                /* Adjust the width as needed */
                height: 50px;
                /* Adjust the height as needed */
                margin-right: 10px;
                /* Add margin for spacing between image and name */
            }

            /* Style for the product name */
            .product-name {
                font-weight: bold;
                /* Make the name text bold */
            }
        </style>
    @endpush


    <!-- Start Slider Area -->
    <section class="hero-area">
        <div class="container">

            <x-frontend.alert type="info" />

            <div class="row">

                @if ($websiteParts['parts']['Slider'] ?? null && $websiteParts['parts']['Slider'] == 1)
                    <div class="col-lg-12 col-12 custom-padding-right">
                        <div class="slider-head" style="direction: ltr">
                            <!-- Start Hero Slider -->
                            <div class="hero-slider">
                                <!-- Start Single Slider -->
                                <div class="single-slider" {{-- style="background-image:url({{ $banners["banners"]["banner_1"] }})" --}} style="background-color: aliceblue"
                                    {{-- style="background-image: url(https://via.placeholder.com/800x500);" --}}>
                                    <div class="content">
                                        <h2><span>No restocking fee ($35 savings)</span>
                                            M75 Sport Watch
                                        </h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor
                                            incididunt ut
                                            labore dolore magna aliqua.</p>
                                        <h3><span>Now Only</span> $320.99</h3>
                                        <div class="button">
                                            <a href="product-grids.html" class="btn">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slider -->
                                <!-- Start Single Slider -->
                                <div class="single-slider"
                                    style="background-image: url(https://via.placeholder.com/800x500);">
                                    <div class="content">
                                        <h2><span>Big Sale Offer</span>
                                            Get the Best Deal on CCTV Camera
                                        </h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor
                                            incididunt ut
                                            labore dolore magna aliqua.</p>
                                        <h3><span>Combo Only:</span> $590.00</h3>
                                        <div class="button">
                                            <a href="product-grids.html" class="btn">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slider -->
                            </div>
                            <!-- End Hero Slider -->
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
    <!-- End Slider Area -->


    @if (
        $websiteParts['parts']['Featured Categories Section'] ??
            null && $websiteParts['parts']['Featured Categories Section'] == 1)
        <!-- Start Featured Categories Area -->
        <section class="featured-categories section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>{{ trans('home_trans.Featured Categories') }}</h2>
                            {{-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($featured_categories as $featured_category)
                        <div class="col-lg-6 col-md-6 col-12">
                            <!-- Start Single Category -->
                            <div class="single-category">
                                <h3 class="heading">{{ $featured_category->name }}</h3>
                                <ul>
                                    {{-- @php
                                        dd($featured_category->children);
                                    @endphp --}}
                                    @foreach ($featured_category->children as $subcategory)
                                        <li><a href="">{{ $subcategory->name }}</a></li>
                                    @endforeach
                                    {{-- <li><a href="product-grids.html">Smart Television</a></li>
                                <li><a href="product-grids.html">QLED TV</a></li>
                                <li><a href="product-grids.html">Audios</a></li>
                                <li><a href="product-grids.html">Headphones</a></li>
                                <li><a href="product-grids.html">View All</a></li> --}}
                                </ul>
                                <div class="images">
                                    <img src="{{ $featured_category->image_url }}" height="120" width="180"
                                        alt="#">
                                </div>
                            </div>
                            <!-- End Single Category -->
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
        <!-- End Features Area -->
    @endif


    @if (
        $websiteParts['parts']['Trending Product Section'] ??
            null && $websiteParts['parts']['Trending Product Section'] == 1)

        <!-- Start Trending Product Area -->
        <section class="trending-product section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>{{ trans('home_trans.New Products') }}</h2>
                            {{-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-6 col-12">
                            <x-frontend.product-card :product="$product" />
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- End Trending Product Area -->

    @endif


    @if ($websiteParts['parts']['Banner Section'] ?? null && $websiteParts['parts']['Banner Section'] == 1)
        <!-- Start Banner Area -->
        <section class="banner section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="single-banner" style="background-image:url('https://via.placeholder.com/620x340')">
                            <div class="content">
                                <h2>Smart Watch 2.0</h2>
                                <p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
                                <div class="button">
                                    <a href="product-grids.html" class="btn">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="single-banner custom-responsive-margin"
                            style="background-image:url('https://via.placeholder.com/620x340')">
                            <div class="content">
                                <h2>Smart Headphone</h2>
                                <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                                    incididunt ut labore.</p>
                                <div class="button">
                                    <a href="product-grids.html" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->
    @endif


    @if ($websiteParts['parts']['Special Offers Section'] ?? null && $websiteParts['parts']['Special Offers Section'] == 1)
        <!-- Start Special Offer -->
        <section class="special-offer section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Special Offer</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-image">
                                        <img src="https://via.placeholder.com/335x335" alt="#">
                                        <div class="button">
                                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                                Add to
                                                Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <span class="category">Camera</span>
                                        <h4 class="title">
                                            <a href="product-grids.html">WiFi Security Camera</a>
                                        </h4>
                                        <ul class="review">
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><span>5.0 Review(s)</span></li>
                                        </ul>
                                        <div class="price">
                                            <span>$399.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-image">
                                        <img src="https://via.placeholder.com/335x335" alt="#">
                                        <div class="button">
                                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                                Add to
                                                Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <span class="category">Laptop</span>
                                        <h4 class="title">
                                            <a href="product-grids.html">Apple MacBook Air</a>
                                        </h4>
                                        <ul class="review">
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><span>5.0 Review(s)</span></li>
                                        </ul>
                                        <div class="price">
                                            <span>$899.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-image">
                                        <img src="https://via.placeholder.com/335x335" alt="#">
                                        <div class="button">
                                            <a href="product-details.html" class="btn"><i
                                                    class="lni lni-cart"></i>
                                                Add to
                                                Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <span class="category">Speaker</span>
                                        <h4 class="title">
                                            <a href="product-grids.html">Bluetooth Speaker</a>
                                        </h4>
                                        <ul class="review">
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star"></i></li>
                                            <li><span>4.0 Review(s)</span></li>
                                        </ul>
                                        <div class="price">
                                            <span>$70.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                        </div>
                        <!-- Start Banner -->
                        <div class="single-banner right"
                            style="background-image:url('https://via.placeholder.com/730x310');margin-top: 30px;">
                            <div class="content">
                                <h2>Samsung Notebook 9 </h2>
                                <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                                    incididunt ut labore.</p>
                                <div class="price">
                                    <span>$590.00</span>
                                </div>
                                <div class="button">
                                    <a href="product-grids.html" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Banner -->
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="offer-content">
                            <div class="image">
                                <img src="https://via.placeholder.com/510x600" alt="#">
                                <span class="sale-tag">-50%</span>
                            </div>
                            <div class="text">
                                <h2><a href="product-grids.html">Bluetooth Headphone</a></h2>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><span>5.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    <span>$200.00</span>
                                    <span class="discount-price">$400.00</span>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry incididunt
                                    ut
                                    eiusmod tempor labores.</p>
                            </div>
                            <div class="box-head">
                                <div class="box">
                                    <h1 id="days">000</h1>
                                    <h2 id="daystxt">Days</h2>
                                </div>
                                <div class="box">
                                    <h1 id="hours">00</h1>
                                    <h2 id="hourstxt">Hours</h2>
                                </div>
                                <div class="box">
                                    <h1 id="minutes">00</h1>
                                    <h2 id="minutestxt">Minutes</h2>
                                </div>
                                <div class="box">
                                    <h1 id="seconds">00</h1>
                                    <h2 id="secondstxt">Secondes</h2>
                                </div>
                            </div>
                            <div style="background: rgb(204, 24, 24);" class="alert">
                                <h1 style="padding: 50px 80px;color: white;">We are sorry, Event ended ! </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Special Offer -->
    @endif



    @if (
        $websiteParts['parts']['Home Product List Section'] ??
            null && $websiteParts['parts']['Home Product List Section'] == 1)

        <!-- Start Home Product List -->
        <section class="home-product-list section">
            <div class="container">
                <div class="row">

                    @if ($websiteParts['parts']['Best Sellers'] ?? null && $websiteParts['parts']['Best Sellers'] == 1)
                        {{-- @php
                            $best_seller_products= App\Models\Product::where('product_type','=','best_seller')->active()->latest()->take(4)->get();
                            $new_arrival_products= App\Models\Product::where('product_type','=','new_arrival')->active()->latest()->take(4)->get();
                            $top_rated_products= App\Models\Product::where('product_type','=','top_rated')->active()->latest()->take(4)->get();
                        @endphp --}}
                        <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                            <h4 class="list-title">Best Sellers</h4>
                            {{-- @foreach ($best_seller_products as $best_seller_product)
                                <!-- Start Single List -->
                                <div class="single-list">
                                    <div class="list-image">
                                        <a href="product-grids.html">
                                            <img src="{{ $best_seller_product->image_url }}"
                                                alt="#"></a>
                                    </div>
                                    <div class="list-info">
                                        <h3>
                                            <a href="product-grids.html">{{ $best_seller_product->name }}</a>
                                        </h3>
                                        <span>{{ $best_seller_product->price }}</span>
                                    </div>
                                </div>
                            <!-- End Single List --> 
                            @endforeach --}}


                        </div>
                    @endif

                    @if ($websiteParts['parts']['New Arrivals'] ?? null && $websiteParts['parts']['New Arrivals'] == 1)
                        <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                            <h4 class="list-title">New Arrivals</h4>

                            {{-- @foreach ($new_arrival_products as $new_arrival_product)
                            
                                <div class="single-list">
                                    <div class="list-image">
                                        <a href="product-grids.html">
                                            <img src="{{ $new_arrival_product->image_url }}"
                                                alt="#"></a>
                                    </div>
                                    <div class="list-info">
                                        <h3>
                                            <a href="product-grids.html">{{ $new_arrival_product->name }}</a>
                                        </h3>
                                        <span>{{ $new_arrival_product->price }}</span>
                                    </div>
                                </div>
                            @endforeach --}}

                        </div>
                    @endif

                    @if ($websiteParts['parts']['Top Rated'] ?? null && $websiteParts['parts']['Top Rated'] == 1)
                        <div class="col-lg-4 col-md-4 col-12">
                            <h4 class="list-title">Top Rated</h4>
                            {{-- @foreach ($top_rated_products as $top_rated_product)
                            
                                <div class="single-list">
                                    <div class="list-image">
                                        <a href="product-grids.html">
                                            <img src="{{ $top_rated_product->image_url }}"
                                                alt="#"></a>
                                    </div>
                                    <div class="list-info">
                                        <h3>
                                            <a href="product-grids.html">{{ $top_rated_product->name }}</a>
                                        </h3>
                                        <span>{{ $top_rated_product->price }}</span>
                                    </div>
                                </div>
                            
                            @endforeach --}}

                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- End Home Product List -->

    @endif


    @if ($websiteParts['parts']['Brands Section'] ?? null && $websiteParts['parts']['Brands Section'] == 1)
        <!-- Start Brands Area -->
        <div class="brands" style="direction: ltr">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                        <h2 class="title">Popular Brands</h2>
                    </div>
                </div>
                <div class="brands-logo-wrapper">
                    <div class="brands-logo-carousel d-flex align-items-center justify-content-between">

                        @foreach ($brands as $brand)
                            <div class="brand-logo">
                                <img src="{{ $brand->image_url }}" alt="#">
                                <p>{{ $brand->name }}</p>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!-- End Brands Area -->
    @endif


    
    @if ($websiteParts['parts']['Blog Section'] ?? null && $websiteParts['parts']['Blog Section'] == 1)
        <!-- Start Blog Section Area -->
        <section class="blog-section section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Our Latest News</h2>
                            <p>There are many variations of passages of Lorem
                                Ipsum available, but the majority have suffered alteration in some form.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Blog -->
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="blog-single-sidebar.html">
                                    <img src="https://via.placeholder.com/370x215" alt="#">
                                </a>
                            </div>
                            <div class="blog-content">
                                <a class="category" href="javascript:void(0)">eCommerce</a>
                                <h4>
                                    <a href="blog-single-sidebar.html">What information is needed for shipping?</a>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt.</p>
                                <div class="button">
                                    <a href="javascript:void(0)" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Blog -->
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="blog-single-sidebar.html">
                                    <img src="https://via.placeholder.com/370x215" alt="#">
                                </a>
                            </div>
                            <div class="blog-content">
                                <a class="category" href="javascript:void(0)">Gaming</a>
                                <h4>
                                    <a href="blog-single-sidebar.html">Interesting fact about gaming consoles</a>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt.</p>
                                <div class="button">
                                    <a href="javascript:void(0)" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Blog -->
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="blog-single-sidebar.html">
                                    <img src="https://via.placeholder.com/370x215" alt="#">
                                </a>
                            </div>
                            <div class="blog-content">
                                <a class="category" href="javascript:void(0)">Electronic</a>
                                <h4>
                                    <a href="blog-single-sidebar.html">Electronics, instrumentation & control
                                        engineering
                                    </a>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt.</p>
                                <div class="button">
                                    <a href="javascript:void(0)" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Section Area -->
    @endif

    @if ($websiteParts['parts']['Shipping Info Section'] ?? null && $websiteParts['parts']['Shipping Info Section   '] == 1)
        <!-- Start Shipping Info -->
        <section class="shipping-info">
            <div class="container">
                <ul>
                    <!-- Free Shipping -->
                    <li>
                        <div class="media-icon">
                            <i class="lni lni-delivery"></i>
                        </div>
                        <div class="media-body">
                            <h5>Free Shipping</h5>
                            <span>On order over $99</span>
                        </div>
                    </li>
                    <!-- Money Return -->
                    <li>
                        <div class="media-icon">
                            <i class="lni lni-support"></i>
                        </div>
                        <div class="media-body">
                            <h5>24/7 Support.</h5>
                            <span>Live Chat Or Call.</span>
                        </div>
                    </li>
                    <!-- Support 24/7 -->
                    <li>
                        <div class="media-icon">
                            <i class="lni lni-credit-cards"></i>
                        </div>
                        <div class="media-body">
                            <h5>Online Payment.</h5>
                            <span>Secure Payment Services.</span>
                        </div>
                    </li>
                    <!-- Safe Payment -->
                    <li>
                        <div class="media-icon">
                            <i class="lni lni-reload"></i>
                        </div>
                        <div class="media-body">
                            <h5>Easy Return.</h5>
                            <span>Hassle Free Shopping.</span>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- End Shipping Info -->
    @endif


    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
            $.noConflict();
            jQuery(document).ready(function($) {

                // $("#search").autocomplete({
                //     source: function(request, response) {

                //         // Send an AJAX request to fetch matching customer names
                //         $.ajax({
                //             url: "{{ route('products.autocomplete') }}", // Replace with the actual route
                //             dataType: "json",
                //             data: {
                //                 term: request.term,
                //             },
                //             success: function(data) {
                //                 // Map the response data to label and value
                //                 var mappedData = $.map(data, function(item) {
                //                     return {
                //                         label: item
                //                             .name, // Displayed in the autocomplete dropdown
                //                         value: item
                //                             .id, // Value placed in the input field when selected
                //                         name: item.name, // Additional data (optional)
                //                         slug: item.slug,
                //                         image:item.image

                //                     };
                //                 });

                //                 // Display autocomplete suggestions
                //                 response(mappedData);
                //             },
                //         });
                //     },
                //     minLength: 1,
                //     position: {
                //         my: "left top+5",
                //         at: "left bottom"
                //     },
                //     width: 200,
                //     autoFill: true,
                //     select: function(event, ui) {
                //         $("#search").val(ui.item.label); // Set the customer name in the input field

                //         // Navigate to the product details page
                //         window.location.href = "{{ route('products.show_product', '') }}/" + ui.item.slug;

                //         // Prevent the default behavior of the autocomplete widget
                //         return false;
                //     },
                // });

                $("#search").autocomplete({
                    source: function(request, response) {
                        // Send an AJAX request to fetch matching product data
                        $.ajax({

                            url: "{{ route('products.autocomplete') }}", // Replace with the actual route
                            dataType: "json",
                            data: {
                                term: request.term,
                            },

                            success: function(data) {
                                var mappedData = $.map(data, function(item) {
                                    // Create a custom HTML element for each suggestion
                                    var suggestionHtml =
                                        '<div class="product-suggestion">' +
                                        '<div class="product-image-container">' +
                                        '<img width="50" height="50" src="' + item
                                        .image_url +
                                        '" class="product-image" alt="Product Image">' +
                                        '</div>' +
                                        '<div class="product-details">' +
                                        '<div class="product-name">' + item.name +
                                        '</div>' +
                                        '</div>' +
                                        '</div>';

                                    return {
                                        label: item
                                            .name, // Displayed in the autocomplete dropdown
                                        value: item
                                            .id, // Value placed in the input field when selected
                                        html: suggestionHtml, // Custom HTML for the suggestion
                                        slug: item.slug,
                                    };
                                });

                                // Display autocomplete suggestions with custom HTML
                                response(mappedData);
                            },
                        });
                    },
                    minLength: 1,
                    position: {
                        my: "left top+5",
                        at: "left bottom",
                    },
                    width: 300, // Adjust the width as needed
                    autoFill: true,
                    select: function(event, ui) {
                        $("#search").val(ui.item.label); // Set the product name in the input field

                        // Navigate to the product details page
                        window.location.href = "{{ route('products.show_product', '') }}/" + ui.item.slug;

                        // Prevent the default behavior of the autocomplete widget
                        return false;
                    },
                }).data("ui-autocomplete")._renderItem = function(ul, item) {
                    // Append the custom HTML to the autocomplete dropdown
                    return $("<li>")
                        .append(item.html)
                        .appendTo(ul);
                };

            })
        </script>
        
        <script type="text/javascript">
            //========= Hero Slider 
            tns({
                container: '.hero-slider',
                slideBy: 'page',
                autoplay: true,
                autoplayButtonOutput: false,
                mouseDrag: true,
                gutter: 0,
                items: 1,
                nav: false,
                controls: true,
                controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
            });

            //======== Brand Slider
            tns({
                container: '.brands-logo-carousel',
                autoplay: true,
                autoplayButtonOutput: false,
                mouseDrag: true,
                gutter: 15,
                nav: false,
                controls: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    540: {
                        items: 3,
                    },
                    768: {
                        items: 5,
                    },
                    992: {
                        items: 6,
                    }
                }
            });
        </script>
        <script>
            const finaleDate = new Date("Auguest 15, 2023 00:00:00").getTime();

            const timer = () => {
                const now = new Date().getTime();
                let diff = finaleDate - now;
                if (diff < 0) {
                    document.querySelector('.alert').style.display = 'block';
                    document.querySelector('.container').style.display = 'none';
                }

                let days = Math.floor(diff / (1000 * 60 * 60 * 24));
                let hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
                let minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60));
                let seconds = Math.floor(diff % (1000 * 60) / 1000);

                days <= 99 ? days = `0${days}` : days;
                days <= 9 ? days = `00${days}` : days;
                hours <= 9 ? hours = `0${hours}` : hours;
                minutes <= 9 ? minutes = `0${minutes}` : minutes;
                seconds <= 9 ? seconds = `0${seconds}` : seconds;

                document.querySelector('#days').textContent = days;
                document.querySelector('#hours').textContent = hours;
                document.querySelector('#minutes').textContent = minutes;
                document.querySelector('#seconds').textContent = seconds;

            }
            timer();
            setInterval(timer, 1000);
        </script>
        <script>
            const csrf_token = "{{ csrf_token() }}";
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="{{ asset('frontend/assets/js/cart.js') }}"></script>
    @endpush

</x-front-layout>
