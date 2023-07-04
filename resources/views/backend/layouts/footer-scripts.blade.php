
@yield('js')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <!-- plugins-jquery -->
<script src="{{ URL::asset('backend/assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script>
        var plugin_path = '{{ asset('backend/assets/js/') }}';
</script>


<!-- datepicker -->
<script src="{{ URL::asset('backend/assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('backend/assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->

<script src="{{ URL::asset('backend/assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('backend/assets/js/validation.js') }}"></script>

<!-- custom -->
<script src="{{ URL::asset('backend/assets/js/custom.js') }}"></script>

{{-- Datatables --}}
<script src="{{ URL::asset('backend/assets/datatables/datatables.min.js') }}"></script>

<script src="{{ URL::asset('backend/assets/js/0.8.18_dist_summernote-lite.min.js') }}"></script>

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



