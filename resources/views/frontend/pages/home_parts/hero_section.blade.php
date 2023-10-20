 <!-- Start Slider Area -->
 <section class="hero-area">
     <div class="container">
         <x-frontend.alert type="info" />
         <div class="row">

             @if ($websiteParts['parts']['Slider'] ?? null && $websiteParts['parts']['Slider'] == 1)
                 <div class="col-lg-12 col-12 custom-padding-right">
                     <div class="slider-head" style="direction: ltr">
                         <!-- Start Hero Slider -->
                         <div class="hero-slider">
                             <!-- Start Single Slider -->
                             <div class="single-slider" {{-- style="background-image:url({{ $banners["banners"]["banner_1"] }})" --}} style="background-color: aliceblue"
                                 {{-- style="background-image: url(https://via.placeholder.com/800x500);" --}}>
                                 <div class="content">
                                     <h2><span>No restocking fee ($35 savings)</span>
                                         M75 Sport Watch
                                     </h2>
                                     <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor
                                         incididunt ut
                                         labore dolore magna aliqua.</p>
                                     <h3><span>Now Only</span> $320.99</h3>
                                     <div class="button">
                                         <a href="product-grids.html" class="btn">Shop Now</a>
                                     </div>
                                 </div>
                             </div>
                             <!-- End Single Slider -->
                             <!-- Start Single Slider -->
                             <div class="single-slider"
                                 style="background-image: url(https://via.placeholder.com/800x500);">
                                 <div class="content">
                                     <h2><span>Big Sale Offer</span>
                                         Get the Best Deal on CCTV Camera
                                     </h2>
                                     <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor
                                         incididunt ut
                                         labore dolore magna aliqua.</p>
                                     <h3><span>Combo Only:</span> $590.00</h3>
                                     <div class="button">
                                         <a href="product-grids.html" class="btn">Shop Now</a>
                                     </div>
                                 </div>
                             </div>
                             <!-- End Single Slider -->
                         </div>
                         <!-- End Hero Slider -->
                     </div>
                 </div>
             @endif

         </div>
     </div>
 </section>
 <!-- End Slider Area -->
