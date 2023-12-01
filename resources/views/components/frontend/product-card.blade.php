<!-- Start Single Product -->

<div class="single-product" style="{{ App::getLocale() == 'ar' ? 'direction: rtl;' : 'direction: ltr;' }}">
    <div class="product-image">
        <img src="{{ $product->image_url }}" height="200" width="200" alt="#">
        @if ($product->sale_percent)
            <span class="sale-tag"> - {{ Currency::convertNumberToArabic($product->sale_percent) }} %</span>
        @endif
        <div class="button">
            <a href="{{ Route('products.show_product', $product->slug) }}" class="btn">
                {{ trans('front_home_trans.Show_Product') }}
            </a>

        </div>
        @if ($product->quantity == 0)
            <span class="out-of-stock"> Out Of Stock</span>
        @endif
    </div>
    <div class="product-info">

        <h4 class="title">
            <a href="{{ Route('products.show_product', $product->slug) }}">
                {{ $product->name }}
            </a>

        </h4>


        <span class="category">{{ trans('front_home_trans.Category') }} :
            <a href="{{ route('shop_grid.index', ['categoryId' => $product->category->id]) }}">
                {{ $product->category->name }}
            </a>
        </span>

        <span class="category">{{ trans('front_home_trans.Store') }} :
            <a href="{{ route('shop_grid.indexStore', ['storeId' => $product->store->id]) }}">
                {{ $product->store->name }}
            </a>
        </span>

        {{-- <span class="category">{{ trans('home_trans.Store') }} :{{ $product->store->name }} </span> --}}



        @php
            $product_reviews = App\Models\Review::where('product_id', $product->id)->get('rating');
            $total_reviews = count($product_reviews);
            $sum_ratings = 0;
            foreach ($product_reviews as $review) {
                $sum_ratings += $review->rating;
            }
            $average_rating = $total_reviews > 0 ? $sum_ratings / $total_reviews : 0;
        @endphp

        <ul class="review">
            <?php for ($i = 1; $i <= $average_rating; $i++): ?>
            <li><i class="lni lni-star-filled"></i></li>
            <?php endfor; ?>

            <?php for ($i = 1; $i <= 5 - $average_rating; $i++): ?>
            <li><i class="lni lni-star"></i></li>
            <?php endfor; ?>

            <li><span>{{ $average_rating }}.0 {{ trans('front_home_trans.Review(s)') }}</span></li>
        </ul>

        <div class="price">
            <span>{{ Currency::format($product->price) }}</span>
            @if ($product->compare_price)
                <span class="discount-price">{{ Currency::format($product->compare_price) }}</span>
            @endif
        </div>
    </div>
</div>
<!-- End Single Product -->
