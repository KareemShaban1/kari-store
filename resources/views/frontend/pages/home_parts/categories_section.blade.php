 <!-- Start Categories Area -->
 <div class="categories" style="direction: ltr; padding:30px; margin:30px 0px;">
     <div>
         <div class="row">
             <div class="col-lg-12 offset-lg-12 col-md-12 col-12">
                 <div class="section-title">
                     <h2>{{ trans('front_home_trans.Categories') }}</h2>
                 </div>
             </div>
         </div>

         <div class="categories-logo-wrapper">
             <div class="categories-logo-carousel d-flex align-items-center justify-content-between">

                 @foreach ($categories as $category)
                     <div class="categories-logo">
                         <img src="{{ $category->image_url }}" alt="#" style="margin-bottom: 10px;">
                         <p>{{ $category->name }}</p>
                     </div>
                 @endforeach

             </div>
         </div>
     </div>
 </div>
 <!-- End Categories Area -->
