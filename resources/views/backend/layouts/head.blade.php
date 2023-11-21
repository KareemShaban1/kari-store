<!-- Title -->
<title>@yield('title')</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('backend/assets/images/favicon.ico') }}" type="image/x-icon" />


{{-- Datatables --}}
<link href="{{ URL::asset('backend/assets/datatables/datatables.min.css') }}" rel="stylesheet">

<link href="{{ URL::asset('backend/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">


<link href="{{ URL::asset('backend/assets/css/summernote-lite.min.css') }}" rel="stylesheet">


{{-- <link href="{{asset('backend/assets/css/fontawesone_all.min.css')}}" rel="stylesheet"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

<!-- Font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">


<!--- Style css -->
@if (App::getLocale() == 'en')
    <link href="{{ URL::asset('backend/assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('backend/assets/css/rtl.css') }}" rel="stylesheet">
@endif

<!--- Style css -->
<link href="{{ URL::asset('backend/assets/css/style.css') }}" rel="stylesheet">

@stack('style')
