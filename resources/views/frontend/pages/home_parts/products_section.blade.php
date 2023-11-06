   {{-- New products --}}
   @if (
       $websiteParts['parts']['Trending Product Section'] ??
           null && $websiteParts['parts']['Trending Product Section'] == 1)

       <!-- Start Trending Product Area -->
       {{-- <section class="trending-product section">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="section-title">
                           <h2>{{ trans('front_home_trans.New_Products') }}</h2>

                       </div>
                   </div>
               </div>
               <div class="row">
                   @foreach ($products as $product)
                       <div class="col-lg-3 col-md-6 col-12">
                           <x-frontend.product-card :product="$product" />
                       </div>
                   @endforeach

               </div>
           </div>
       </section> --}}
       <!-- End Trending Product Area -->

       <!-- Start Products Area -->
       <div class="products-slider" style="direction: ltr">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12 offset-lg-12 col-md-12 col-12">
                       <div class="section-title">
                           <h2>{{ trans('front_home_trans.Products') }}</h2>
                       </div>
                   </div>
               </div>

               <div class="products-slider-logo-wrapper">
                   <div class="products-slider-logo-carousel d-flex align-items-center justify-content-between">

                       @foreach ($all_products as $product)
                           <div class="col-lg-3 col-md-6 col-12">
                               <x-frontend.product-card :product="$product" />
                           </div>
                       @endforeach
                       {{-- @foreach ($all_products as $product)
                           <div class="products-logo">
                               <img src="{{ $product->image_url }}" alt="#">
                               <p>{{ $product->name }}</p>
                           </div>
                       @endforeach --}}

                   </div>
               </div>
           </div>
       </div>
       <!-- End Brands Area -->

   @endif
