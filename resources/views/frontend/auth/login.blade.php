<x-front-layout>


    <x-slot name="breadcrumbs">

        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">{{ trans('frontend/auth_trans.Login') }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ Route('home') }}"><i class="lni lni-home"></i>
                                    {{ trans('frontend/auth_trans.Home') }}</a></li>
                            <li>{{ trans('frontend/auth_trans.Login') }}</li>
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
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10  col-12">

                    {{-- <x-backend.alert /> --}}

                    <form class="card login-form" action="{{ Route('login') }}" method="post">
                        @csrf
                        <div class="card-body">

                            <div class="title">
                                <h3>{{ trans('frontend/auth_trans.Login_Now') }}</h3>
                                {{-- <p>You can login using your social media account or email address.</p> --}}
                            </div>
                            {{-- <div class="social-login">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12"><a class="btn facebook-btn"
                                            href="javascript:void(0)"><i class="lni lni-facebook-filled"></i> Facebook
                                            login</a></div>
                                    <div class="col-lg-4 col-md-4 col-12"><a class="btn twitter-btn"
                                            href="javascript:void(0)"><i class="lni lni-twitter-original"></i> Twitter
                                            login</a></div>
                                    <div class="col-lg-4 col-md-4 col-12"><a class="btn google-btn"
                                            href="javascript:void(0)"><i class="lni lni-google"></i> Google login</a>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="alt-option">
                                <span>Or</span>
                            </div> --}}
                            {{-- @if ($errors->has(config('fortify.username')))
                                <div class="alert alert-danger">
                                    {{ $errors->first(config('fortify.username')) }}
                                </div>
                            @endif --}}
                            <div class="form-group input-group">
                                <label for="reg-fn">{{ trans('frontend/auth_trans.Email_Address') }}</label>
                                <input class="form-control" name="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">{{ trans('frontend/auth_trans.Password') }}</label>
                                <input class="form-control" type="password" name="password" id="reg-pass">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex flex-wrap justify-content-between bottom-content">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" value="1" id="remember_me"
                                        class="form-check-input width-auto">
                                    <label
                                        class="form-check-label">{{ trans('frontend/auth_trans.Remember_Me') }}</label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="lost-pass"
                                        href="{{ Route('password.request') }}">{{ trans('frontend/auth_trans.Forgot_Password') }}</a>
                                @endif

                            </div>
                            <div class="button">
                                <button class="btn" type="submit">
                                    {{ trans('frontend/auth_trans.Login') }}</button>
                            </div>
                            @if (Route::has('register'))
                                <p class="outer-link">{{ trans('frontend/auth_trans.Already have an account?') }} <a
                                        href="{{ Route('register') }}">
                                        {{ trans('frontend/auth_trans.Register') }}
                                    </a>
                                </p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->


</x-front-layout>
