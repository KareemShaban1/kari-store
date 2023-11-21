@extends('backend.layouts.master')


@section('content')
    <div class="row">
        <div class="col-md-6">

            <div class="card card-statistics mb-30">
                <div class="card-body">
                    <h5 class="card-title">Pusher Configuration</h5>
                    <form action="{{ route('admin.config.updatePusherSettings') }}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-5">
                                <h5 class="setting-title">
                                    Pusher App Id</h5>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-6 col-7"><input type="text" name="PUSHER_APP_ID"
                                    value="{{ env('PUSHER_APP_ID') }}" class="form-control"></div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-5">
                                <h5 class="setting-title">
                                    Pusher App Key</h5>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-6 col-7"><input type="text" name="PUSHER_APP_KEY"
                                    value="{{ env('PUSHER_APP_KEY') }}" class="form-control"></div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-5">
                                <h5 class="setting-title">
                                    Pusher App Secret</h5>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-6 col-7"><input type="text" name="PUSHER_APP_SECRET"
                                    value="{{ env('PUSHER_APP_SECRET') }}" class="form-control"></div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-5">
                                <h5 class="setting-title">
                                    Pusher App Cluster</h5>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-6 col-7"><input type="text" name="PUSHER_APP_CLUSTER"
                                    value="{{ env('PUSHER_APP_CLUSTER') }}" class="form-control"></div>
                        </div>

                        <button type="submit" class="btn btn-success btn-md nextBtn btn-lg ">Submit</button>

                    </form>
                </div>
            </div>

        </div>

        <div class="col-md-6">

        </div>
    </div>
@endsection
