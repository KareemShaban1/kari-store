@extends('backend.layouts.master')

@section('title')
    {{ trans('orders_trans.Orders') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('orders_trans.Orders_Reports') }}</h4>
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

                    <table id="custom_table" class="display">
                        <thead>
                            <tr>
                                <th>{{ trans('orders_trans.Cart_Number') }}</th>
                                <th>{{ trans('orders_trans.Id') }}</th>
                                <th>{{ trans('orders_trans.Delivery_Time') }}</th>
                                <th>{{ trans('orders_trans.Client_Name') }}</th>
                                <th>{{ trans('orders_trans.Delivery_Address') }}</th>
                                <th>{{ trans('orders_trans.Shipping') }}</th>
                                <th>{{ trans('orders_trans.Price') }}</th>
                                <th>{{ trans('orders_trans.Percent') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $groupedOrders = $orders->groupBy('cart_id');
                            @endphp
                            {{-- @foreach ($orders as $order) --}}
                            @foreach ($groupedOrders as $cartId => $ordersGroup)
                                <tr>
                                    <td rowspan="{{ $ordersGroup->count() }}">{{ $cartId }}</td>

                                    <td>{{ $ordersGroup[0]->id }}</td>

                                    <td rowspan="{{ $ordersGroup->count() }}">
                                        {{ $ordersGroup[0]->orderDelivery->order_delivery_time }}</td>

                                    <td rowspan="{{ $ordersGroup->count() }}">
                                        {{ $ordersGroup[0]->user->first_name }}
                                    </td>

                                    <td rowspan="{{ $ordersGroup->count() }}">
                                        {{ $ordersGroup[0]->orderDelivery->order_location }}</td>


                                    <td rowspan="{{ $ordersGroup->count() }}">{{ $ordersGroup[0]->shipping }}</td>
                                    {{-- <td>{{ $deliveryOrder->order->number }}</td> --}}

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

                                    <td rowspan="{{ $ordersGroup->count() }}">{{ $ordersGroup[0]->percent }}</td>



                                </tr>

                                @foreach ($ordersGroup->skip(1) as $additionalOrder)
                                    <tr>
                                        {{-- <td rowspan="{{ $ordersGroup->count() }}">{{ $cartId }}</td> --}}

                                        <td>{{ $additionalOrder->id }}</td>

                                        {{-- <td>{{ $additionalOrder->orderDelivery->order_delivery_time }}</td> --}}

                                        {{-- <td>
                                            {{ $additionalOrder->user->first_name }}
                                        </td> --}}

                                        {{-- <td>{{ $additionalOrder->orderDelivery->order_location }}</td> --}}


                                        {{-- <td>{{ $additionalOrder->shipping }}</td> --}}

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

                                        {{-- <td>{{ $additionalOrder->percent }}</td> --}}



                                    </tr>
                                @endforeach
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
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                            }
                        },

                        'colvis'
                    ]
                });


            });

            $('#assign_delivery').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var orderId = button.data(
                    'order-id'); // Extract the order ID from the button data attribute
                $('#order_id').val(orderId); // Set the value of the hidden input field with the order ID
            });
        });
    </script>
@endpush
