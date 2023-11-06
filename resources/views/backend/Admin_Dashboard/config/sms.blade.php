@extends('backend.layouts.master')


@section('content')
    <div class="row">

        <div class="col-md-6">
            <div class="card card-statistics mb-30">
                <div class="card-body">
                    <h5 class="card-title">Ultra Message Configuration</h5>
                    <form action="{{ route('admin.config.updateUltraMessageSettings') }}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-5">
                                <h5 class="setting-title">
                                    Ultra Message Istance</h5>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-6 col-7"><input type="text"
                                    name="ULTRA_MESSAGE_INSTANCE" value="{{ env('ULTRA_MESSAGE_INSTANCE') }}"
                                    class="form-control"></div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-5">
                                <h5 class="setting-title">
                                    Ultra Message Token</h5>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-6 col-7"><input type="text" name="ULTRA_MESSAGE_TOKEN"
                                    value="{{ env('ULTRA_MESSAGE_TOKEN') }}" class="form-control"></div>
                        </div>



                        <button type="submit" class="btn btn-success btn-md nextBtn btn-lg ">Submit</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
