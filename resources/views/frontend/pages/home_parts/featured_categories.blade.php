 {{-- featured Categories --}}
 @if (
     $websiteParts['parts']['Featured Categories Section'] ??
         null && $websiteParts['parts']['Featured Categories Section'] == 1)
     <!-- Start Featured Categories Area -->
     <section class="featured-categories section">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <div class="section-title">
                         <h2>{{ trans('home_trans.Featured Categories') }}</h2>
                         {{-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                  suffered alteration in some form.</p> --}}
                     </div>
                 </div>
             </div>
             <div class="row">
                 @foreach ($featured_categories as $featured_category)
                     <div class="col-lg-6 col-md-6 col-12">
                         <!-- Start Single Category -->
                         <div class="single-category">
                             <h3 class="heading">{{ $featured_category->name }}</h3>
                             <ul>
                                 {{-- @php
                                          dd($featured_category->children);
                                      @endphp --}}
                                 @foreach ($featured_category->children as $subcategory)
                                     <li><a href="">{{ $subcategory->name }}</a></li>
                                 @endforeach
                                 {{-- <li><a href="product-grids.html">Smart Television</a></li>
                                  <li><a href="product-grids.html">QLED TV</a></li>
                                  <li><a href="product-grids.html">Audios</a></li>
                                  <li><a href="product-grids.html">Headphones</a></li>
                                  <li><a href="product-grids.html">View All</a></li> --}}
                             </ul>
                             <div class="images">
                                 <img src="{{ $featured_category->image_url }}" height="120" width="180"
                                     alt="#">
                             </div>
                         </div>
                         <!-- End Single Category -->
                     </div>
                 @endforeach


             </div>
         </div>
     </section>
     <!-- End Features Area -->
 @endif
