   {{-- New products --}}
   @if (
       $websiteParts['parts']['Trending Product Section'] ??
           null && $websiteParts['parts']['Trending Product Section'] == 1)

       <!-- Start Trending Product Area -->
       <section class="trending-product section">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="section-title">
                           <h2>{{ trans('front_home_trans.New_Products') }}</h2>
                           {{-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                  suffered alteration in some form.</p> --}}
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
       </section>
       <!-- End Trending Product Area -->

   @endif
