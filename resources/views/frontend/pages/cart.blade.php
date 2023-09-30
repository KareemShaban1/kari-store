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



    <x-frontend.alert type="error" />

    <x-frontend.alert type="success" />

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
                                {{-- <div class="count-input">
                                    <input class="form-control item_quantity" name="quantity"
                                        data-id="{{ $cart_item->id }}" data-product-id="{{ $cart_item->product->id }}"
                                        value="{{ $cart_item->quantity }}">
                                </div> --}}

                                <div class="count-input">
                                    <button class="quantity-btn minus btn-minus" data-id="{{ $cart_item->id }}"
                                        data-product-id="{{ $cart_item->product->id }}">-</button>
                                    <span class="quantity">{{ $cart_item->quantity }}</span>
                                    <button class="quantity-btn plus btn-plus" data-id="{{ $cart_item->id }}"
                                        data-product-id="{{ $cart_item->product->id }}">+</button>
                                </div>

                            </div>

                            <div class="col-lg-2 col-md-2 col-12" id="sub_total_{{ $cart_item->product->id }}">
                                <p id="sub_total_amount_{{ $cart_item->product->id }}">
                                    {{ Currency::format($cart_item->quantity * $cart_item->product->price) }}</p>
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
                                        <div style="margin-bottom: 20px">
                                            @if ($temp_session)
                                                <span class="text-danger">{{ $temp_session->coupon->code }} </span>
                                                coupon is applied with discount
                                                {{ Currency::format($temp_session->coupon->discount_amount) }}
                                            @endif
                                        </div>
                                        <form action="{{ route('cart.applyCoupon') }}" method="POST">
                                            @csrf
                                            <div class="single-form form-default" style="display: inline-flex;">
                                                <div class="form-input form">
                                                    <input type="text" name="coupon_code"
                                                        @if ($temp_session) style="background-color: rgb(234, 230, 230)"
                                                        disabled @endif
                                                        placeholder="Enter coupon code">
                                                </div>
                                                <div class="button">
                                                    <button class="btn"
                                                        @if ($temp_session) disabled @endif>apply</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <div id="total">
                                            <?php
                                            // get coupon stored in session , if it exist
                                            $coupon = Session::get('coupon');
                                            
                                            $coupon_discount = $coupon ? $coupon->discount_amount : 0;
                                            ?>
                                            <li>Cart Subtotal
                                                <span id="totalSubtotal">
                                                    {{-- {{ Currency::format($cart->total()) }} --}}
                                                </span>
                                            </li>
                                        </div>
                                        <li>Shipping

                                        @php
                                            $user = Auth::user();
                                            $neighborhood = $user->neighborhood->price;
                                            $shipping_fees = 0; // Initialize the shipping fees to zero
                                            $firstStoreId = null; // Initialize the first store's ID to null
                                            $firstStoreShippingFee = 0; // Initialize the shipping fee for the first store
                                            $additionalStoreShippingFee = 0; // Initialize the shipping fee for additional stores
                                            $unique = [];
                                            foreach ($cart->get() as $cart_item) {
                                                $store_id = $cart_item->product->store_id;
                                                
                                                // dd($cart_item);
                                                
                                                if ($firstStoreId === null) {
                                                    // Set the first store's ID when it's not set
                                                    $firstStoreId = $store_id;
                                                }
                                                
                                                if ($store_id === $firstStoreId) {
                                                    // Calculate shipping fees for the first product from the first store
                                                    $firstStoreShippingFee = $neighborhood;
                                                } else {
                                                    // Calculate shipping fees for the first product from other stores
                                                    $additionalStoreShippingFee = $neighborhood / 2;
                                                }
                                                
                                                // Calculate shipping fees for additional products from the same store
                                                if ($store_id === $firstStoreId) {
                                                    $shipping_fees += $firstStoreShippingFee;
                                                } else {
                                                    $shipping_fees += $additionalStoreShippingFee;
                                                }
                                            }
                                        @endphp
                                            <span class="shipping">
                                                {{-- Free --}}
                                                {{-- {{ $shipping_fees }} --}}
                                                {{ Currency::format($shipping_fees) }}
                                            </span>
                                        </li>

                                        @if ($temp_session)
                                            <li>Coupon<span>{{ $temp_session->coupon->code }}</span>
                                            </li>
                                            <li>You
                                                Save<span>{{ Currency::format($temp_session->coupon->discount_amount) }}</span>
                                            </li>
                                        @endif

                                        <li class="last">You Pay
                                            {{-- <span class="pay_total "> --}}
                                            <span id="totalAlltotal">
                                                {{-- @if ($temp_session)
                                                    {{ Currency::format($cart->total() - $shipping_fees - $temp_session->coupon->discount_amount) }}
                                                @else
                                                    {{ Currency::format($cart->total() - $shipping_fees) }}
                                                @endif --}}
                                            </span>
                                        </li>

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

            function calculateSubtotalSum() {
                var subtotalSum = 0;
                $('.cart-single-list').each(function() {
                    var subtotalText = $(this).find('.col-lg-2.col-md-2.col-12 p').text();
                    var subtotalValue = parseFloat(subtotalText.replace(/[^0-9.-]+/g, ''));
                    subtotalSum += subtotalValue;
                });

                // Cart Subtotal part
                $.ajax({
                    url: "{{ route('get_formatted_currency') }}/" + subtotalSum,
                    type: "GET",
                    success: function(response) {
                        $('#totalSubtotal').html(response.formatted_currency);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });

                // $('#totalSubtotal').html('');
                // $('#totalSubtotal').text(subtotalSum);

            }

            function calculateAlltotalSum() {
                var AlltotalSum = 0;
                // Get the shipping value from the <span> element
                var shippingText = $('.shipping').text();
                var shipping = parseFloat(shippingText.replace(/[^0-9.-]+/g, ''));

                $('.cart-single-list').each(function() {
                    var alltotalText = $(this).find('.col-lg-2.col-md-2.col-12 p').text();
                    var alltotalValue = parseFloat(alltotalText.replace(/[^0-9.-]+/g, ''));
                    AlltotalSum += alltotalValue;
                    AfterShipping = AlltotalSum + shipping;
                });

                // Cart Subtotal part
                $.ajax({
                    url: "{{ route('get_formatted_currency') }}/" + AfterShipping,
                    type: "GET",
                    success: function(response) {
                        $('#totalAlltotal').html(response.formatted_currency);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });

                // $('#totalSubtotal').html('');
                // $('#totalSubtotal').text(subtotalSum);

            }

            $(document).ready(function() {
                calculateSubtotalSum();

                calculateAlltotalSum();

                $('.minus').on('click', function() {
                    var quantityElement = $(this).siblings('.quantity');
                    var currentQuantity = parseInt(quantityElement.text());
                    var cartItemId = $(this).data('id');
                    var productId = $(this).data('product-id');

                    console.log(productId); // Access the product ID here
                    if (currentQuantity > 1) {
                        quantityElement.text(currentQuantity - 1);
                        updateCartQuantity(cartItemId, productId, currentQuantity - 1);
                    }
                    calculateSubtotalSum();
                    calculateAlltotalSum();
                });

                $('.plus').on('click', function() {
                    var quantityElement = $(this).siblings('.quantity');
                    var currentQuantity = parseInt(quantityElement.text());
                    quantityElement.text(currentQuantity + 1);
                    var cartItemId = $(this).data('id');
                    var productId = $(this).data('product-id');
                    console.log(productId); // Access the product ID here
                    updateCartQuantity(cartItemId, productId, currentQuantity + 1);
                    calculateSubtotalSum();
                    calculateAlltotalSum();
                });

                function updateCartQuantity(cartItemId, productId, quantity) {

                    $.ajax({
                        url: "{{ route('get_sub_total') }}",
                        type: "GET",
                        data: {
                            quantity: quantity,
                            product_id: productId,
                            cart_id: cartItemId,
                        },
                        success: function(response) {
                            $('#sub_total_amount_' + productId).html(response.formatted_sub_total);
                            calculateSubtotalSum();
                            calculateAlltotalSum();
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });


            // $(document).ready(function() {
            //     $('.item_quantity').on('keyup', function() {
            //         var quantity = $(this).val();
            //         var cart_id = $(this).data("id");
            //         var product_id = $(this).data("product-id");
            //         calculateSubtotalSum();
            //         console.log(product_id);
            //         $.ajax({
            //             url: "{{ route('get_sub_total') }}",
            //             type: "GET",
            //             data: {
            //                 quantity: quantity,
            //                 product_id: product_id,
            //                 cart_id:cart_id
            //             },
            //             success: function(res) {
            //                 $('#sub_total_' + product_id).html(res);
            //             },
            //         });
            //     }, );
            // });

            // calculateSubtotalSum();

            // $(document).ready(function() {
            //     calculateSubtotalSum();
            //     // $('.item_quantity').on('keyup', function() {

            //     //     calculateSubtotalSum();
            //     // }, );
            // });
        </script>

        <script src="{{ asset('frontend/assets/js/cart.js') }}"></script>
    @endpush
</x-front-layout>
