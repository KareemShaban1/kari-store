<!-- Start Header Area -->
<header class="header navbar-area">

    <!-- Start Topbar -->
    {{-- <div class="topbar">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-4 col-md-4 col-5">
                    <div class="top-left">
                        <ul class="menu-top-link">
                            <li class="btn-group mb-1">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                    style="background-color: #081828" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    @if (App::getLocale() == 'ar')
                                        {{ LaravelLocalization::getCurrentLocaleName() }}
                                        <img src="{{ URL::asset('backend/assets/images/flags/EG.png') }}"
                                            alt="">
                                    @else
                                        {{ LaravelLocalization::getCurrentLocaleName() }}
                                        <img src="{{ URL::asset('backend/assets/images/flags/US.png') }}"
                                            alt="">
                                    @endif
                                </button>
                                <div class="dropdown-menu">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>

                        </ul>

                        <ul style="display: flex; gap:20px">
                            @if (App::getLocale() == 'en')
                                <li>
                                    <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                                        <img src="{{ URL::asset('backend/assets/images/flags/EG.png') }}"
                                            alt="">
                                        <span class="mx-2 text-white "> عربى </span>

                                    </a>
                                </li>
                            @else
                                <li><a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                        <span class="mx-2 text-white">English</span> <img
                                            src="{{ URL::asset('backend/assets/images/flags/US.png') }}"
                                            alt="">
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 top-middle-bar">
                    <div class="top-middle">
                        <ul class="useful-links">
                            <li><a href="">
                                    {{ trans('front_home_trans.Home') }}
                                </a></li>
                            <li><a href="">
                                    {{ trans('front_home_trans.About_Us') }}
                                </a></li>
                            <li><a href="">
                                    {{ trans('front_home_trans.Contact_Us') }}
                                </a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-7">
                    <div class="top-end">
                        @auth('web')
                            <div class="user">
                                <i class="lni lni-user"></i>
                                <a href="{{ Route('profile.edit') }}">
                                    {{ Auth::user('user')->first_name }}
                                </a>
                            </div>
                            <div class="user">
                                <ul class="user-login">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout').submit()">
                                            Sign Out
                                        </a>
                                    </li>
                                </ul>

                                <form method="POST" action="{{ route('logout') }}" id="logout" style="display:none">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <ul class="user-login">
                                <li>
                                    <a href="{{ Route('login') }}">{{ trans('front_home_trans.Sign_In') }}</a>
                                </li>
                                <li>
                                    <a href="{{ Route('register') }}">{{ trans('front_home_trans.Register') }}</a>
                                </li>
                            </ul>
                        @endauth
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
    <!-- End Topbar -->


    <!-- Start Header Middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">

                {{-- <div class="d-lg-none d-md-none col-3">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar pages-nav" id="navbarSupportedContent1">
                            <ul id="nav" class="navbar-nav ms-auto">

                                @foreach ($categories->where('parent_id', null) as $category)
                                    <li class="nav-item" style="font-weight: bold">
                                        <a
                                            href="{{ route('shop_grid.index', $category->id) }}">{{ $category->name }}</a>
                                        @if ($category->children->isNotEmpty())
                                            <ul>
                                                @foreach ($category->children as $childCategory)
                                                    <li class="sub-nav-item">
                                                        <a
                                                            href="{{ route('shop_grid.index', $childCategory->id) }}">{{ $childCategory->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach

                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav>
                </div> --}}



                <div class="col-lg-3 col-md-3 col-8">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="{{ Route('home') }}">
                        <img src="{{ asset('frontend/assets/images/logo/logo.svg') }}" alt="Logo">
                    </a>
                    <!-- End Header Logo -->
                </div>

                <div class="col-lg-5 col-md-7 d-xs-none">
                    <!-- Start Main Menu Search -->
                    <div class="main-menu-search">
                        <!-- navbar search start -->
                        <div class="navbar-search search-style-5">

                            <div class="search-input">
                                <input type="text" id="search" placeholder="Search">
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
                        <!-- navbar search Ends -->
                    </div>
                    <!-- End Main Menu Search -->
                </div>

                <div class="col-lg-4 col-md-2 col-4">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <i class="lni lni-phone"></i>
                            <h3>{{ trans('front_home_trans.Hotline') }}
                                <span>(+100) 123 456 7890</span>
                            </h3>

                        </div>
                        <div class="navbar-cart">
                            {{-- <div class="wishlist">
                                <a href="javascript:void(0)">
                                    <i class="lni lni-heart"></i>
                                    <span class="total-items">0</span>
                                </a>
                            </div> --}}
                            <x-frontend.cart-menu>
                            </x-frontend.cart-menu>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->


    <!-- Start Header Bottom -->
    {{-- <div class="container header-bottom">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">


                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{ Route('home') }}"
                                        class="{{ request()->routeIs('home') ? 'nav-link active' : 'nav-link' }}"
                                        aria-label="Toggle navigation">{{ trans('front_home_trans.Home') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ Route('shop_grid.index') }}"
                                        class="{{ request()->routeIs('shop_grid.index') ? 'nav-link active' : 'nav-link' }}"
                                        aria-label="Toggle navigation">{{ trans('front_home_trans.Shop') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ Route('offers.index') }}"
                                        class="{{ request()->routeIs('offers.index') ? 'nav-link active' : 'nav-link' }}"
                                        aria-label="Toggle navigation">{{ trans('front_home_trans.Offers') }}</a>
                                </li>

                                <li class="nav-item"><a href="{{ Route('cart.index') }}"
                                        class="{{ request()->routeIs('cart.index') ? 'nav-link active' : 'nav-link' }}">{{ trans('front_home_trans.Cart') }}</a>
                                </li>

                                <li class="nav-item"><a href="{{ Route('checkout.create') }}"
                                        class="{{ request()->routeIs('checkout.create') ? 'nav-link active' : 'nav-link' }}">
                                        {{ trans('front_home_trans.Checkout') }}
                                    </a></li>


                                <li class="nav-item">
                                    <a href=""
                                        aria-label="Toggle navigation">{{ trans('front_home_trans.Contact_Us') }}</a>
                                </li>


                            </ul>

                        </div> <!-- navbar collapse -->
                    </nav>
                    <!-- End Navbar -->


                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Nav Social -->
                <div class="nav-social">
                    <h5 class="title">{{ trans('front_home_trans.Follow Us On') }} :</h5>
                    <ul>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav Social -->
            </div>
        </div>
    </div> --}}
    <!-- Start Header Bottom -->

    <nav class="custom-navbar container">
        <section class="custom-navbar-left">
            <a href="#" class="brand">Kari Store</a>
            <div class="burger" id="burger">
                <span class="burger-line"></span>
                <span class="burger-line"></span>
                <span class="burger-line"></span>
            </div>
        </section>
        <section class="custom-navbar-center">
            <span class="overlay"></span>
            <div class="menu" id="menu">
                <div class="menu-header">
                    <span class="menu-arrow"><i class="ion ion-ios-arrow-down m-1"></i></span>
                    <span class="menu-title"></span>
                </div>
                <ul class="menu-inner">

                    <li class="menu-item"><a href="{{ Route('home') }}"
                            class="menu-link">{{ trans('front_home_trans.Home') }}</a></li>

                    <li class="menu-item"><a href="{{ Route('shop_grid.index') }}"
                            class="menu-link">{{ trans('front_home_trans.Shop') }}</a></li>

                    <li class="menu-item"><a href="{{ Route('offers.index') }}"
                            class="menu-link">{{ trans('front_home_trans.Offers') }}</a></li>
                    <li class="menu-item menu-dropdown">
                        <span class="menu-link">{{ trans('front_home_trans.Categories') }}<i
                                class="ion ion-ios-arrow-down m-1"></i></span>
                        <div class="submenu megamenu megamenu-column-4">
                            @foreach ($categories->where('parent_id', null) as $category)
                                <div class="submenu-inner">
                                    <ul class="submenu-list">
                                        <li class="submenu-item" style="font-weight: bold">
                                            <h4 class="submenu-title"><a
                                                    href="{{ route('shop_grid.index', $category->id) }}">{{ $category->name }}</a>
                                            </h4>
                                            @if ($category->children->isNotEmpty())
                                                <ul class="submenu-list">
                                                    @foreach ($category->children as $childCategory)
                                                        <li class="submenu-item">
                                                            <a class="submenu-link"
                                                                href="{{ route('shop_grid.index', $childCategory->id) }}">{{ $childCategory->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>

                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </li>

                    <li class="menu-item menu-dropdown">
                        <span class="menu-link">New Arrival<i class="bx bx-chevron-right"></i></span>
                        <div class="submenu megamenu megamenu-column-4">
                            <div class="submenu-inner">
                                <a href="#" class="submenu-link">
                                    <img src="https://i.ibb.co/kgNX8ks/Product-2.jpg" class="submenu-image"
                                        alt="Product">
                                    <span class="submenu-title">Product Name</span>
                                </a>
                            </div>
                            <div class="submenu-inner">
                                <a href="#" class="submenu-link">
                                    <img src="https://i.ibb.co/ZTD2wF6/Product-3.jpg" class="submenu-image"
                                        alt="Product">
                                    <span class="submenu-title">Product Name</span>
                                </a>
                            </div>
                            <div class="submenu-inner">
                                <a href="#" class="submenu-link">
                                    <img src="https://i.ibb.co/prb0Vz9/Product-4.jpg" class="submenu-image"
                                        alt="Product">
                                    <span class="submenu-title">Product Name</span>
                                </a>
                            </div>
                            <div class="submenu-inner">
                                <a href="#" class="submenu-link">
                                    <img src="https://i.ibb.co/zPJm9jy/Product-5.jpg" class="submenu-image"
                                        alt="Product">
                                    <span class="submenu-title">Product Name</span>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="menu-item menu-dropdown">
                        <span class="menu-link">Account<i class="bx bx-chevron-right"></i></span>
                        <div class="submenu megamenu megamenu-column-1">
                            <ul class="submenu-list">
                                <li class="submenu-item"><a href="#" class="submenu-link">Login</a></li>
                                <li class="submenu-item"><a href="#" class="submenu-link">Register</a></li>
                                <li class="submenu-item"><a href="#" class="submenu-link">Track Order</a></li>
                                <li class="submenu-item"><a href="#" class="submenu-link">Help</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item"><a href="#" class="menu-link">Support</a></li>
                </ul>
            </div>
        </section>
        <section class="custom-navbar-right">

            <ul style="display: flex; gap:20px">
                @if (App::getLocale() == 'en')
                    {{-- {{ LaravelLocalization::getCurrentLocaleName() }} --}}
                    <li>
                        <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                            <img src="{{ URL::asset('backend/assets/images/flags/EG.png') }}" alt="">
                            <span class="mx-2 "> عربى </span>

                        </a>
                    </li>
                @else
                    {{-- {{ LaravelLocalization::getCurrentLocaleName() }} --}}
                    <li><a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                            <span class="mx-2">English</span> <img
                                src="{{ URL::asset('backend/assets/images/flags/US.png') }}" alt="">
                        </a>
                    </li>
                @endif
                {{-- <li>عربى</li>
                <li>english</li> --}}
            </ul>

        </section>
    </nav>


</header>
<!-- End Header Area -->
