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
                            <h1 class="page-title">Register</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ Route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                            <li>Register</li>
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
            <div class="row">
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="register-form">
                        <div class="title">
                            <h3>No Account? Register</h3>
                            <p>Registration takes less than a minute but gives you full control over your orders.</p>
                        </div>



                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-fn">First Name</label>
                                    <input class="form-control" type="text" name="first_name" id="reg-fn"
                                        required>
                                    @error('first_name')
                                        <div class="alert alert-danger">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-fn">Last Name</label>
                                    <input class="form-control" type="text" name="last_name" id="reg-fn" required>
                                </div>
                                @error('last_name')
                                    <div class="alert alert-danger">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">E-mail Address</label>
                                    <input class="form-control" type="email" name="email_address" id="reg-email"
                                        required>
                                    @error('email')
                                        <div class="alert alert-danger">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass">Password</label>
                                    <input class="form-control" type="password" name="password" id="reg-pass" required>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-phone">Phone Number</label>
                                    <input class="form-control" type="text" name="phone_number" id="reg-phone">
                                    @error('phone_number')
                                        <div class="alert alert-danger">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
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
                                        <label> governorate<span class="text-danger">*</span></label>
                                        <select name="governorate" id="" class="custom-select mr-sm-2"
                                            required>

                                            <option disabled selected>أختار من القائمة </option>
                                            @foreach ($destinations as $destination)
                                                @if ($destination->rank == '1')
                                                    <option value="{{ $destination->id }}">
                                                        {{ $destination->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('parent_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> city<span class="text-danger">*</span></label>
                                        <select name="city" id="" class="custom-select mr-sm-2"
                                            required>

                                            <option disabled>أختار من القائمة </option>
                                            @foreach ($destinations as $destination)
                                                @if ($destination->rank == '2')
                                                    <option value="{{ $destination->id }}">
                                                        {{ $destination->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('parent_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> neighburhood<span class="text-danger">*</span></label>
                                        <select name="neighborhood" id=""
                                            class="custom-select mr-sm-2" required>

                                            <option disabled>أختار من القائمة </option>
                                            @foreach ($destinations as $destination)
                                                @if ($destination->rank == '3')
                                                    <option value="{{ $destination->id }}">
                                                        {{ $destination->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('parent_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">Postal code</label>
                                    <input class="form-control" type="text" name="postal_code">
                                    @error('postal_code')
                                        <div class="alert alert-danger">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror

                                </div>
                            </div>


                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">Street Address</label>
                                    <input class="form-control" type="text" name="street_address">
                                    @error('street_address')
                                        <div class="alert alert-danger">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>



                            <div class="button">
                                <button class="btn" type="submit">Register</button>
                            </div>

                            <p class="outer-link">Already have an account? <a href="login.html">Login Now</a>

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
                $('select[name="governorate"]').on('change', function() {
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
                            $('select[name="city"]').empty();
                            $('select[name="city"]').append(
                                '<option disabled selected>أختار من القائمة</option>');

                            $.each(response.cities, function(key, city) {
                                $('select[name="city"]').append('<option value="' + city
                                    .id + '">' + city.name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });

                // When the "city" dropdown value changes
                $('select[name="city"]').on('change', function() {
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
                            $('select[name="neighborhood"]').empty();
                            $('select[name="neighborhood"]').append(
                                '<option disabled selected>أختار من القائمة</option>');

                            $.each(response.neighborhoods, function(key, neighborhood) {
                                $('select[name="neighborhood"]').append('<option value="' +
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
