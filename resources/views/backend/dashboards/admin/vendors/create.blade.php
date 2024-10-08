@extends('backend.layouts.master')

@section('title')
    {{ trans('vendors_trans.Create_Vendor') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('vendors_trans.Create_Vendor') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('vendors_trans.Create_Vendor') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('vendors_trans.Vendors') }}</li>
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


                    <form method="post" enctype="multipart/form-data" action="{{ Route('admin.vendors.store') }}"
                        autocomplete="off">

                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-backend.form.input label="{{ trans('vendors_trans.Vendor_Name') }}" name="name"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-backend.form.input label="{{ trans('vendors_trans.Email') }}" name="email"
                                        type="email" class="form-control" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-backend.form.input label="{{ trans('vendors_trans.Password') }}" name="password"
                                        type="password" class="form-control" />
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-backend.form.input label="{{ trans('vendors_trans.Phone') }}" name="phone"
                                        type="phone" class="form-control" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ trans('vendors_trans.Store_Name') }} <span
                                            class="text-danger">*</span></label>
                                    <select name="store_id" id="" class="custom-select mr-sm-2">
                                        <option value="">{{ trans('vendors_trans.Choose') }}</option>
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('store_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('vendors_trans.Status') }}<span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="active" value="1">
                                        <label class="form-check-label">
                                            {{ trans('vendors_trans.Active') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="active" value="0"
                                            checked>
                                        <label class="form-check-label">
                                            {{ trans('vendors_trans.Inactive') }}
                                        </label>
                                    </div>
                                    @error('active')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>





                        <button type="submit"
                            class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('vendors_trans.Add') }}</button>


                    </form>




                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@push('scripts')
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endpush
