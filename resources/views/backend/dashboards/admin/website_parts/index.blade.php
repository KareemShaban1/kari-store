@extends('backend.layouts.master')

@section('title')
    {{ trans('websiteParts_trans.WebsiteParts') }}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('websiteParts_trans.WebsiteParts') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('websiteParts_trans.All_WebsiteParts') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('websiteParts_trans.WebsiteParts') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <table id="custom_table" class="display">
                        <thead>
                            <tr>
                                <th>{{ trans('websiteParts_trans.Id') }}</th>
                                <th>{{ trans('websiteParts_trans.Part_Name') }}</th>
                                <th>{{ trans('websiteParts_trans.Show') }}</th>
                                <th>{{ trans('websiteParts_trans.Image') }}</th>
                                <th>{{ trans('websiteParts_trans.Control') }}</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var datatable = $('#custom_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("admin.websiteParts.index") }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'key', name: 'key' },
                    { data: 'value', name: 'value', orderable: false, searchable: false },
                    { data: 'image', name: 'image', orderable: false, searchable: false },
                    { data: 'control', name: 'control', orderable: false, searchable: false }
                ],
                stateSave: true,
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    'colvis'
                ]
            });
        });
    </script>
@endpush
