<x-front-layout title="{{ config('app.name') }}">

    @push('styles')
    @endpush

    <div class="row">
        <div class="col-xl-5 col-12 m-3">
            <div class="card card-statistics h-100">
                <div class="p-4 text-center bg" style="background-image: url('{{ $store->cover_image_url }}')">
                    <h5 class="mb-70 text-white position-relative">{{ $store->name }}</h5>
                    <div class="btn-group info-drop">
                        <button type="button" class="dropdown-toggle-split text-white" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="text-primary ti-files"></i> Add task</a>
                            <a class="dropdown-item" href="#"><i class="text-dark ti-pencil-alt"></i> Edit
                                Profile</a>
                            <a class="dropdown-item" href="#"><i class="text-success ti-user"></i> View
                                Profile</a>
                            <a class="dropdown-item" href="#"><i class="text-secondary ti-info"></i> Contact
                                Info</a>
                        </div>
                    </div>
                </div>
                <div class="card-body text-center position-relative">
                    <div class="avatar-top">
                        <img class="img-fluid w-25 rounded-circle " src="{{ $store->logo_image_url }}" alt="">
                    </div>
                    <div class="row">
                        <div class="col-4 col-sm-4 mt-20">
                            <b>Products</b>
                            <h4 class="text-success mt-10">{{ $store->products->count() }}</h4>
                        </div>
                        <div class="col-4 col-sm-4 mt-20">
                            <b>orders </b>
                            <h4 class="text-danger mt-10">{{ $store->orders->count() }}</h4>
                        </div>
                        <div class="col-4 col-sm-4 mt-20">
                            <b>Rating</b>
                            <h4 class="text-warning mt-10"></h4>
                        </div>
                    </div>
                    <div class="divider mt-20"></div>
                    <p class="mt-20">{{ $store->street_address }}</p>
                    {{-- <p class="mt-10"></p> --}}
                    <div class="social-icons color-icon mt-20">
                        <ul>
                            <li class="social-facebook"><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                            <li class="social-twitter"><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li class="social-instagram"><a href="#"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <!-- Product cards section -->
            <div class="row" style="height: 500px; overflow-y: auto;">
                @foreach ($store->products as $product)
                    <div class="col-lg-4 col-md-6 col-12">
                        <x-frontend.product-card :product="$product" />
                    </div>
                @endforeach
            </div>
        </div>


    </div>

    @push('scripts')
    @endpush

</x-front-layout>
