<x-front-layout>


    <x-slot name="breadcrumbs">


        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Login</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ Route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    </x-slot>

    <!-- Start Account Login Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    @php
                        $phone = Session::get('phone');
                        
                        
                    @endphp
                    <form class="card login-form" action="{{ Route('custom_verification') }}" method="post">
                        
                              @csrf

                        <div class="card-body">

                            <div class="title">
                                <h3>Verify Now</h3>
                                <p> Please enter the OTP sent to your number: {{ $phone }}</p>
                            </div>


                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="verification_code"
                                    class="col-md-4 col-form-label text-md-right">Verification code</label>
                                <div class="col-md-6">
                                    <input type="hidden" name="phone_number" value="{{ $phone }}">
                                    <input id="verification_code" type="tel"
                                        class="form-control @error('verification_code') is-invalid @enderror"
                                        name="verification_code" value="{{ old('verification_code') }}" required>
                                    @error('verification_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="button">
                            <button class="btn" type="submit">Verify</button>
                        </div>

                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- End Account Login Area -->


</x-front-layout>
