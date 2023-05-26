<x-front-layout>

    <x-slot name="breadcrumbs">


        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Cart</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ Route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                            <li><a href="index.html">Shop</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    </x-slot>

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">
                <!-- Cart List Title -->
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">

                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Subtotal</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Discount</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                <!-- End Cart List Title -->

                @foreach ($cart->get() as $cart_item)

                    <!-- Cart Item (product) -->
                    <div class="cart-single-list" id="{{ $cart_item->id }}">
                        <div class="row align-items-center">

                            <div class="col-lg-1 col-md-1 col-12">
                                <a href="{{ Route('products.show_product', $cart_item->product->slug) }}">
                                    <img src="{{ $cart_item->product->image_url }}" alt="#"></a>
                            </div>
                            
                            <div class="col-lg-4 col-md-3 col-12">
                                <h5 class="product-name"><a
                                        href="{{ Route('products.show_product', $cart_item->product->slug) }}">
                                        {{ $cart_item->product->name }}</a></h5>
                                <p class="product-des">
                                    <span><em>Type:</em> {{ $cart_item->product->category->name }}</span>
                                    <span><em>Color:</em> Black</span>
                                </p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <div class="count-input">
                                    <input class="form-control item_quantity" name="quantity" 
                                    data-id="{{$cart_item->id}}"
                                        data-product-id="{{ $cart_item->product->id }}" value="{{ $cart_item->quantity }}">                                    
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-12" id="sub_total_{{ $cart_item->product->id }}">
                                <p>{{ Currency::format($cart_item->quantity * $cart_item->product->price) }}</p>
                            </div>

                            <div class="col-lg-2 col-md-2 col-12">
                                <p>{{ Currency::format(0) }}</p>
                            </div>

                            <div class="col-lg-1 col-md-2 col-12">
                                <a class="remove-item" data-id="{{ $cart_item->id }}" href="javascript:void(0)"><i
                                        class="lni lni-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List list -->
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <div id="total">
                                        <li>Cart Subtotal<span >{{ Currency::format($cart->total()) }}</span></li>
                                        </div>
                                        <li>Shipping<span>Free</span></li>

                                        <li>You Save<span>$29.00</span></li>
                                        <li class="last">You Pay<span>$2531.00</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{ Route('checkout.create') }}" class="btn">Checkout</a>
                                        <a href="{{ route('home') }}" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->

    @push('scripts')
        <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>

        <script>
            const csrf_token = "{{ csrf_token() }}";

            $(document).ready(function() {
                $('.item_quantity').on('keyup', function() {
                    var quantity = $(this).val();
                    var product_id = $(this).data("product-id");
                    console.log(product_id);
                    $.ajax({
                        url: "{{ route('get_sub_total') }}",
                        type: "GET",
                        data: {
                            quantity: quantity,
                            product_id: product_id,
                        },
                        success: function(res) {
                            $('#sub_total_' + product_id).html(res);
                        },
                    });
                }, );
            });


            $(document).ready(function() {
                $('.item_quantity').on('keyup', function() {
                    var quantity = $(this).val();
                    var product_id = $(this).data("product-id");
                    console.log(product_id);
                    $.ajax({
                        url: "{{ route('get_all_total') }}",
                        type: "GET",
                        data: {
                            quantity: quantity,
                            product_id: product_id,
                        },
                        success: function(res) {
                            console.log(res);
                            $('#total').html(res);
                        },
                    });
                }, );
            });
        </script>

        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}
        <script src="{{ asset('frontend/assets/js/cart.js') }}"></script>
    @endpush
</x-front-layout>
