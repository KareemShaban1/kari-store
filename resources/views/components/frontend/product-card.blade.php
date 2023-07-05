<!-- Start Single Product -->
<div class="single-product">
    <div class="product-image">
        <img src="{{ $product->image_url }}" height="200" width="200" alt="#">
        @if ($product->sale_percent)
            <span class="sale-tag">- {{ $product->sale_percent }} %</span>
        @endif
        <div class="button">
            <a href="{{ Route('products.show_product', $product->slug) }}" class="btn">
                <i class="lni lni-cart"></i> Add to Cart</a>
        </div>
    </div>
    <div class="product-info">
        <span class="category"> {{ $product->category->name }} </span>
        <span class="category">{{ $product->store->name }} </span>

        <h4 class="title">
            <a href="{{ Route('products.show_product', $product->slug) }}">
                {{ $product->name }}
            </a>
            {{-- <span class="category">
                {{ \App\Models\Vendor::where('store_id', $product->store->id)->value('name') }}
            </span> --}}
        </h4>

        @php
            $product_reviews = App\Models\Review::where('product_id', $product->id)->
            get('rating');
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

            <li><span>{{ $average_rating }}.0 Review(s)</span></li>
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
