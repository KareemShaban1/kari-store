@extends('backend.layouts.master')

@section('title')
    {{ trans('roles_trans.Roles') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('roles_trans.Roles') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('roles_trans.All_Roles') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('roles_trans.Roles') }}</li>
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
                                <th>{{ trans('roles_trans.Id') }}</th>
                                <th>{{ trans('roles_trans.Role_Name') }}</th>
                                <th>{{ trans('roles_trans.Control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>
                                        {{ $role->name }}
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @can('update', $role)
                                            <a href="{{ Route('admin.roles.edit', $role->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan

                                        @can('delete', $role)
                                            <form action="{{ Route('admin.roles.destroy', $role->id) }}" method="post"
                                                style="display:inline">
                                                @csrf
                                                @method('delete')

                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                        {{-- <a href="" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> 
                                    
                                </a>     --}}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
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
                stateSave: true,
                sortable: true,
                responsive: true,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1]
                        }
                    },

                    'colvis'
                ]
            });

        });
    </script>
@endpush
