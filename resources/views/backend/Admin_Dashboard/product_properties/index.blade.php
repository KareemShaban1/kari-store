@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('product_properties_trans.Product_Properties') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('product_properties_trans.Product_Properties') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('product_properties_trans.All_Product_Properties') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('product_properties_trans.Product_Properties') }}</li>
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
                            <th>{{ trans('product_properties_trans.Id') }}</th>
                            <th>{{ trans('product_properties_trans.Product_Name') }}</th>
                            <th>{{ trans('product_properties_trans.Property_Name') }}</th>
                            <th>{{ trans('product_properties_trans.Property_Value') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_properties as $product_property)
                            <tr>

                                <td>{{ $product_property->id }}</td>
                                <td>{{ $product_property->product->name }}</td>
                                <td>{{ $product_property->name }}</td>
                                <td>{{ $product_property->value }}</td>

                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a {{-- href="{{ Route('admin.products.edit', $product->id) }}" --}} class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>


                                    {{-- <form action="{{ Route('admin.products.destroy', $product->id) }}" method="post"
                                        style="display:inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form> --}}


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


@section('js')
<script>
    $(document).ready(function() {


        var datatable = $('#custom_table').DataTable({
            stateSave: true,
            sortable: true,
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
                        columns: [1, 2, 3, 4]
                    }
                },

                'colvis'
            ]
        });


    });
</script>
@endsection
