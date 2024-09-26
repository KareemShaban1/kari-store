 <!-- Start stores Area -->
 <div class="stores" style="direction: ltr; padding:30px; margin:30px 0px;">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 offset-lg-12 col-md-12 col-12">
                 <div class="section-title">
                     <h2>{{ trans('front_home_trans.Stores') }}</h2>
                 </div>
             </div>
         </div>

         <div class="stores-logo-wrapper">
             <div class="stores-logo-carousel d-flex align-items-center justify-content-between">

                 @foreach ($stores as $store)
                     <div class="stores-logo">
                         <a href="{{ route('shop.index', $store->id) }}">
                             <img src="{{ $store->logo_image_url }}" alt="#" style="margin-bottom: 10px;">
                             <p>{{ $store->name }}</p>
                         </a>
                     </div>
                 @endforeach

             </div>
         </div>
     </div>
 </div>
 <!-- End stores Area -->
