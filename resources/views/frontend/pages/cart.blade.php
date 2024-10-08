<x-front-layout>
    @push('styles')
        <style>
            .empty-cart-container {
                text-align: center;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .empty-cart-icon {
                font-size: 48px;
                color: #d3d3d3;
                margin-bottom: 20px;
            }

            .empty-cart-message {
                font-size: 18px;
                color: #333;
                margin-bottom: 20px;
            }

            .go-shopping-button {
                background-color: #4caf50;
                color: #fff;
                padding: 10px 20px;
                font-size: 16px;
                text-decoration: none;
                border-radius: 4px;
                transition: background-color 0.3s;
            }

            .go-shopping-button:hover {
                background-color: #45a049;
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
                        <div class="col-lg-2 col-md-1 d-none d-sm-block p-0">
                            Product Image
                        </div>
                        <div class="col-lg-3 col-md-3 col-2 p-0">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-2 p-0">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-3 p-0">
                            <p>Price</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-3 p-0">
                            <p>Discount</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-2 p-0">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                <!-- End Cart List Title -->

                @forelse($cart->get() as $cart_item)
                    <!-- Cart Item (product) -->
                    <div class="cart-single-list" id="{{ $cart_item->id }}">
                        <div class="row align-items-center">

                            <div class="col-lg-1 col-md-1 d-none d-sm-block">
                                <a
                                    href="{{ Route('products.show_product', [$cart_item->product->id, $cart_item->product->slug]) }}">
                                    <img src="{{ $cart_item->product->image_url }}" alt="#">
                                </a>
                            </div>

                            <div class="col-lg-4 col-md-3 col-2">
                                <h5 class="product-name"><a
                                        href="{{ Route('products.show_product', [$cart_item->product->id, $cart_item->product->slug]) }}">
                                        {{ $cart_item->product->name }}</a></h5>
                                
                            </div>
                            <div class="col-lg-2 col-md-2 col-2">


                                <div class="count-input">
                                    <button class="quantity-btn minus btn-minus" data-id="{{ $cart_item->id }}"
                                        data-product-id="{{ $cart_item->product->id }}">-</button>
                                    <span class="quantity">{{ $cart_item->quantity }}</span>
                                    <button class="quantity-btn plus btn-plus" data-id="{{ $cart_item->id }}"
                                        data-product-id="{{ $cart_item->product->id }}">+</button>
                                </div>

                            </div>

                            <div class="col-lg-2 col-md-2 col-3" id="sub_total_{{ $cart_item->product->id }}">
                                <p id="sub_total_amount_{{ $cart_item->product->id }}">
                                    {{ Currency::format($cart_item->quantity * $cart_item->product->price) }}</p>
                            </div>

                            <div class="col-lg-2 col-md-2 col-3">
                                <p>{{ Currency::format(0) }}</p>
                            </div>

                            <div class="col-lg-1 col-md-2 col-2">
                                <a class="remove-item" data-id="{{ $cart_item->id }}" href="javascript:void(0)"><i
                                        class="lni lni-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List list -->
                @empty
                    <div class="empty-cart-container">
                        <div class="empty-cart-icon">🛒</div>
                        <div class="empty-cart-message">Your cart is empty!</div>
                        <a href="" class="go-shopping-button">Go Shopping</a>
                    </div>
                @endforelse

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
                                                $neighborhood_shipping = $user->neighborhood->price;
                                                $shipping_fees = 0;
                                                $storeIds = [];

                                                foreach ($cart->get() as $cart_item) {
                                                    $store_id = $cart_item->product->store_id;

                                                    if (!in_array($store_id, $storeIds)) {
                                                        // If the store ID is not in the array, it's a unique store
                                                        $storeIds[] = $store_id;

                                                        if (count($storeIds) === 1) {
                                                            $shipping_fees += $neighborhood_shipping;
                                                        } else {
                                                            $shipping_fees += 0.5 * $neighborhood_shipping;
                                                        }
                                                    }
                                                }

                                                // Now, $shipping_fees contains the total shipping fees based on the unique stores in the cart.

                                                $numberOfUniqueStores = count($storeIds);

                                            @endphp


                                            <span class="shipping">
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
        {{-- <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script> --}}

        <script>
            // calculate sub total based on products in the cart
            function calculateSubtotalSum() {
                var subtotalSum = 0;
                $('.cart-single-list').each(function() {
                    var subtotalText = $(this).find('.col-lg-2.col-md-2.col-3 p').text();
                    var subtotalValue = parseFloat(subtotalText.replace(/[^0-9.-]+/g, ''));
                    subtotalSum += subtotalValue;
                    console.log(subtotalText, subtotalValue, subtotalSum);

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

            // calculate all total based on shipping + products in the cart
            function calculateAlltotalSum() {
                var AlltotalSum = 0;
                // Get the shipping value from the <span> element
                var shippingText = $('.shipping').text();
                var shipping = parseFloat(shippingText.replace(/[^0-9.-]+/g, ''));

                $('.cart-single-list').each(function() {
                    var alltotalText = $(this).find('.col-lg-2.col-md-2.col-3 p').text();
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

                // minus button functionality 
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

                // plus button functionality
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
        </script>
    @endpush
</x-front-layout>
