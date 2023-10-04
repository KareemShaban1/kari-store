<!-- Start Single Product -->
<div class="single-product">
    <div class="product-image">
        <img src="{{ $variant->image_url }}" height="200" width="200" alt="#">
        @if ($variant->sale_percent)
            <span class="sale-tag"> - {{ Currency::convertNumberToArabic($variant->sale_percent) }} %</span>
        @endif
        <div class="button">
            <a href="{{ Route('products.show_product', $variant->product->slug) }}" class="btn">
                {{-- <i class="lni lni-cart"></i> --}}
                {{ trans('home_trans.Show_Product') }}
            </a>
        </div>
    </div>
    <div class="product-info">



        <span class="category">{{ trans('home_trans.Category') }} :
            <a href="{{ route('shop_grid.index', ['categoryId' => $variant->product->category->id]) }}">
                {{ $variant->product->category->name }}
            </a>
        </span>

        <span class="category">{{ trans('home_trans.Store') }} :
            <a href="{{ route('shop_grid.indexStore', ['storeId' => $variant->product->store->id]) }}">
                {{ $variant->product->store->name }}
            </a>
        </span>

        {{-- <span class="category">{{ trans('home_trans.Store') }} :{{ $variant->store->name }} </span> --}}

        <h4 class="title">
            <a href="{{ Route('products.show_product', $variant->product->slug) }}">
                {{ $variant->product->name }}
            </a>

        </h4>

        @php
            $variant_reviews = App\Models\Review::where('product_id', $variant->product->id)->get('rating');
            $total_reviews = count($variant_reviews);
            $sum_ratings = 0;
            foreach ($variant_reviews as $review) {
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

            <li><span>{{ $average_rating }}.0 {{ trans('home_trans.Review(s)') }}</span></li>
        </ul>

        <div class="price">
            <span>{{ Currency::format($variant->price) }}</span>
            @if ($variant->compare_price)
                <span class="discount-price">{{ Currency::format($variant->compare_price) }}</span>
            @endif
        </div>
    </div>
</div>
<!-- End Single Product -->
