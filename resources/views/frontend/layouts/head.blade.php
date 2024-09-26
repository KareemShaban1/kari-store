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

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

 <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}" />

 <link rel="stylesheet" type="text/css"
     href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.6.3/css/ionicons.min.css">

 <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom1.css') }}" />



 @stack('styles')
