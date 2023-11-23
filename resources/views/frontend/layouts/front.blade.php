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
    {{-- <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }} " /> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/glightbox.min.css') }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}" />
    @else
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/rtl.css') }}" />
    @endif

    {{-- <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}" /> --}}

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}" />





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




    @include('frontend.layouts.header')





    <!-- Start Breadcrumbs -->
    {{ $breadcrumbs ?? '' }}
    <!-- End Breadcrumbs -->



    {{ $slot }}


    @include('frontend.layouts.footer')

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}


    <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>


    {{-- <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('frontend/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    


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

        const csrf_token = "{{ csrf_token() }}";
    </script>

    <script src="{{ asset('frontend/assets/js/cart.js') }}"></script>


    @stack('scripts')

</body>

</html>
