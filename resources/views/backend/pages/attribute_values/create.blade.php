@extends('backend.layouts.master')
@section('css')
    <style>
        input {
            display: block;
            width: 50%;
            float: left;
            height: 80px;
        }

        input[type="text"] {
            padding: 20px;
        }

        input[type="text"]:invalid {
            outline: 2px solid red;
        }
    </style>
@section('title')
    {{ trans('attribute_values_trans.Create_Attribute_Value') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('attribute_values_trans.Create_Attribute_Value') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('attribute_values_trans.Create_Attribute_Value') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('attribute_values_trans.Attribute_Values') }}</li>
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

                <div class="row">

                    <div class="col-md-6">
                        <form method="post" enctype="multipart/form-data"
                            action="{{ Route('backend.attribute_values.store') }}" autocomplete="off">

                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> {{ trans('attribute_values_trans.Attribute_Name') }} <span
                                                class="text-danger">*</span></label>
                                        <select name="attribute_id" id="" class="custom-select mr-sm-2">
                                            <option value="">{{ trans('attribute_values_trans.Choose') }}</option>
                                            @foreach ($attributes as $attribute)
                                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('attribute_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <x-backend.form.input label="{{ trans('attribute_values_trans.Key') }}"
                                            name="key" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <x-backend.form.input label="{{ trans('attribute_values_trans.Value') }}"
                                            name="value" class="form-control" />
                                    </div>
                                </div>
                            </div>


                            <button type="submit"
                                class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('attribute_values_trans.Add') }}</button>


                        </form>
                    </div>

                    <div class="col-md-6">
                        {{-- <x-backend.color-picker /> --}}
                        <input type="color" id="colorpicker" name="color"
                            pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#bada55">

                        <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#bada55"
                            id="hexcolor">



                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script>
    $('#colorpicker').on('input', function() {
        $('#hexcolor').val(this.value);
    });
    $('#hexcolor').on('input', function() {
        $('#colorpicker').val(this.value);
    });

    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection
