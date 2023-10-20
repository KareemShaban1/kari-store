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

                {{-- <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>{{ trans('orders_trans.Id') }}</th>
                            <th>{{ trans('orders_trans.Cart') }}</th>
                            <th>{{ trans('orders_trans.User_Name') }}</th>
                            <th>{{ trans('orders_trans.Store_Name') }}</th>
                            <th>{{ trans('orders_trans.Category_Name') }}</th>
                            <th>{{ trans('orders_trans.Status') }}</th>
                            <th>{{ trans('orders_trans.Order_Number') }}</th>
                            @can('assignDelivery', App\Models\Admin::class)
                                <th>{{ trans('orders_trans.Assign_Delivery') }}</th>
                            @endcan
                            <th>{{ trans('orders_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>

                                <td>{{ $order->id }}</td>

                                <td>{{ $order->cart_id }}</td>

                                <td>
                                    {{ $order->user->first_name }}
                                </td>

                                <td>{{ $order->store->name }}</td>

                                <td>
                                    @foreach ($order->products as $product)
                                        {{ $product->category->name }}
                                    @endforeach
                                </td>


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

                                @php
                                    $order_delivery = App\Models\OrderDelivery::where('order_id', $order->id)->first();
                                    $delivery = $order_delivery ? App\Models\Delivery::where('id', $order_delivery->delivery_id)->first() : null;
                                @endphp

                                @can('assignDelivery', App\Models\Admin::class)
                                    <td>
                                        @if ($order_delivery)
                                            <div>{{ $delivery->name }} تم أرسال الطلب لمندوب الشحن</div>
                                        @else
                                            <button type="button" class="button x-small" data-toggle="modal"
                                                data-target="#assign_delivery" data-order-id="{{ $order->id }}">
                                                {{ trans('orders_trans.Assign_Delivery') }}
                                            </button>
                                        @endif
                                    </td>
                                @endcan
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ Route('admin.orders.edit', $order->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>


                                    <form action="{{ Route('admin.orders.destroy', $order->id) }}" method="post"
                                        style="display:inline">
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
                </table> --}}


                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>{{ trans('orders_trans.Cart_Number') }}</th>
                            <th>{{ trans('orders_trans.Id') }}</th>
                            <th>{{ trans('orders_trans.User_Name') }}</th>
                            <th>{{ trans('orders_trans.Store_Name') }}</th>
                            <th>{{ trans('orders_trans.Category_Name') }}</th>
                            <th>{{ trans('orders_trans.Products') }}</th>
                            <th>{{ trans('orders_trans.Variant') }}</th>
                            <th>{{ trans('orders_trans.Status') }}</th>
                            <th>{{ trans('orders_trans.Order_Number') }}</th>
                            <th>{{ trans('orders_trans.Total') }}</th>
                            {{-- @can('assignDelivery', App\Models\Admin::class)
                                <th>{{ trans('orders_trans.Assign_Delivery') }}</th>
                            @endcan --}}
                            <th>{{ trans('orders_trans.Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $groupedOrders = $orders->groupBy('cart_id');
                        @endphp

                        @foreach ($groupedOrders as $cartId => $ordersGroup)
                            <tr>
                                <!-- Cart ID with rowspan -->
                                <td rowspan="{{ $ordersGroup->count() }}">{{ $cartId }}</td>

                                <!-- First order's details -->
                                <td>{{ $ordersGroup[0]->id }}</td>
                                <td>{{ $ordersGroup[0]->user->first_name }}</td>
                                <td>{{ $ordersGroup[0]->store->name }}</td>
                                <td>
                                    @foreach ($ordersGroup[0]->products as $product)
                                        {{ $product->category->name }}
                                    @endforeach
                                </td>

                                <td>
                                    @foreach ($ordersGroup[0]->products as $product)
                                        {{ $product->order_item->product_name }} {
                                        {{ $product->order_item->quantity }} / {{ $product->order_item->price }} }
                                    @endforeach
                                </td>


                                <td>
                                    @foreach ($ordersGroup[0]->variants as $variant)
                                        {{ $variant ? $variant->attribute->name : null }} :
                                        {{ $variant ? $variant->attribute_value->name : null }}
                                    @endforeach
                                </td>
                                <td>
                                    @if ($ordersGroup[0]->status == 'pending')
                                        <span class="badge badge-rounded badge-success p-2 mb-2">
                                            {{ trans('orders_trans.Pending') }}
                                        </span>
                                    @elseif($ordersGroup[0]->status == 'processing')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('orders_trans.Processing') }}
                                        </span>
                                    @elseif($ordersGroup[0]->status == 'delivering')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('orders_trans.Delivering') }}
                                        </span>
                                    @elseif($ordersGroup[0]->status == 'completed')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('orders_trans.Completed') }}
                                        </span>
                                    @elseif($ordersGroup[0]->status == 'cancelled')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('orders_trans.Cancelled') }}
                                        </span>
                                    @elseif($ordersGroup[0]->status == 'refunded')
                                        <span class="badge badge-rounded badge-danger p-2 mb-2">
                                            {{ trans('orders_trans.Refunded') }}
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $ordersGroup[0]->number }}</td>


                                <td>
                                    @php
                                        $totalPrice = 0;
                                    @endphp

                                    @foreach ($ordersGroup[0]->products as $product)
                                        @php
                                            $totalPrice += $product->price;
                                        @endphp
                                    @endforeach

                                    {{ Currency::format($totalPrice) }}
                                </td>



                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ Route('admin.orders.edit', $ordersGroup[0]->id) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ Route('admin.orders.destroy', $ordersGroup[0]->id) }}"
                                        method="post" style="display:inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            @foreach ($ordersGroup->skip(1) as $additionalOrder)
                                <tr>
                                    <!-- Only display order details (except cart ID) for additional rows -->
                                    <td>{{ $additionalOrder->id }}</td>
                                    <td>{{ $additionalOrder->user->first_name }}</td>
                                    <td>{{ $additionalOrder->store->name }}</td>
                                    <td>
                                        @foreach ($additionalOrder->products as $product)
                                            {{ $product->category->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($additionalOrder->products as $product)
                                            {{ $product->order_item->product_name }} {
                                            {{ $product->order_item->quantity }} / {{ $product->order_item->price }} }
                                        @endforeach
                                    </td>

                                    <td>
                                        @foreach ($ordersGroup[0]->variants as $variant)
                                            {{ $variant ? $variant->attribute->name : null }} :
                                            {{ $variant ? $variant->attribute_value->name : null }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($additionalOrder->status == 'pending')
                                            <span class="badge badge-rounded badge-success p-2 mb-2">
                                                {{ trans('orders_trans.Pending') }}
                                            </span>
                                        @elseif($additionalOrder->status == 'processing')
                                            <span class="badge badge-rounded badge-danger p-2 mb-2">
                                                {{ trans('orders_trans.Processing') }}
                                            </span>
                                        @elseif($additionalOrder->status == 'delivering')
                                            <span class="badge badge-rounded badge-danger p-2 mb-2">
                                                {{ trans('orders_trans.Delivering') }}
                                            </span>
                                        @elseif($additionalOrder->status == 'completed')
                                            <span class="badge badge-rounded badge-danger p-2 mb-2">
                                                {{ trans('orders_trans.Completed') }}
                                            </span>
                                        @elseif($additionalOrder->status == 'cancelled')
                                            <span class="badge badge-rounded badge-danger p-2 mb-2">
                                                {{ trans('orders_trans.Cancelled') }}
                                            </span>
                                        @elseif($additionalOrder->status == 'refunded')
                                            <span class="badge badge-rounded badge-danger p-2 mb-2">
                                                {{ trans('orders_trans.Refunded') }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $additionalOrder->number }}</td>
                                    <td>
                                        @php
                                            $totalPrice = 0;
                                        @endphp

                                        @foreach ($additionalOrder->products as $product)
                                            @php
                                                $totalPrice += $product->price;
                                            @endphp
                                        @endforeach

                                        {{ Currency::format($totalPrice) }}
                                    </td>

                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ Route('admin.orders.edit', $additionalOrder->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="{{ Route('admin.orders.destroy', $additionalOrder->id) }}"
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
                        @endforeach
                    </tbody>
                </table>


                {{-- <!-- assign_delivery_modal -->
                <div class="modal fade" id="assign_delivery" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    {{ trans('orders_trans.Assign_Delivery') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>



                            <div class="modal-body">
                                <!-- add_form -->
                                <form action="{{ Route('admin.orders.assignDelivery') }}" method="POST">
                                    @csrf


                                    <div class="row">

                                        <div class="col-md-12">
                                            <input name="order_id" id="order_id" hidden />
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> {{ trans('orders_trans.Delivery_Name') }} <span
                                                        class="text-danger">*</span></label>
                                                <select name="delivery_id" id="" class="custom-select mr-sm-2">
                                                    <option value="">{{ trans('orders_trans.Choose_Delivery') }}
                                                    </option>
                                                    @foreach ($deliveries as $delivery)
                                                        <option value="{{ $delivery->id }}">{{ $delivery->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('delivery_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>



                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('orders_trans.Close') }}</button>
                                        <button type="submit"
                                            class="btn btn-success">{{ trans('orders_trans.Submit') }}</button>
                                    </div>

                                </form>

                            </div>


                        </div>
                    </div>
                </div> --}}


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

        $('#assign_delivery').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var orderId = button.data(
                'order-id'); // Extract the order ID from the button data attribute
            $('#order_id').val(orderId); // Set the value of the hidden input field with the order ID
        });
    });
</script>
@endsection
