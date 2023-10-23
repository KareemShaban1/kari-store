<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- <script src="{{ URL::asset('backend/assets/js/jquery-3.3.1.min.js') }}"></script> --}}


<script src="{{ URL::asset('backend/assets/js/plugins-jquery.js') }}"></script>
<script>
    var plugin_path = '{{ asset('backend/assets/js/') }}';
</script>



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
{{-- <script src="{{ URL::asset('backend/assets/datatables/datatables.min.js') }}"></script> --}}

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

@if (request()->routeIs('admin.brands.index') ||
        request()->routeIs('admin.categories.index') ||
        request()->routeIs('admin.stores.index') ||
        request()->routeIs('admin.vendors.index') ||
        request()->routeIs('admin.products.index') ||
        request()->routeIs('admin.product_variants.index') ||
        request()->routeIs('admin.orders.index') ||
        request()->routeIs('admin.deliveries.index') ||
        request()->routeIs('admin.product_properties.index') ||
        request()->routeIs('admin.attributes.index') ||
        request()->routeIs('admin.attribute_values.index') ||
        request()->routeIs('admin.coupons.index') ||
        request()->routeIs('admin.roles.index') ||
        request()->routeIs('admin.admins.index') ||
        request()->routeIs('admin.reports.orders'))
    <script src="{{ asset('backend/assets/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/assets/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/datatables/export-tables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/assets/datatables/export-tables/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/datatables/export-tables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/datatables/export-tables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/datatables/export-tables/buttons.print.min.js') }}"></script>

    {{-- <script>
        $(document).ready(function() {
            $('#custom_table').DataTable({
                stateSave: true,
                sortable: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'print'
                ]
            });
        });
    </script> --}}


    {{-- @if (App::getLocale() == 'ar')
        <script>
            $(document).ready(function() {

                var datatable = $('#custom_table').DataTable({
                    stateSave: true,
                    sortable: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'print'
                    ]
                    // responsive: true,
                    // oLanguage: {
                    //     sZeroRecords: 'لا يوجد سجل متتطابق',
                    //     sEmptyTable: 'لا يوجد بيانات في الجدول',
                    //     oPaginate: {
                    //         sFirst: "First",
                    //         sLast: "الأخير",
                    //         sNext: "التالى",
                    //         sPrevious: "السابق"
                    //     },
                    // },

                });
            });
        </script>
    @else
        <script>
            $(document).ready(function() {
                $('#custom_table').DataTable({
                    stateSave: true,
                    sortable: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'print'
                    ]
                    // responsive: true,
                    // oLanguage: {
                    //     sZeroRecords: 'No matching records found',
                    //     sEmptyTable: 'No data available in table',
                    //     oPaginate: {
                    //         sFirst: "First",
                    //         sLast: "Last",
                    //         sNext: "Next",
                    //         sPrevious: "Previous"
                    //     },
                    // },

                });
            });
        </script>
    @endif --}}
@endif

@yield('js')
