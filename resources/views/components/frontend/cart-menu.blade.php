<div class="cart-items" id="cartContainer">
    <a href="javascript:void(0)" class="main-btn">
        <i class="lni lni-cart"></i>
        <span class="total-items" id="total-items">{{ $items->count() }}</span>
    </a>
    <!-- Shopping Item -->
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span>{{ $items->count() }} {{ trans('front_home_trans.Items') }}</span>
            <a href="{{ Route('cart.index') }}">{{ trans('front_home_trans.View_Cart') }}</a>
        </div>
        <ul class="shopping-list">
            @foreach ($items as $item)
                <li>
                    <a href="javascript:void(0)" class="remove remove-item" data-id="{{ $item->id }}"
                        title="Remove this item"><i class="lni lni-close"></i></a>
                    <div class="cart-img-head">
                        <a class="cart-img"
                            href="{{ Route('products.show_product', [$item->product->id, $item->product->slug]) }}"><img
                                src="{{ $item->product->image_url }}" alt="#"></a>
                    </div>

                    <div class="content">
                        <h4><a href="{{ Route('products.show_product', [$item->product->id, $item->product->slug]) }}">
                                {{ $item->product->name }}</a></h4>
                        <p class="quantity">{{ $item->quantity }}
                            <span class="amount">{{ Currency::format($item->product->price) }}</span>
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="bottom">
            <div class="total">
                <span>{{ trans('front_home_trans.Total') }}</span>
                <span class="total-amount">{{ Currency::format($total) }}</span>
            </div>
            <div class="button">
                <a href="{{ Route('checkout.create') }}"
                    class="btn animate">{{ trans('front_home_trans.Checkout') }}</a>
            </div>
        </div>
    </div>
    <!--/ End Shopping Item -->
</div>
