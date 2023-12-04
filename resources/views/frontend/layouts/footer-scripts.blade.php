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


    @stack('scripts')
