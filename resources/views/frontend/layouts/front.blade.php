<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.svg') }}" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/glightbox.min.css') }}" />


    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}" />
    @else
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/rtl.css') }}" />
    @endif



    @stack('styles')

</head>

<body>


    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">

        <!-- Start Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left">
                            <ul class="menu-top-link">
                                {{-- <li> --}}
                                {{-- <ul>
                                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <li>
                                                <a rel="alternate" hreflang="{{ $localeCode }}"
                                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    {{ $properties['native'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul> --}}

                                <div class="btn-group mb-1">
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
                                </div>

                                {{-- </li> --}}
                            </ul>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-4 col-12">
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

                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            @auth('web')
                                <div class="user">
                                    <i class="lni lni-user"></i>
                                    {{-- {{ Auth::guard('web')->user()->first_name }} --}}
                                    <a href="{{ Route('profile.edit') }}">
                                        {{ Auth::user('user')->first_name }}
                                    </a>
                                </div>
                                <div class="user">
                                    <ul class="user-login">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();document.getElementById('logout').submit()">
                                                {{-- <i class="text-danger ti-unlock"></i> --}}
                                                Sign Out
                                            </a>
                                        </li>
                                    </ul>

                                    <form method="POST" action="{{ route('logout') }}" id="logout"
                                        style="display:none">
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
        </div>
        <!-- End Topbar -->


        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-3 col-md-3 col-7">
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
                                    <input type="text" placeholder="Search">
                                </div>
                                <div class="search-btn">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>

                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <h3>{{ trans('front_home_trans.Hotline') }}
                                    <span>(+100) 123 456 7890</span>
                                </h3>

                            </div>
                            <div class="navbar-cart">
                                <div class="wishlist">
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div>
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
        <div class="container header-bottom">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">

                        <!-- Start Mega Category Menu -->
                        <div class="mega-category-menu">
                            <span class="cat-button">
                                <i class="lni lni-menu"></i> {{ trans('front_home_trans.All_Categories') }}
                            </span>
                            <ul class="sub-category">
                                @foreach ($categories as $category)
                                    {{-- Check if the category has parent --}}
                                    @if ($category->parent_id === null)
                                        {{-- Parent Category --}}
                                        <li>
                                            <a
                                                href="{{ route('shop_grid.index', $category->id) }}">{{ $category->name }}</a>
                                            <ul class="inner-sub-category">
                                                {{-- Find child categories --}}
                                                @foreach ($categories as $childCategory)
                                                    @if ($childCategory->parent_id === $category->id)
                                                        <li><a
                                                                href="{{ route('shop_grid.index', $childCategory->id) }}">{{ $childCategory->name }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Mega Category Menu -->



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
                                        <a href="{{ Route('home') }}" class="nav-link active"
                                            aria-label="Toggle navigation">{{ trans('front_home_trans.Home') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ Route('shop_grid.index') }}" class="nav-link"
                                            aria-label="Toggle navigation">{{ trans('front_home_trans.Shop') }}</a>
                                    </li>

                                    <li class="nav-item"><a
                                            href="{{ Route('cart.index') }}">{{ trans('front_home_trans.Cart') }}</a>
                                    </li>

                                    <li class="nav-item"><a href="{{ Route('checkout.create') }}">
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
                        <h5 class="title">{{ trans('home_trans.Follow Us On') }} :</h5>
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
        </div>
        <!-- Start Header Bottom -->


    </header>
    <!-- End Header Area -->









    <!-- Start Breadcrumbs -->
    {{ $breadcrumbs ?? '' }}
    <!-- End Breadcrumbs -->



    {{ $slot }}


    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="footer-logo">
                                <a href="index.html">
                                    <img src="{{ asset('frontend/assets/images/logo/white-logo.svg') }}"
                                        alt="#">
                                </a>
                            </div>
                        </div>
                        {{-- <div class="col-lg-9 col-md-8 col-12">
                            <div class="footer-newsletter">
                                <h4 class="title">
                                    Subscribe to our Newsletter
                                    <span>Get all the latest information, Sales and Offers.</span>
                                </h4>
                                <div class="newsletter-form-head">
                                    <form action="#" method="get" target="_blank" class="newsletter-form">
                                        <input name="EMAIL" placeholder="Email address here..." type="email">
                                        <div class="button">
                                            <button class="btn">Subscribe<span class="dir-part"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->


        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3>{{ trans('home_trans.Get In Touch With Us') }}</h3>
                                <p class="phone">{{ trans('home_trans.Phone') }}: 0111111111</p>
                                {{-- <ul>
                                    <li><span>Monday-Friday: </span> 9.00 am - 8.00 pm</li>
                                    <li><span>Saturday: </span> 10.00 am - 6.00 pm</li>
                                </ul> --}}
                                <p class="mail">
                                    <a href="mailto:support@shopgrids.com">
                                        {{ trans('home_trans.Technical Support') }} support@shopgrids.com</a>
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer our-app">
                                <h3>Our Mobile App</h3>
                                <ul class="app-btn">
                                    <li>
                                        Coming Soon
                                    </li>
                                    {{-- <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-apple"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">App Store</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-play-store"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">Google Play</span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>

                        {{-- <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Information</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">About Us</a></li>
                                    <li><a href="javascript:void(0)">Contact Us</a></li>
                                    <li><a href="javascript:void(0)">Downloads</a></li>
                                    <li><a href="javascript:void(0)">Sitemap</a></li>
                                    <li><a href="javascript:void(0)">FAQs Page</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div> --}}

                        {{-- <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Shop Departments</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">Computers & Accessories</a></li>
                                    <li><a href="javascript:void(0)">Smartphones & Tablets</a></li>
                                    <li><a href="javascript:void(0)">TV, Video & Audio</a></li>
                                    <li><a href="javascript:void(0)">Cameras, Photo & Video</a></li>
                                    <li><a href="javascript:void(0)">Headphones</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">
                            <div class="payment-gateway">
                                <span>We Accept:</span>
                                <img src="{{ asset('frontend/assets/images/footer/credit-cards-footer.png') }}"
                                    alt="#">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            {{-- <div class="copyright">
                                <p>Designed and Developed by<a href="https://graygrids.com/" rel="nofollow"
                                        target="_blank">GrayGrids</a></p>
                            </div> --}}
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span>{{ trans('home_trans.Follow Us On:') }}</span>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>


    <script src="{{ URL::asset('backend/assets/js/plugins-jquery.js') }}"></script>

    {{-- <script>
        $('#summernote').summernote({
            placeholder: 'Hello ..!',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'video']],
                ['view', ['codeview', 'help']]
            ]
        });
    </script> --}}

    {{-- <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script> --}}

    <script>
        const navLinks = document.querySelectorAll('.nav-item a');

        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                // Remove active class from all links
                navLinks.forEach(link => link.classList.remove('active'));

                // Add active class to the clicked link
                this.classList.add('active');
            });
        });
    </script>



    @stack('scripts')

</body>

</html>
