<x-front-layout title="{{ $variant->product->name }}">

    <x-slot name="breadcrumbs">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">{{ $variant->product->name }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href=""><i class="lni lni-home"></i> Home</a></li>
                            <li><a href="">Shop</a></li>
                            <li>{{ $variant->product->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-frontend.alert type="error" />

    <x-frontend.alert type="success" />

    <!-- Start Item Details -->
    <section class="item-details section">
        <div class="container">

            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="{{ asset($variant->image_url) }}" id="current" alt="#">
                                </div>
                                <div class="images">
                                    <img src="{{ asset($variant->image_url) }}" class="img" alt="#">
                                    <img src="https://via.placeholder.com/1000x670" class="img" alt="#">
                                    <img src="https://via.placeholder.com/1000x670" class="img" alt="#">
                                    <img src="https://via.placeholder.com/1000x670" class="img" alt="#">
                                    {{-- <img src="https://via.placeholder.com/1000x670" class="img" alt="#"> --}}
                                    {{-- <img src="https://via.placeholder.com/1000x670" class="img" alt="#"> --}}
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title text-center">{{ $variant->product->name }}</h2>
                            <p class="category">
                                <i class="lni lni-tag"></i> {{ $variant->product->category->name }}
                            </p>
                            <h3 class="price">{{ Currency::format($variant->price) }}
                                @if ($variant->compare_price)
                                    <span class="text-danger">{{ Currency::format($variant->compare_price) }}</span>
                                @endif
                            </h3>
                            <p class="info-text">{!! $variant->description !!}</p>

                            <div class="row">
                                <div class="col-md 6">
                                    {{ $variant->attribute->name }}
                                </div>

                                <div class="col-md 6">
                                    {{ $variant->attribute_value->name }}
                                </div>
                            </div>

                            <form action="{{ Route('cart.store') }}" method="post">
                                @csrf

                                <input type="hidden" name="product_id" value="{{ $variant->product->id }}">
                                <input type="hidden" name="variant_id" value="{{ $variant->id }}">

                                <div class="row">
                                    {{-- <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group color-option">
                                            <label class="title-label" for="size">Choose color</label>
                                            <div class="single-checkbox checkbox-style-1">
                                                <input type="checkbox" id="checkbox-1" checked>
                                                <label for="checkbox-1"><span></span></label>
                                            </div>
                                            <div class="single-checkbox checkbox-style-2">
                                                <input type="checkbox" id="checkbox-2">
                                                <label for="checkbox-2"><span></span></label>
                                            </div>
                                            <div class="single-checkbox checkbox-style-3">
                                                <input type="checkbox" id="checkbox-3">
                                                <label for="checkbox-3"><span></span></label>
                                            </div>
                                            <div class="single-checkbox checkbox-style-4">
                                                <input type="checkbox" id="checkbox-4">
                                                <label for="checkbox-4"><span></span></label>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group quantity">
                                            <label for="color">Quantity</label>
                                            <select class="form-control" name="quantity">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>


                                <div class="bottom-content">
                                    <div class="row align-items-end">

                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="button cart-button">
                                                <button class="btn" type="submit" style="width: 100%;">Add to
                                                    Cart</button>
                                            </div>
                                        </div>

                                        {{-- <div class="col-lg-4 col-md-4 col-12">
                                            <div class="wish-button">
                                                <button class="btn"><i class="lni lni-reload"></i> Compare</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="wish-button">
                                                <button class="btn"><i class="lni lni-heart"></i> To
                                                    Wishlist</button>
                                            </div>
                                        </div> --}}

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                @foreach ($variant->product_variants as $variant)
                    <div class="col-lg-3 col-md-6 col-12">
                        <x-frontend.product-variant-card :variant="$variant" />
                    </div>
                @endforeach

            </div> --}}

            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>Details</h4>
                                <p>{!! $variant->description !!}</p>
                                <h4>Features</h4>
                                <ul class="features">
                                    <li>Capture 4K30 Video and 12MP Photos</li>
                                    <li>Game-Style Controller with Touchscreen</li>
                                    <li>View Live Camera Feed</li>
                                    <li>Full Control of HERO6 Black</li>
                                    <li>Use App for Dedicated Camera Operation</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="info-body">

                                <h4>Specifications</h4>
                                <ul class="normal-list">
                                    @php
                                        $variant->product_properties = App\Models\ProductProperty::where('product_id', $variant->product->id)->first();
                                    @endphp
                                    @if ($variant->product_properties)
                                        <li>
                                            <span>{{ $variant->product_properties->name }}: </span>
                                            {{ $variant->product_properties->value }}
                                        </li>
                                    @endif
                                </ul>


                                {{-- <h4>Shipping Options:</h4>
                                <ul class="normal-list">
                                    <li><span>Courier:</span> 2 - 4 days, $22.50</li>
                                    <li><span>Local Shipping:</span> up to one week, $10.00</li>
                                    <li><span>UPS Ground Shipping:</span> 4 - 6 days, $18.00</li>
                                    <li><span>Unishop Global Export:</span> 3 - 4 days, $25.00</li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <x-frontend.reviews :reviews="$reviews" /> --}}

            </div>


        </div>
    </section>
    <!-- End Item Details -->

    <!-- Add Review Modal -->
    <div class="modal fade review-modal" id="AddReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leave a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <form action="{{ Route('reviews.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        {{-- <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="review-name">Your Name</label>
                                  
                                  <input class="form-control" name="name" value="{{ old('name', Auth::user() ? Auth::user()->first_name . ' ' . Auth::user()->last_name : '') }}" type="text" id="review-name" required>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="review-email">Your Email</label>
                                  <input class="form-control" type="email"
                                  name="email" value="{{ old('email', Auth::user() ? Auth::user()->email_address : '') }}"
                                  id="review-email" required>
                              </div>
                          </div>
                      </div> --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="review-rating">Rating</label>
                                    <select class="form-control" name="rating" id="review-rating">
                                        <option value="5">5 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="2">2 Stars</option>
                                        <option value="1">1 Star</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="review-message">Review</label>
                            <textarea class="form-control" name="review" id="review-message" rows="8" required></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="product_id" value="{{ $variant->product->id }}">
                    <div class="modal-footer button">
                        <button type="submit" class="btn">Submit Review</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- End Add Review Modal -->


    <!-- Edit Review Modal -->
    <div class="modal fade add-review-modal" id="EditReviewModal" tabindex="-1"
        aria-labelledby="AddReviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddReviewModalLabel">Leave a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        {{-- <div class="row">
                       <div class="col-sm-6">
                           <div class="form-group">
                               <label for="review-name">Your Name</label>
                               
                               <input class="form-control" name="name" value="{{ old('name', Auth::user() ? Auth::user()->first_name . ' ' . Auth::user()->last_name : '') }}" type="text" id="review-name" required>
                           </div>
                       </div>
                       <div class="col-sm-6">
                           <div class="form-group">
                               <label for="review-email">Your Email</label>
                               <input class="form-control" type="email"
                               name="email" value="{{ old('email', Auth::user() ? Auth::user()->email_address : '') }}"
                               id="review-email" required>
                           </div>
                       </div>
                   </div> --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="review-rating">Rating</label>
                                    <select class="form-control" name="rating" id="review-rating">
                                        <option value="5">5 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="2">2 Stars</option>
                                        <option value="1">1 Star</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="review-message">Review</label>
                            <textarea class="form-control" name="review" id="review-message" rows="8" required>
                                {{-- {{$review->rating}} --}}
                            </textarea>
                        </div>
                    </div>
                    <input type="hidden" name="product_id" value="{{ $variant->product->id }}">
                    <div class="modal-footer button">
                        <button type="submit" class="btn">Submit Review</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- End Edit Review Modal -->


    @push('scripts')
        <script type="text/javascript">
            const current = document.getElementById("current");
            const opacity = 0.6;
            const imgs = document.querySelectorAll(".img");
            imgs.forEach(img => {
                img.addEventListener("click", (e) => {
                    //reset opacity
                    imgs.forEach(img => {
                        img.style.opacity = 1;
                    });
                    current.src = e.target.src;
                    //adding class 
                    //current.classList.add("fade-in");
                    //opacity
                    e.target.style.opacity = opacity;
                });
            });
        </script>
    @endpush
</x-front-layout>
