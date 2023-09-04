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

<x-backend.alert />

<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <form method="post" enctype="multipart/form-data"
                    action="{{ Route('admin.product_properties.store') }}" autocomplete="off">

                    @csrf


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> {{ trans('product_properties_trans.Product_Name') }} <span
                                        class="text-danger">*</span></label>
                                <select name="product_id" id="" class="custom-select mr-sm-2">
                                    <option value="">{{ trans('product_properties_trans.Choose') }}</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('product_properties_trans.Property_Name') }}"
                                    name="name" class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('product_properties_trans.Property_Value') }}"
                                    name="value" class="form-control" />
                            </div>
                        </div>


                    </div>











                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('product_properties_trans.Add') }}</button>


                </form>

            </div>
        </div>
    </div>
</div>


@endsection
