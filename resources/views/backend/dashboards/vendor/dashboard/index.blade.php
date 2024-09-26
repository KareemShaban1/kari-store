@extends('backend.layouts.master')

@section('title')
    {{ trans('dashboard_trans.Dashboard') }}
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

                    <div class="row">

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
                                            <h4>{{ $orders_count }}</h4>
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




                        {{-- Products Attributes --}}
                        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-right">
                                            <span class="text-info">
                                                <i class="fa-brands fa-product-hunt highlight-icon"></i> </span>
                                        </div>
                                        <div class="float-left text-left">
                                            <p class="card-text text-dark">عدد خواص المنتجات</p>
                                            <h4>{{ $attributes_count }}</h4>
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
                        <div class="col-xl-12 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <h5 class="card-title pb-0 border-0"> الطلبات </h5>
                                    <!-- action group -->
                                    <div class="btn-group info-drop">
                                        <button type="button" class="dropdown-toggle-split text-muted"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                class="ti-more"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#"><i class="text-success ti-files"></i>
                                                Approved</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="text-warning ti-pencil-alt"></i> Pending</a>
                                            <a class="dropdown-item" href="#"><i class="text-danger ti-user"></i>
                                                Rejected</a>
                                            <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>
                                                Refresh</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table center-aligned-table mb-0">
                                            <thead>
                                                <tr class="text-dark">
                                                    <th>Order No</th>
                                                    <th>Product Name</th>
                                                    <th>Purchased On</th>
                                                    <th>Shipping Status</th>
                                                    <th>Payment Method</th>
                                                    <th>Payment Status</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>034</td>
                                                    <td>Iphone 7</td>
                                                    <td>12 May 2017</td>
                                                    <td>Dispatched</td>
                                                    <td>Credit card</td>
                                                    <td><label class="badge badge-success">Approved</label></td>
                                                    <td><a href="#" class="btn btn-outline-success btn-sm">View
                                                            Order</a></td>
                                                    <td><a href="#" class="btn btn-outline-warning btn-sm">Cancel</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>035</td>
                                                    <td>Galaxy S8</td>
                                                    <td>15 May 2017</td>
                                                    <td>Dispatched</td>
                                                    <td>Internet banking</td>
                                                    <td><label class="badge badge-warning">Pending</label></td>
                                                    <td><a href="#" class="btn btn-outline-success btn-sm">View
                                                            Order</a></td>
                                                    <td><a href="#" class="btn btn-outline-warning btn-sm">Cancel</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>036</td>
                                                    <td>Amazon Echo</td>
                                                    <td>17 May 2017</td>
                                                    <td>Dispatched</td>
                                                    <td>Credit card</td>
                                                    <td><label class="badge badge-success">Approved</label></td>
                                                    <td><a href="#" class="btn btn-outline-success btn-sm">View
                                                            Order</a></td>
                                                    <td><a href="#" class="btn btn-outline-warning btn-sm">Cancel</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>037</td>
                                                    <td>Google Pixel</td>
                                                    <td>17 May 2017</td>
                                                    <td>Dispatched</td>
                                                    <td>Cash on delivery</td>
                                                    <td><label class="badge badge-danger">Rejected</label></td>
                                                    <td><a href="#" class="btn btn-outline-success btn-sm">View
                                                            Order</a></td>
                                                    <td><a href="#"
                                                            class="btn btn-outline-warning btn-sm">Cancel</a></td>
                                                </tr>
                                                <tr>
                                                    <td>038</td>
                                                    <td>Mac Mini</td>
                                                    <td>19 May 2017</td>
                                                    <td>Dispatched</td>
                                                    <td>Debit card</td>
                                                    <td><label class="badge badge-success">Approved</label></td>
                                                    <td><a href="#" class="btn btn-outline-success btn-sm">View
                                                            Order</a></td>
                                                    <td><a href="#"
                                                            class="btn btn-outline-warning btn-sm">Cancel</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
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
@push('scripts')
@endpush
