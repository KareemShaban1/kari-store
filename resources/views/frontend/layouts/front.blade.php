<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.svg') }}" />

    @include('frontend.layouts.head')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">




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
        const csrf_token = "{{ csrf_token() }}";
    </script>

    <script src="{{ asset('frontend/assets/js/cart.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (session('toast_error'))
            toastr.error("{{ session('toast_error') }}", "", {
                "timeOut": 1000
            }); // Set timeOut to 1000 milliseconds (1 second)
        @endif
    </script>

    @stack('scripts')

</body>

</html>
