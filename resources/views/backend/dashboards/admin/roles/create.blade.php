@extends('backend.layouts.master')

@section('title')
    {{ trans('roles_trans.Create_Role') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('roles_trans.Create_Role') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('roles_trans.Create_Role') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('roles_trans.Roles') }}</li>
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


                    <form method="post" enctype="multipart/form-data" action="{{ Route('admin.roles.store') }}"
                        autocomplete="off">

                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-backend.form.input label="{{ trans('roles_trans.Role_Name') }}" name="name"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>

                        <fieldset>
                            <legend>{{ trans('roles_trans.Abilities') }}</legend>
                            <div class="row">
                                @foreach (app('abilities') as $ability_code => $ability_name)
                                    <div class="col-md-3" style="text-align: right; margin-bottom: 10px">
                                        {{ $ability_name }}
                                    </div>
                                    <div class="col-md-1">
                                        <input type="radio" name="abilities[{{ $ability_code }}]" value="allow">
                                        Allow
                                    </div>
                                    <div class="col-md-1">
                                        <input type="radio" name="abilities[{{ $ability_code }}]" value="deny" checked>
                                        Deny
                                    </div>
                                    <div class="col-md-1">
                                        <input type="radio" name="abilities[{{ $ability_code }}]" value="inherit">
                                        Inherit
                                    </div>
                                    @if ($loop->iteration % 6 == 0)
                                        <div class="w-100" style="margin-bottom: 20px;"></div>
                                    @endif
                                @endforeach
                            </div>
                        </fieldset>



                        <button type="submit"
                            class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('roles_trans.Add') }}</button>


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
