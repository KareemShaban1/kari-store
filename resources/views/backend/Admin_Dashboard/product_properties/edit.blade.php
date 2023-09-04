@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('product_property_trans.Product_Properties') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('product_property_trans.Product_Properties') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('product_property_trans.All_Product_Properties') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('product_property_trans.Product_Properties') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

@endsection
