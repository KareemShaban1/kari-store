<x-front-layout>

    @push('styles')
        <style>
            #rangeValue {
                position: relative;
                text-align: center;
                width: 60px;
                font-size: 1.25em;
                color: #fff;
                background: #27a0ff;
                margin-left: 15px;
                border-radius: 25px;
                font-weight: 500;
                box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1), -5px -5px 10px #fff, inset 5px 5px 10px rgba(0, 0, 0, 0.1), inset -5px -5px 5px rgba(255, 255, 255, 0.05);
            }

            .middle {
                position: relative;
                width: 100%;
                max-width: 500px;
                margin-top: 10px;
                display: inline-block;
            }

            .slider {
                position: relative;
                z-index: 1;
                height: 10px;
                margin: 0 15px;
            }

            .slider>.track {
                position: absolute;
                z-index: 1;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                border-radius: 5px;
                background-color: #b5d7f1;
            }

            .slider>.range {
                position: absolute;
                z-index: 2;
                left: 25%;
                right: 25%;
                top: 0;
                bottom: 0;
                border-radius: 5px;
                background-color: #27a0ff;
            }

            .slider>.thumb {
                position: absolute;
                z-index: 3;
                width: 20px;
                height: 20px;
                background-color: #27a0ff;
                border-radius: 50%;
            }

            .slider>.thumb.left {
                left: 25%;
                transform: translate(-15px, -5px);
            }

            .slider>.thumb.right {
                right: 25%;
                transform: translate(15px, -5px);
            }

            .range_slider {
                position: absolute;
                pointer-events: none;
                -webkit-appearance: none;
                z-index: 2;
                height: 5px;
                width: 100%;
                opacity: 0;
            }

            .range_slider::-webkit-slider-thumb {
                pointer-events: all;
                width: 30px;
                height: 30px;
                border-radius: 0;
                border: 0 none;
                background-color: red;
                cursor: pointer;
                -webkit-appearance: none;
            }

            #multi_range {
                margin: 0 auto;
                background-color: #27a0ff;
                border-radius: 20px;
                margin-top: 20px;
                text-align: center;
                width: 90px;
                font-weight: 500;
                font-size: 1.25em;
                color: #fff;
            }
        </style>
    @endpush

    <x-slot name="breadcrumbs">


        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Shop Grid</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ Route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                            <li><a href="">Shop</a></li>
                            <li>Shop Grid</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    </x-slot>

    <!-- Start Product Grids -->
    <section class="product-grids section">
        <div class="container">



            {{-- <livewire:show-products :brands="$brands" :categories="$categories" /> --}}

            <div class="row">
                <div class="col-lg-3 col-12">




                    <div class="product-sidebar">

                        <!-- Start Product reset -->
                        <div class="single-widget" style="display: flex; justify-content: center; align-items: center;">
                            <div class="button "> <a href="" class="btn"> Reset Filters </a> </div>
                        </div>
                        <!-- End Product reset -->

                        <!-- Start Product search -->
                        <div class="single-widget search">
                            <h3>Search Product</h3>
                            <form action="#">
                                <input type="text" name="search"id="search" placeholder="Search Here...">
                                {{-- <button type="submit"><i class="lni lni-search-alt"></i></button> --}}
                            </form>
                        </div>
                        <!-- End Product search -->



                        <!-- Start Categories Filter -->
                        <div class="single-widget">
                            <h3>All Categories</h3>
                            <ul class="list">
                                @foreach ($categories as $category)
                                    <li>
                                        {{-- <a href="" >{{ $category->name }} </a> --}}
                                        <input type="radio" value="{{ $category->id }}" name="category"
                                            class="category">
                                        <label for="">{{ $category->name }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Categories Filter -->


                        <!-- Start Brand Filter -->
                        <div class="single-widget condition">
                            <h3>Filter by Brand</h3>
                            @foreach ($brands as $brand)
                                <input type="radio" class="brands" name="brand" value="{{ $brand->id }}">
                                <label>
                                    {{ $brand->name }}
                                </label>
                            @endforeach
                        </div>
                        <!-- End Brand Filter -->



                        <!-- Start Price Filter -->
                        <div class="single-widget range">
                            <h3>Price Range</h3>
                            <div class="middle">
                                <div id="multi_range">
                                    <span id="left_value">25</span><span> ~ </span><span id="right_value">75</span>
                                </div>
                                <div class="multi-range-slider my-2">
                                    <input type="range" id="input_left" class="range_slider" min="0"
                                        max="100" value="25" onmousemove="left_slider(this.value)">
                                    <input type="range" id="input_right" class="range_slider" min="0"
                                        max="100" value="75" onmousemove="right_slider(this.value)">
                                    <div class="slider">
                                        <div class="track"></div>
                                        <div class="range"></div>
                                        <div class="thumb left"></div>
                                        <div class="thumb right"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Price Filter -->

                    </div>

                </div>
                <!-- End Product Sidebar -->


                <!-- Start Products section -->
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">

                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting dropdown">
                                        <label for="sorting">Sort by:</label>
                                        <select class="form-control" name="sort" id="sort">
                                            <option>Select Order</option>
                                            <option>Low Price</option>
                                            <option>High Price</option>
                                            <option>A - Z Order</option>
                                        </select>
                                        <h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
                                    </div>



                                </div>

                                {{-- <div class="col-lg-5 col-md-4 col-12">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-grid" type="button" role="tab"
                                                aria-controls="nav-grid" aria-selected="true"><i
                                                    class="lni lni-grid-alt"></i></button>
                                            <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-list" type="button" role="tab"
                                                aria-controls="nav-list" aria-selected="false"><i
                                                    class="lni lni-list"></i></button>
                                        </div>
                                    </nav>
                                </div> --}}
                            </div>
                        </div>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                aria-labelledby="nav-grid-tab">
                                <div class="show_products">
                                    @include('frontend.pages.show_products')

                                </div>
                            </div>

                            {{-- <div class="tab-pane fade" id="nav-list" role="tabpanel"
                                aria-labelledby="nav-list-tab">
                                <div class="row">
                        
                                    @foreach ($products as $prouct)
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <!-- Start Single Product -->
                                            <div class="single-product">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="product-image">
                                                            <img src="https://via.placeholder.com/335x335"
                                                                alt="#">
                                                            <div class="button">
                                                                <a href="product-details.html" class="btn"><i
                                                                        class="lni lni-cart"></i> Add to
                                                                    Cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-12">
                                                        <div class="product-info">
                                                            <span class="category">Watches</span>
                                                            <h4 class="title">
                                                                <a href="product-grids.html">{{ $product->name }}</a>
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
                                                                <span>$199.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Product -->
                                        </div>
                                    @endforeach
                        
                        
                        
                                </div>
                        
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Pagination -->
                                        <div class="pagination center">
                                            <ul class="pagination-list">
                                                {{ $products->links() }}
                                            </ul>
                                        </div>
                        
                                        <!--/ End Pagination -->
                                    </div>
                                </div>
                            </div> --}}
                        </div>




                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Product Grids -->

    @push('scripts')
        <script src="{{asset('backend/assets/js/jquery-3.6.0.min.js')}}"></script>


        <script>

            const input_left = document.getElementById("input_left");
            const input_right = document.getElementById("input_right");
            const thumb_left = document.querySelector(".slider > .thumb.left");
            const thumb_right = document.querySelector(".slider > .thumb.right");
            const range = document.querySelector(".slider > .range");

            const set_left_value = () => {
                const _this = input_left;
                const [min, max] = [parseInt(_this.min), parseInt(_this.max)];

                _this.value = Math.min(parseInt(_this.value), parseInt(input_right.value) - 1);

                const percent = ((_this.value - min) / (max - min)) * 100;
                thumb_left.style.left = percent + "%";
                range.style.left = percent + "%";
            };
            const set_right_value = () => {
                const _this = input_right;
                const [min, max] = [parseInt(_this.min), parseInt(_this.max)];

                _this.value = Math.max(parseInt(_this.value), parseInt(input_left.value) + 1);

                const percent = ((_this.value - min) / (max - min)) * 100;
                thumb_right.style.right = 100 - percent + "%";
                range.style.right = 100 - percent + "%";
            };

            input_left.addEventListener("input", set_left_value);
            input_right.addEventListener("input", set_right_value);

            function left_slider(value) {
                document.getElementById('left_value').innerHTML = value;
            }
            function right_slider(value) {
                document.getElementById('right_value').innerHTML = value;
            }

            
            $(document).ready(function() {

                var category = $('.category').val();
                var brand = $('.brand').val();
                var min_price = $('.min_price').val();
                var max_price = $('.max_price').val();
                var search = $('#search').val();
                // var sort = $('.sort').val();

                $.ajax({
                    url: "{{ route('all_filters') }}",
                    type: "GET",
                    data: {
                        category: category,
                        brand: brand,
                        min_price: min_price,
                        max_price: max_price,
                        search: search
                    },
                    success:function(res){
                        $('.show_products').html(res);
                    }
                });


                
                // apply search filter
                $('#search').on('keyup', function() {
                    let search = $(this).val();
                    console.log(search);
                    $.ajax({
                        url: "{{ route('search_products') }}",
                        type: "GET",
                        data: {
                            search: search
                        },
                        success: function(res) {
                            console.log(res);
                            $('.show_products').html(res);
                        },
                    });
                });

                // apply category filter
                $('input[name="category"]').on('click', function() {
                    
                    var category = $(this).val();
                    
                    console.log(category);
                    $.ajax({
                        url: "{{ route('category_filter') }}",
                        type: "GET",
                        data: {
                            category: category
                        },
                        success: function(res) {
                            // console.log(res);
                            $('.show_products').html(res);
                        },
                    });
                }, );

                // apply brand filter
                $('input[name="brand"]').on('click', function() {
                    var brand = $(this).val();
                    console.log(brand);
                    $.ajax({
                        url: "{{ route('brand_filter') }}",
                        type: "GET",
                        data: {
                            brand: brand
                        },
                        success: function(res) {
                            // console.log(res);
                            $('.show_products').html(res);
                        },
                    });
                }, );

                // apply sort filter 
                $('#sort').on('change', function() {
                    let sort = $('#sort').val();
                    $.ajax({
                        url: "{{ route('sort') }}",
                        type: "GET",
                        data: {
                            sort: sort
                        },
                        success: function(res) {
                            // console.log(res);
                            $('.show_products').html(res);
                        },

                    });
                });

                // apply price filter
                $('.range_slider').on('change', function() {
                    let left_value = $('#input_left').val();
                    let right_value = $('#input_right').val();
                    $.ajax({
                        url: "{{ route('price_range') }}",
                        method: "GET",
                        data: {
                            left_value: left_value,
                            right_value: right_value
                        },
                        success: function(res) {
                            $('.show_products').html(res);
                        }
                    });
                });

                // apply reset filters
                $('.reset').on('click', function() {
                    
                    $.ajax({
                        url: "{{ route('reset_filters') }}",
                        type: "GET",
                        success: function(res) {
                            // console.log(res);
                            $('.show_products').html(res);
                        },

                    });

                }, );

                


            });
        </script>
    @endpush
</x-front-layout>
