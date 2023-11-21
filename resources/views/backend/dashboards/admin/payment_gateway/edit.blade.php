@extends('backend.layouts.master')

@section('title')
    {{ trans('payments_trans.Edit_Payment_Gateway') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('payments_trans.Edit_Payment_Gateway') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('payments_trans.Edit_Payment_Gateway') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('payments_trans.Payment_Gateways') }}</li>
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


                    <form method="post" enctype="multipart/form-data"
                        action="{{ Route('admin.paymentGateways.update', $paymentGateway->id) }}" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-backend.form.input value="{{ $paymentGateway->name }}"
                                        label="{{ trans('payments_trans.Gateway_Name') }}" name="name"
                                        class="form-control" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('payments_trans.Active') }}<span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="active"
                                            @checked($paymentGateway->active == 1) value="1">
                                        <label class="form-check-label">
                                            {{ trans('payments_trans.Active') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="active" value="0"
                                            @checked($paymentGateway->active == 0)>
                                        <label class="form-check-label">
                                            {{ trans('payments_trans.Not_Active') }}
                                        </label>
                                    </div>
                                    @error('active')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> {{ trans('payments_trans.Image') }}<span class="text-danger">*</span></label>
                                    <div class="avatar-img">

                                        <input onchange="preview()" type="file" name="image" accept="image/*"
                                            id="upload-photo" />
                                    </div>
                                    @error('image')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded-lg text-center p-3">
                                    <img src="{{ $paymentGateway->image_url }}" height="200" width="200"
                                        class="img-fluid" id="frame" />
                                </div>
                            </div>
                        </div>






                        <button type="submit"
                            class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('payments_trans.Edit') }}</button>


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
