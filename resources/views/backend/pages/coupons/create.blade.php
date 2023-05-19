@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('coupons_trans.Create_Coupon') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('coupons_trans.Create_Coupon') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('coupons_trans.Create_Coupon') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('coupons_trans.Coupons') }}</li>
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


                <form method="post" enctype="multipart/form-data" action="{{ Route('backend.coupons.store') }}"
                    autocomplete="off">

                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('coupons_trans.Coupon_Name') }}" name="name"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('coupons_trans.Code') }}" name="code"
                                    class="form-control" />
                            </div>
                        </div>

                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <x-backend.form.textarea label="{{ trans('coupons_trans.Description') }}"
                                    name="description" />
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('coupons_trans.Type') }}" name="type"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <x-backend.form.input label="{{ trans('coupons_trans.Amount') }}" name="amount"
                                    class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('coupons_trans.Status') }}<span class="text-danger">*</span></label>                             
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="active">
                                    <label class="form-check-label">
                                        {{ trans('coupons_trans.Active') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="inactive"
                                        checked>
                                    <label class="form-check-label">
                                        {{ trans('coupons_trans.Inactive') }}
                                    </label>
                                </div>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>        

                       
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> {{ trans('coupons_trans.Start_Date') }} <span class="text-danger">*</span></label>
                                <input class="form-control" type="datetime-local" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> {{ trans('coupons_trans.End_Date') }} <span class="text-danger">*</span></label>
                                <input class="form-control" type="datetime-local" name="end_date">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> {{ trans('coupons_trans.Category_Name') }} <span
                                        class="text-danger">*</span></label>
                                <select name="category_id" id="" class="custom-select mr-sm-2">
                                    <option value="">{{ trans('coupons_trans.Choose') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label> {{ trans('coupons_trans.Product_Name') }} <span
                                        class="text-danger">*</span></label>
                                <select name="product_id" id="" class="custom-select mr-sm-2">
                                    <option value="">{{ trans('coupons_trans.Choose') }}</option>
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



              





                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('coupons_trans.Add') }}</button>


                </form>




            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection
