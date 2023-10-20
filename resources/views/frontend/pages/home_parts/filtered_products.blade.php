   {{-- home product list --}}
   @if (
       $websiteParts['parts']['Home Product List Section'] ??
           null && $websiteParts['parts']['Home Product List Section'] == 1)

       <!-- Start Home Product List -->
       <section class="home-product-list section">
           <div class="container">
               <div class="row">

                   @if ($websiteParts['parts']['Best Sellers'] ?? null && $websiteParts['parts']['Best Sellers'] == 1)
                       {{-- @php
                              $best_seller_products= App\Models\Product::where('product_type','=','best_seller')->active()->latest()->take(4)->get();
                              $new_arrival_products= App\Models\Product::where('product_type','=','new_arrival')->active()->latest()->take(4)->get();
                              $top_rated_products= App\Models\Product::where('product_type','=','top_rated')->active()->latest()->take(4)->get();
                          @endphp --}}
                       <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                           <h4 class="list-title">Best Sellers</h4>
                           {{-- @foreach ($best_seller_products as $best_seller_product)
                                  <!-- Start Single List -->
                                  <div class="single-list">
                                      <div class="list-image">
                                          <a href="product-grids.html">
                                              <img src="{{ $best_seller_product->image_url }}"
                                                  alt="#"></a>
                                      </div>
                                      <div class="list-info">
                                          <h3>
                                              <a href="product-grids.html">{{ $best_seller_product->name }}</a>
                                          </h3>
                                          <span>{{ $best_seller_product->price }}</span>
                                      </div>
                                  </div>
                              <!-- End Single List --> 
                              @endforeach --}}


                       </div>
                   @endif

                   @if ($websiteParts['parts']['New Arrivals'] ?? null && $websiteParts['parts']['New Arrivals'] == 1)
                       <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                           <h4 class="list-title">New Arrivals</h4>

                           {{-- @foreach ($new_arrival_products as $new_arrival_product)
                              
                                  <div class="single-list">
                                      <div class="list-image">
                                          <a href="product-grids.html">
                                              <img src="{{ $new_arrival_product->image_url }}"
                                                  alt="#"></a>
                                      </div>
                                      <div class="list-info">
                                          <h3>
                                              <a href="product-grids.html">{{ $new_arrival_product->name }}</a>
                                          </h3>
                                          <span>{{ $new_arrival_product->price }}</span>
                                      </div>
                                  </div>
                              @endforeach --}}

                       </div>
                   @endif

                   @if ($websiteParts['parts']['Top Rated'] ?? null && $websiteParts['parts']['Top Rated'] == 1)
                       <div class="col-lg-4 col-md-4 col-12">
                           <h4 class="list-title">Top Rated</h4>
                           {{-- @foreach ($top_rated_products as $top_rated_product)
                              
                                  <div class="single-list">
                                      <div class="list-image">
                                          <a href="product-grids.html">
                                              <img src="{{ $top_rated_product->image_url }}"
                                                  alt="#"></a>
                                      </div>
                                      <div class="list-info">
                                          <h3>
                                              <a href="product-grids.html">{{ $top_rated_product->name }}</a>
                                          </h3>
                                          <span>{{ $top_rated_product->price }}</span>
                                      </div>
                                  </div>
                              
                              @endforeach --}}

                       </div>
                   @endif
               </div>
           </div>
       </section>
       <!-- End Home Product List -->

   @endif
