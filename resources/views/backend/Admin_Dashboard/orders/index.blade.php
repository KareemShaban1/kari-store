@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('orders_trans.Orders') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('orders_trans.Orders') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('orders_trans.All_Orders') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('orders_trans.Orders') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

<x-backend.alert type="info" />

<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>{{ trans('orders_trans.Id') }}</th>
                            <th>{{ trans('orders_trans.User_Name') }}</th>
                            <th>{{ trans('orders_trans.Store_Name') }}</th>
                            <th>{{ trans('orders_trans.Status') }}</th>
                            <th>{{ trans('orders_trans.Order_Number') }}</th>
                            <th>{{ trans('orders_trans.Control') }}</th>
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr> 
                               
                                <td>{{ $order->id }}</td>
                               
                                <td>
                                    {{-- <a href="{{ Route('backend.order.show', $order->id) }}"> --}}
                                        {{ $order->user->name }}
                                    {{-- </a> --}}
                                </td>
                               
                                <td>{{ $order->store->name }}</td>
                                
                                 <td>
                                    @if ($order->status == 'pending')
                                        <span class="badge badge-rounded badge-success p-2 mb-2">
                                            {{ trans('orders_trans.Pending') }}
                                        </span>
                                    @elseif($order->status == 'processing')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('orders_trans.Processing') }}
                                        </span>
                                        @elseif($order->status == 'delivering')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('orders_trans.Delivering') }}
                                        </span>    
                                        @elseif($order->status == 'completed')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('orders_trans.Completed') }}
                                        </span>
                                        @elseif($order->status == 'cancelled')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('orders_trans.Cancelled') }}
                                        </span>
                                        @elseif($order->status == 'refunded')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('orders_trans.Refunded') }}
                                        </span>
                                    @endif
                                </td>
                                

                                <td>{{ $order->number }}</td>
                                    
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ Route('admin.orders.edit', $order->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>


                                    <form action="{{ Route('admin.orders.destroy', $order->id) }}"
                                        method="post" style="display:inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

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
@section('js')
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
@endsection
