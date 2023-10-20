   {{-- banner section --}}
   @if ($websiteParts['parts']['Banner Section'] ?? null && $websiteParts['parts']['Banner Section'] == 1)
       <!-- Start Banner Area -->
       <section class="banner section">
           <div class="container">
               <div class="row">
                   <div class="col-lg-6 col-md-6 col-12">
                       <div class="single-banner" style="background-image:url('https://via.placeholder.com/620x340')">
                           <div class="content">
                               <h2>Smart Watch 2.0</h2>
                               <p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
                               <div class="button">
                                   <a href="product-grids.html" class="btn">View Details</a>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-6 col-md-6 col-12">
                       <div class="single-banner custom-responsive-margin"
                           style="background-image:url('https://via.placeholder.com/620x340')">
                           <div class="content">
                               <h2>Smart Headphone</h2>
                               <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                                   incididunt ut labore.</p>
                               <div class="button">
                                   <a href="product-grids.html" class="btn">Shop Now</a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- End Banner Area -->
   @endif
