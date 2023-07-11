
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ URL::asset('backend/assets/js/plugins-jquery.js') }}"></script>
<script>
        var plugin_path = '{{ asset('backend/assets/js/') }}';
</script>

@yield('js')

<!-- datepicker -->
<script src="{{ URL::asset('backend/assets/js/datepicker.js') }}"></script>

<!-- sweetalert2 -->
{{-- <script src="{{ URL::asset('backend/assets/js/sweetalert2.js') }}"></script> --}}

<!-- toastr -->
<script src="{{ URL::asset('backend/assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('backend/assets/js/validation.js') }}"></script>

<!-- custom -->
<script src="{{ URL::asset('backend/assets/js/custom.js') }}"></script>

{{-- Datatables --}}
<script src="{{ URL::asset('backend/assets/datatables/datatables.min.js') }}"></script>

<script src="{{ URL::asset('backend/assets/js/summernote-lite.min.js') }}"></script>

<script>

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

    
</script>



