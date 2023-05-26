@extends('backend.layouts.master')
@section('css')

@section('title')
    {{ trans('stores_trans.Create_Store') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('stores_trans.Create_Store') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('stores_trans.Create_Store') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('stores_trans.Stores') }}</li>
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


                <form method="post" enctype="multipart/form-data" action="{{Route('admin.stores.store')}}" autocomplete="off">

                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('stores_trans.Name') }}<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> {{ trans('stores_trans.Category_Name') }} <span
                                        class="text-danger">*</span></label>
                                <select name="category_id" id="" class="custom-select mr-sm-2">
                                    <option value="">{{ trans('stores_trans.Choose') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ trans('stores_trans.Description') }}<span
                                        class="text-danger">*</span></label>
                                <textarea name="description" class="form-control"  rows="5">
                                    {{old('description')}}
                                </textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('stores_trans.Status') }}<span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="active">
                                    <label class="form-check-label">
                                      {{ trans('stores_trans.Active') }}
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="inactive" checked>
                                    <label class="form-check-label" >
                                        {{ trans('stores_trans.Inactive') }}
                                    </label>
                                  </div>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>


                    {{-- logo_image --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{trans('stores_trans.Logo_Image')}}<span class="text-danger">*</span></label>
                                <div class="avatar-img">
                                    {{-- <label class="avatar-label circle" for="upload-photo" >+</label>
                                    <img class="avatar" src="{{URL::asset('assets/images/user.png')}}" alt=""> --}}
                                    <input onchange="preview()" type="file" name="logo_image" accept="image/*" id="upload-photo" />
                                </div>
                                @error('logo_image')
                                <p class="alert alert-danger">{{ $message }}</p>
                                @enderror 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-lg text-center p-3">
                                <img src="{{asset('backend/assets/images/profile-avatar.jpg')}}" 
                                height="200" width="200"
                                class="img-fluid" id="frame" />
                            </div>
                        </div>
                    </div>



                    {{-- cover_image --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> {{trans('stores_trans.Cover_Image')}}<span class="text-danger">*</span></label>
                                <div class="avatar-img">
                                    {{-- <label class="avatar-label circle" for="upload-photo" >+</label>
                                    <img class="avatar" src="{{URL::asset('assets/images/user.png')}}" alt=""> --}}
                                    <input onchange="previewes()" type="file" name="cover_image" accept="image/*" id="upload-photo" />
                                </div>
                                @error('logo_image')
                                <p class="alert alert-danger">{{ $message }}</p>
                                @enderror 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-lg text-center p-3">
                                <img src="{{asset('backend/assets/images/profile-avatar.jpg')}}" 
                                height="200" width="200"
                                class="img-fluid" id="frame_1" />
                            </div>
                        </div>
                    </div>


                   
                   





                    <button type="submit"
                        class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('stores_trans.Add') }}</button>


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
    frame.src=URL.createObjectURL(event.target.files[0]);
}

function previewes() {
    frame_1.src=URL.createObjectURL(event.target.files[0]);
}

</script>
@endsection
