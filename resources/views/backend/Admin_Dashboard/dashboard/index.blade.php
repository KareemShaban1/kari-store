@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('dashboard_trans.Dashboard') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('dashboard_trans.Dashboard') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                {{-- <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li> --}}
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->

<div class="row">
    <div class="col-md-12 mt-30 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                {{-- <div>
                    <p>{{ Auth::user('admin')->name }}</p>
                </div> --}}

                <div class="row">



                    {{-- Stores --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-right">
                                        <span class="text-success">
                                            <i class="fa-solid fa-store highlight-icon"></i> </span>
                                    </div>
                                    <div class="float-left text-left">
                                        <p class="card-text text-dark">عدد المتاجر</p>
                                        <h4>{{ \App\Models\Store::count() }}</h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href=""
                                        target="_blank"><span class="text-danger">عرض
                                            البيانات</span></a>
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Categories --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-right">
                                        <span class="text-danger">
                                            <i class="fa-solid fa-tag highlight-icon"></i> </span>
                                    </div>
                                    <div class="float-left text-left">
                                        <p class="card-text text-dark">عدد التصنيفات</p>
                                        <h4>{{ \App\Models\Category::count() }}</h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href=""
                                        target="_blank"><span class="text-danger">عرض
                                            البيانات</span></a>
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Products --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-right">
                                        <span class="text-warning">
                                            <i class="fa-brands fa-product-hunt highlight-icon"></i> </span>
                                    </div>
                                    <div class="float-left text-left">
                                        <p class="card-text text-dark">عدد المنتجات</p>
                                        <h4>{{ \App\Models\Product::count() }}</h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href=""
                                        target="_blank"><span class="text-danger">عرض
                                            البيانات</span></a>
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Orders --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-right">
                                        <span class="text-success">
                                            <i class="fa-solid fa-cart-shopping highlight-icon"></i>
                                        </span>
                                    </div>
                                    <div class="float-left text-left">
                                        <p class="card-text text-dark">عدد الطلبات</p>
                                        <h4>{{ \App\Models\Order::count() }}</h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href=""
                                        target="_blank"><span class="text-danger">عرض
                                            البيانات</span></a>
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Vendors --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-right">
                                        <span class="text-info">
                                            <i class="fas fa-store highlight-icon" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="float-left text-left">
                                        <p class="card-text text-dark">Vendors </p>
                                        <h4>{{ \App\Models\Vendor::count() }}</h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href=""
                                        target="_blank"><span class="text-danger">عرض
                                            البيانات</span></a>
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Users --}}
                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-right">
                                        <span class="text-primary">
                                            <i class="fas fa-user highlight-icon" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="float-left text-left">
                                        <p class="card-text text-dark">عدد المستخدمين</p>
                                        <h4>{{ \App\Models\User::count() }}</h4>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href=""
                                        target="_blank"><span class="text-danger">عرض
                                            البيانات</span></a>
                                </p>
                            </div>
                        </div>
                    </div>




                </div>

                <div class="row">
                    <div class="col-md-4 mb-30">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Top 5 Products Sold </h5>
                                <div class="chart-wrapper">
                                    <div id="canvas-holder" style="width: 100%; margin: 0 auto; height: 300px;">
                                        <canvas id="products_chart" width="550"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script src="{{ asset('backend/assets/js/chart-init.js') }}"></script>

<script>
    (function($) {
        // Extract product names and order counts from the passed PHP variables
        var productNames = @json($products->pluck('name'));
        var orderCounts = @json($topProducts->pluck('total_orders'));

        var productData = {
            datasets: [{
                data: orderCounts,
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                ],
                label: 'Top Products'
            }],
            labels: productNames // Use the product names as labels
        };

        var config3 = {
            type: 'doughnut',
            data: productData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: false,
                    text: 'Top Products Chart'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };

        window.onload = function() {
            if ($('#products_chart').exists()) {
                var ctx3 = document.getElementById("products_chart").getContext("2d");
                window.myLine3 = new Chart(ctx3, config3);
            }
        }
    })(jQuery);
</script>
@endsection
