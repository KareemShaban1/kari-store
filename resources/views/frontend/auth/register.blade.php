<x-front-layout>

    @php
        $destinations = App\Models\Destination::all();
    @endphp
    <x-slot name="breadcrumbs">


        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">{{ trans('auth_trans.Register') }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ Route('home') }}"><i class="lni lni-home"></i>
                                    {{ trans('auth_trans.Home') }}</a></li>
                            <li>{{ trans('auth_trans.Register') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    </x-slot>





    <!-- Start Account Register Area -->
    <div class="account-login section">

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-6 col-md-12  col-12">
                    <x-backend.alert />

                    <div class="register-form">
                        <div class="title">
                            <h3>{{ trans('auth_trans.Register') }}</h3>
                            <p>{{ trans('auth_trans.Registration takes less than a minute but gives you full control over your orders.') }}
                            </p>
                        </div>

                        <x-frontend.alert type="error" />


                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-fn">{{ trans('auth_trans.First_Name') }}</label>
                                    <input class="form-control" type="text" name="first_name" id="reg-fn">

                                </div>
                            </div>

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-fn">{{ trans('auth_trans.Last_Name') }}</label>
                                    <input class="form-control" type="text" name="last_name" id="reg-fn">
                                </div>

                            </div>

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">{{ trans('auth_trans.Email_Address') }}</label>
                                    <input class="form-control" type="email" name="email_address" id="reg-email">

                                </div>
                            </div>

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass">{{ trans('auth_trans.Password') }}</label>
                                    <input class="form-control" type="password" name="password" id="reg-pass">
                                </div>

                            </div>

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-phone">{{ trans('auth_trans.Phone_Number') }}</label>
                                    <input class="form-control" type="text" name="phone_number">

                                </div>
                            </div>

                            {{-- <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">Governorate</label>
                                    <input class="form-control" type="text" name="governorate">
                                    @error('governorate')
                                        <div class="alert alert-danger">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">City</label>
                                    <input class="form-control" type="text" name="city">
                                    @error('city')
                                        <div class="alert alert-danger">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div> --}}


                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="governorate_id" id="" class="custom-select mr-sm-2">

                                            <option disabled selected> {{ trans('auth_trans.Choose_Governorate') }}
                                            </option>
                                            @foreach ($destinations as $destination)
                                                @if ($destination->rank == '1')
                                                    <option value="{{ $destination->id }}">{{ $destination->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="city_id" id="" class="custom-select mr-sm-2">
                                            <option disabled selected> {{ trans('auth_trans.Choose_City') }}</option>

                                        </select>

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="neighborhood_id" class="custom-select mr-sm-2">
                                            <option disabled selected> {{ trans('auth_trans.Choose_Neighborhood') }}
                                            </option>

                                        </select>

                                    </div>
                                </div>

                            </div>




                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">{{ trans('auth_trans.Postal_Code') }}</label>
                                    <input class="form-control" type="text" name="postal_code">


                                </div>
                            </div>


                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">{{ trans('auth_trans.Street_Address') }}</label>
                                    <input class="form-control" type="text" name="street_address">

                                </div>
                            </div>



                            <div class="button">
                                <button class="btn" type="submit">{{ trans('auth_trans.Register') }}</button>
                            </div>

                            <p class="outer-link">{{ trans('auth_trans.Already have an account?') }}
                                <a href="{{ route('login') }}">{{ trans('auth_trans.Login Now') }}</a>

                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Register Area -->

    @push('scripts')
        <script>
            $(document).ready(function() {
                // When the "governorate" dropdown value changes
                $('select[name="governorate_id"]').on('change', function() {
                    var governorateId = $(this).val(); // Get the selected governorate ID

                    console.log(governorateId);

                    // Make an AJAX request to fetch cities based on the selected governorate
                    $.ajax({
                        url: '/user/get-cities',
                        method: 'GET',
                        data: {
                            governorate_id: governorateId
                        },
                        success: function(response) {
                            // Clear the current city options
                            $('select[name="city_id"]').empty();
                            $('select[name="city_id"]').append(
                                '<option disabled selected>أختار من القائمة</option>');

                            $.each(response.cities, function(key, city) {
                                $('select[name="city_id"]').append('<option value="' + city
                                    .id + '">' + city.name + '</option>');
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
                        url: '/user/get-neighborhoods',
                        method: 'GET',
                        data: {
                            city_id: cityId
                        },
                        success: function(response) {
                            // Clear the current neighborhood options
                            $('select[name="neighborhood_id"]').empty();
                            $('select[name="neighborhood_id"]').append(
                                '<option disabled selected>أختار من القائمة</option>');

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

</x-front-layout>
