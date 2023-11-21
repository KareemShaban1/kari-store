@extends('backend.layouts.master')

@section('title')
    {{ trans('payments_trans.Payment_Gateways') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('payments_trans.Payment_Gateways') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('payments_trans.All_Payment_Gateways') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('payments_trans.Payment_Gateways') }}</li>
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
                                <th>{{ trans('payments_trans.Id') }}</th>
                                <th>{{ trans('payments_trans.Image') }}</th>
                                <th>{{ trans('payments_trans.Gateway_Name') }}</th>
                                <th>{{ trans('payments_trans.Active') }}</th>
                                <th>{{ trans('payments_trans.Control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paymentGateways as $gateway)
                                <tr>

                                    <td>{{ $gateway->id }}</td>
                                    <td>
                                        <img src="{{ $gateway->image_url }}" height="50" width="50" alt="">
                                    </td>

                                    <td>
                                        {{ $gateway->name }}
                                    </td>

                                    <td>
                                        @if ($gateway->active == 1)
                                            <span class="text-success">{{ trans('payments_trans.Active') }}</span>
                                        @else
                                            <span class="text-danger">{{ trans('payments_trans.Not_Active') }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ Route('admin.paymentGateways.edit', $gateway->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>


                                        <form action="{{ Route('admin.paymentGateways.destroy', $gateway->id) }}"
                                            method="post" style="display:inline">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>


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
                            columns: [0, 1, 2, 3]
                        }
                    },

                    'colvis'
                ]
            });

        });
    </script>
@endpush
