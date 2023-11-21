@extends('backend.layouts.master')

@section('title')
    {{ trans('stores_trans.Edit_Store') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('stores_trans.Edit_Store') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('stores_trans.Edit_Store') }}</a></li>
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


                    <form method="post" enctype="multipart/form-data"
                        action="{{ Route('admin.stores.update', $store->id) }}" autocomplete="off">

                        @csrf

                        @method('put')

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-backend.form.input label="{{ trans('stores_trans.Name') }}" name="name"
                                        :value="$store->name" class="form-control" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('stores_trans.Phone_Number') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="tel" name="phone_number" value="{{ $store->phone_number }}"
                                        class="form-control">
                                    @error('phone_number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('stores_trans.Categories') }}<span class="text-danger">*</span></label>
                                    <select name="categories_id[]" class="custom-select mr-sm-2" multiple required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $store->categories->contains('id', $category->id) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('categories_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="row">


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('stores_trans.Governorate') }}<span
                                            class="text-danger">*</span></label>
                                    <select name="governorate_id" id="" class="custom-select mr-sm-2" required>
                                        <option disabled selected> اختار المحافظة </option>
                                        @foreach ($destinations as $destination)
                                            @if ($destination->rank == '1')
                                                <option value="{{ $destination->id }}" @selected($store->governorate_id == $destination->id)>
                                                    {{ $destination->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('governorate_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>





                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('stores_trans.City') }}<span class="text-danger">*</span></label>
                                    <select name="city_id" id="" class="custom-select mr-sm-2" required>
                                        <option disabled selected> اختار المدينة </option>
                                        @foreach ($destinations as $destination)
                                            @if ($destination->rank == '2')
                                                <option value="{{ $destination->id }}" @selected($store->city_id == $destination->id)>
                                                    {{ $destination->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('stores_trans.Neighborhood') }}<span
                                            class="text-danger">*</span></label>
                                    <select name="neighborhood_id" id="" class="custom-select mr-sm-2" required>
                                        <option disabled selected> اختار المنطقة </option>
                                        @foreach ($destinations as $destination)
                                            @if ($destination->rank == '3')
                                                <option value="{{ $destination->id }}" @selected($store->neighborhood_id == $destination->id)>
                                                    {{ $destination->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('neighborhood_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('stores_trans.Street_Address') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="street_address" value="{{ $store->street_address }}"
                                        class="form-control">
                                    @error('street_address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('stores_trans.Percent') }}<span class="text-danger">*</span></label>
                                    <input type="number" name="percent" class="form-control" value="{{ $store->percent }}"
                                        min="0">
                                    @error('percent')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <x-backend.form.textarea label="{{ trans('stores_trans.Description') }}"
                                        name="description" value="{{ $store->description }}" />

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('stores_trans.Status') }}<span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="1"
                                            @checked($store->status == '1')>
                                        <label class="form-check-label">
                                            {{ trans('categories_trans.Active') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="0"
                                            @checked($store->status == '0')>
                                        <label class="form-check-label">
                                            {{ trans('categories_trans.Inactive') }}
                                        </label>
                                    </div>
                                    @error('status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('stores_trans.Featured') }}<span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="featured" value="1"
                                            @checked($store->featured == '1')>
                                        <label class="form-check-label">
                                            {{ trans('stores_trans.Featured') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="featured"
                                            @checked($store->featured == '0') value="0">
                                        <label class="form-check-label">
                                            {{ trans('stores_trans.Not_Featured') }}
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
                                    <label> {{ trans('stores_trans.Logo_Image') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="avatar-img">
                                        {{-- <label class="avatar-label circle" for="upload-photo" >+</label>
                                    <img class="avatar" src="{{URL::asset('assets/images/user.png')}}" alt=""> --}}
                                        <input onchange="preview()" type="file" name="logo_image" accept="image/*"
                                            id="upload-photo" />
                                    </div>
                                    @error('logo_image')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded-lg text-center p-3">
                                    <img src="{{ asset($store->logo_image_url) }}" height="200" width="200"
                                        class="img-fluid" id="frame" />
                                </div>
                            </div>
                        </div>



                        {{-- cover_image --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> {{ trans('stores_trans.Cover_Image') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="avatar-img">
                                        {{-- <label class="avatar-label circle" for="upload-photo" >+</label>
                                    <img class="avatar" src="{{URL::asset('assets/images/user.png')}}" alt=""> --}}
                                        <input onchange="previewes()" type="file" name="cover_image" accept="image/*"
                                            id="upload-photo" />
                                    </div>
                                    @error('logo_image')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded-lg text-center p-3">
                                    <img src="{{ asset($store->cover_image_url) }}" height="200" width="200"
                                        class="img-fluid" id="frame_1" />
                                </div>
                            </div>
                        </div>









                        <button type="submit"
                            class="btn btn-success btn-md nextBtn btn-lg ">{{ trans('stores_trans.Edit') }}</button>


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

        function previewes() {
            frame_1.src = URL.createObjectURL(event.target.files[0]);
        }


        $(document).ready(function() {
            // When the "governorate" dropdown value changes
            $('select[name="governorate_id"]').on('change', function() {
                var governorateId = $(this).val(); // Get the selected governorate ID

                console.log(governorateId);

                // Make an AJAX request to fetch cities based on the selected governorate
                $.ajax({
                    url: '/admin/get-cities',
                    method: 'GET',
                    data: {
                        governorate_id: governorateId
                    },
                    success: function(response) {
                        // Clear the current city options
                        $('select[name="city_id"]').empty();
                        $('select[name="city_id"]').append(
                            '<option disabled selected>أختار  المدينة</option>');

                        $.each(response.cities, function(key, city) {
                            // $('select[name="city_id"]').append('<option value="' + city
                            //     .id + '" value={{ $store->city_id }}>' + city.name + '</option>');

                            var option = $('<option>', {
                                value: city.id,
                                text: city.name
                            });

                            // Check if the city's ID matches the $store->city_id and mark it as selected
                            if (city.id == {{ $store->city_id }}) {
                                option.prop('selected', true);
                            }

                            $('select[name="city_id"]').append(option);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            // When the "city" dropdown value changes
            $('select[name="city_id"]').on('change', function() {
                var cityId = $(this).val(); // Get the selected city ID

                console.log(cityId);

                // Make an AJAX request to fetch neighborhoods based on the selected governorate
                $.ajax({
                    url: '/admin/get-neighborhoods',
                    method: 'GET',
                    data: {
                        city_id: cityId
                    },
                    success: function(response) {
                        // Clear the current neighborhood options
                        $('select[name="neighborhood_id"]').empty();
                        $('select[name="neighborhood_id"]').append(
                            '<option disabled selected>أختار  المنطقة</option>');

                        $.each(response.neighborhoods, function(key, neighborhood) {
                            $('select[name="neighborhood_id"]').append(
                                '<option value="' +
                                neighborhood.id + '">' + neighborhood.name +
                                '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endpush
