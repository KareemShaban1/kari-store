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
                            <li><a href="{{ Route('home') }}"><i class="lni lni-home"></i>
                                    {{ trans('checkout_trans.Home') }}</a></li>
                            <li><a href=""> {{ trans('checkout_trans.Shop') }}</a></li>
                            <li> {{ trans('checkout_trans.Cart') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    </x-slot>


    <x-frontend.alert type="error" />

    <x-frontend.alert type="success" />


    <!--====== Checkout Form Steps Part Start ======-->

    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <form action="{{ Route('checkout.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="shipping_fees" value="{{ $shipping_fees }}">
                        <div class="checkout-steps-form-style-1">
                            <ul id="accordionExample">
                                <li>
                                    <h6 class="title" data-bs-toggle="collapse" data-bs-target="#billingAddress"
                                        aria-expanded="true" aria-controls="billingAddress">
                                        {{ trans('checkout_trans.Your_Personal_Details') }} </h6>


                                    <section class="checkout-steps-form-content collapse show" id="billingAddress"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    {{-- <label>User Name</label> --}}


                                                    <div class="row">
                                                        <div class="col-md-6 form-input form">
                                                            <label
                                                                for="">{{ trans('checkout_trans.First_Name') }}</label>
                                                            <x-frontend.form.input name="address[billing][first_name]"
                                                                value="{{ Auth::check() ? Auth::user()->first_name : old('address.billing.first_name') }}" />
                                                        </div>
                                                        <div class="col-md-6 form-input form">
                                                            <label
                                                                for="">{{ trans('checkout_trans.Last_Name') }}</label>
                                                            <x-frontend.form.input name="address[billing][last_name]"
                                                                value="{{ Auth::check() ? Auth::user()->last_name : old('address.billing.last_name') }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <label
                                                            for="">{{ trans('checkout_trans.Email') }}</label>
                                                        <x-frontend.form.input name="address[billing][email]"
                                                            value="{{ Auth::check() ? Auth::user()->email_address : old('address.billing.email') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <label
                                                            for="">{{ trans('checkout_trans.Phone_Number') }}</label>

                                                        <x-frontend.form.input name="address[billing][phone_number]"
                                                            value="{{ Auth::check() ? Auth::user()->phone_number : old('address.billing.phone_number') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-group">

                                                    </div>
                                                    <div class="form-input form">
                                                        <label
                                                            for="">{{ trans('checkout_trans.Governorate') }}</label>
                                                        {{-- <x-frontend.form.input name="address[billing][governorate]"
                                                            value="{{ Auth::check() ? Auth::user()->governorate->name : old('address.billing.governorate') }}" /> --}}
                                                        <select name="address[billing][governorate_id]" id=""
                                                            class="form-control custom-select mr-sm-2">
                                                            <option disabled selected>
                                                                {{ trans('auth_trans.Choose_Governorate') }}
                                                            </option>
                                                            @foreach ($destinations as $destination)
                                                                @if ($destination->rank == '1')
                                                                    <option value="{{ $destination->id }}"
                                                                        @if (Auth::check()) {{ Auth::user()->governorate->id == $destination->id ? 'selected' : '' }}
                                                                        @else
                                                                            {{ old('address.billing.governorate_id') == $destination->id ? 'selected' : '' }} @endif>
                                                                        {{ $destination->name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <label
                                                            for="">{{ trans('checkout_trans.City') }}</label>
                                                        {{-- <x-frontend.form.input name="address[billing][city]"
                                                            value="{{ Auth::check() ? Auth::user()->city->name : old('address.billing.city') }}" /> --}}

                                                        <select name="address[billing][city_id]" id=""
                                                            class="custom-select mr-sm-2">
                                                            <option disabled selected>
                                                                {{ trans('auth_trans.Choose_City') }}
                                                            </option>
                                                            @foreach ($destinations as $destination)
                                                                @if ($destination->rank == '2')
                                                                    <option value="{{ $destination->id }}"
                                                                        @if (Auth::check()) {{ Auth::user()->city->id == $destination->id ? 'selected' : '' }}
                                                                        @else
                                                                            {{ old('address.billing.city_id') == $destination->id ? 'selected' : '' }} @endif>
                                                                        {{ $destination->name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <label
                                                            for="">{{ trans('checkout_trans.Neighborhood') }}</label>
                                                        {{-- <x-frontend.form.input name="address[billing][neighborhood]"
                                                            value="{{ Auth::check() ? Auth::user()->neighborhood->name : old('address.billing.neighborhood') }}" /> --}}
                                                        <select name="address[billing][neighborhood_id]" id=""
                                                            class="custom-select mr-sm-2">
                                                            <option disabled selected>
                                                                {{ trans('auth_trans.Choose_Neighborhood') }}
                                                            </option>
                                                            @foreach ($destinations as $destination)
                                                                @if ($destination->rank == '3')
                                                                    <option value="{{ $destination->id }}"
                                                                        @if (Auth::check()) {{ Auth::user()->neighborhood->id == $destination->id ? 'selected' : '' }}
                                                                        @else
                                                                            {{ old('address.billing.neighborhood_id') == $destination->id ? 'selected' : '' }} @endif>
                                                                        {{ $destination->name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <label
                                                            for="">{{ trans('checkout_trans.Postal_Code') }}</label>
                                                        <x-frontend.form.input name="address[billing][postal_code]"
                                                            value="{{ Auth::check() ? Auth::user()->postal_code : old('address.billing.postal_code') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label
                                                        for="">{{ trans('checkout_trans.Street_Address') }}</label>
                                                    <div class="form-input form">
                                                        <x-frontend.form.input name="address[billing][street_address]"
                                                            value="{{ Auth::check() ? Auth::user()->street_address : old('address.billing.street_address') }}" />
                                                    </div>
                                                </div>
                                            </div>






                                            {{-- <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button class="btn" data-bs-toggle="collapse"
                                                        data-bs-target="#shippingAddress" aria-expanded="false"
                                                        aria-controls="shippingAddress">next
                                                        step</button>
                                                </div>
                                            </div> --}}



                                        </div>
                                    </section>

                                    <div class="col-md-12 bg-white p-2 mt-2">
                                        <div class="single-checkbox checkbox-style-3">
                                            <input type="checkbox" id="checkbox-3">
                                            <label for="checkbox-3"><span></span></label>
                                            <p>My delivery and mailing addresses are the same.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <h6 class="title collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#shippingAddress" aria-expanded="false"
                                        aria-controls="shippingAddress">
                                        {{ trans('checkout_trans.Shipping_Information') }}
                                    </h6>
                                    <section class="checkout-steps-form-content collapse" id="shippingAddress"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <div class="row">
                                                        <div class="col-md-6 form-input form">
                                                            <label
                                                                for="">{{ trans('checkout_trans.First_Name') }}</label>
                                                            <x-frontend.form.input
                                                                name="address[shipping][first_name]" />
                                                        </div>
                                                        <div class="col-md-6 form-input form">
                                                            <label
                                                                for="">{{ trans('checkout_trans.Last_Name') }}</label>
                                                            <x-frontend.form.input
                                                                name="address[shipping][last_name]" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <label
                                                            for="">{{ trans('checkout_trans.Email') }}</label>
                                                        <x-frontend.form.input name="address[shipping][email]" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <label
                                                            for="">{{ trans('checkout_trans.Phone_Number') }}</label>
                                                        <x-frontend.form.input
                                                            name="address[shipping][phone_number]" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <label
                                                            for="">{{ trans('checkout_trans.Governorate') }}</label>
                                                        {{-- <x-frontend.form.input name="address[shipping][governorate]" /> --}}
                                                        <select name="address[shipping][governorate_id]"
                                                            id="" class="custom-select mr-sm-2">
                                                            <option disabled selected>
                                                                {{ trans('auth_trans.Choose_Governorate') }}
                                                            </option>
                                                            @foreach ($destinations as $destination)
                                                                @if ($destination->rank == '1')
                                                                    <option value="{{ $destination->id }}"
                                                                        @if (Auth::check()) {{ Auth::user()->governorate->id == $destination->id ? 'selected' : '' }}
                                                                    @else
                                                                        {{ old('address.shipping.governorate_id') == $destination->id ? 'selected' : '' }} @endif>
                                                                        {{ $destination->name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <label
                                                            for="">{{ trans('checkout_trans.City') }}</label>
                                                        {{-- <x-frontend.form.input name="address[shipping][city]" /> --}}
                                                        <select name="address[shipping][city_id]" id=""
                                                            class="custom-select mr-sm-2 ">
                                                            <option disabled selected>
                                                                {{ trans('auth_trans.Choose_City') }}
                                                            </option>
                                                            @foreach ($destinations as $destination)
                                                                @if ($destination->rank == '2')
                                                                    <option value="{{ $destination->id }}"
                                                                        @if (Auth::check()) {{ Auth::user()->city->id == $destination->id ? 'selected' : '' }}
                                                                    @else
                                                                        {{ old('address.shipping.city_id') == $destination->id ? 'selected' : '' }} @endif>
                                                                        {{ $destination->name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <label
                                                            for="">{{ trans('checkout_trans.Neighborhood') }}</label>
                                                        {{-- <x-frontend.form.input
                                                            name="address[shipping][neighborhood]" /> --}}
                                                        <select name="address[shipping][neighborhood_id]"
                                                            id="" class="custom-select mr-sm-2">
                                                            <option disabled selected>
                                                                {{ trans('auth_trans.Choose_Neighborhood') }}
                                                            </option>
                                                            @foreach ($destinations as $destination)
                                                                @if ($destination->rank == '3')
                                                                    <option value="{{ $destination->id }}"
                                                                        @if (Auth::check()) {{ Auth::user()->neighborhood->id == $destination->id ? 'selected' : '' }}
                                                                        @else
                                                                            {{ old('address.shipping.neighborhood_id') == $destination->id ? 'selected' : '' }} @endif>
                                                                        {{ $destination->name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <label
                                                            for="">{{ trans('checkout_trans.Postal_Code') }}</label>
                                                        <x-frontend.form.input name="address[shipping][postal_code]" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <label
                                                            for="">{{ trans('checkout_trans.Street_Address') }}</label>
                                                        <x-frontend.form.input
                                                            name="address[shipping][street_address]" />
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </section>
                                </li>
                                {{-- <li>
                                    <h6 class="title collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapsefive" aria-expanded="false"
                                        aria-controls="collapsefive">Payment Info</h6>
                                    <section class="checkout-steps-form-content collapse" id="collapsefive"
                                        aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="checkout-payment-form">
                                                    <div class="single-form form-default">
                                                        <label>Cardholder Name</label>
                                                        <div class="form-input form">
                                                            <input type="text" placeholder="Cardholder Name">
                                                        </div>
                                                    </div>
                                                    <div class="single-form form-default">
                                                        <label>Card Number</label>
                                                        <div class="form-input form">
                                                            <input id="credit-input" type="text"
                                                                placeholder="0000 0000 0000 0000">
                                                            <img src="assets/images/payment/card.png" alt="card">
                                                        </div>
                                                    </div>
                                                    <div class="payment-card-info">
                                                        <div class="single-form form-default mm-yy">
                                                            <label>Expiration</label>
                                                            <div class="expiration d-flex">
                                                                <div class="form-input form">
                                                                    <input type="text" placeholder="MM">
                                                                </div>
                                                                <div class="form-input form">
                                                                    <input type="text" placeholder="YYYY">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-form form-default">
                                                            <label>CVC/CVV <span><i
                                                                        class="mdi mdi-alert-circle"></i></span></label>
                                                            <div class="form-input form">
                                                                <input type="text" placeholder="***">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-form form-default button">
                                                        <button type="submit" class="btn">pay now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li> --}}

                                <div class="single-form form-default button">
                                    <button type="submit"
                                        class="btn">{{ trans('checkout_trans.Submit') }}</button>
                                </div>
                            </ul>
                        </div>

                    </form>


                </div>





                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        {{-- <div class="checkout-sidebar-coupon">
                            <p>Appy Coupon to get discount!</p>
                            <form action="{{ route('checkout.applyCoupon') }}" method="POST">
                                @csrf
                                <div class="single-form form-default">
                                    <div class="form-input form">
                                        <input type="text" name="coupon_code" placeholder="Enter coupon code">
                                    </div>
                                    <div class="button">
                                        <button class="btn">apply</button>
                                    </div>
                                </div>
                            </form>

                            <form action="{{ route('checkout.removeCoupon') }}" method="POST">
                                @csrf
                                <button type="submit">Remove Coupon</button>
                            </form>
                         
                        </div> --}}



                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">Pricing Table</h5>

                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">{{ Currency::format($cart->total()) }}</p>
                                </div>

                                <div class="total-price shipping">
                                    <p class="value">Shipping:</p>
                                    <p class="price"> {{ Currency::format($shipping_fees) }}</p>
                                </div>
                                <div class="total-price discount">
                                    <p class="value">Coupon:</p>
                                    <p class="price">
                                        <?php
                                        // get coupon stored in session , if it exist
                                        $coupon = Session::get('coupon');
                                        if ($coupon) {
                                            echo $coupon->discount_amount;
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Total Price:</p>
                                    <p class="price">{{ Currency::format($shipping_fees + $cart->total()) }}</p>
                                </div>
                            </div>
                            {{-- <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div> --}}
                        </div>


                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="https://via.placeholder.com/400x330" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Checkout Form Steps Part Ends ======-->


    @push('scripts')
        <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>


        <script>
            $(document).ready(function() {
                // Get the checkbox and form fields
                var checkbox = $('#checkbox-3');
                var billingFields = $('section#billingAddress :input');
                var shippingFields = $('section#shippingAddress :input');

                // Add event listener to the checkbox
                checkbox.on('change', function() {
                    console.log(billingFields, shippingFields);
                    // Check if the checkbox is checked
                    if (checkbox.prop('checked')) {
                        // Copy values from billing fields to shipping fields
                        billingFields.each(function(index) {
                            shippingFields.eq(index).val($(this).val());
                        });
                    }
                });
            });
        </script>
    @endpush

</x-front-layout>
