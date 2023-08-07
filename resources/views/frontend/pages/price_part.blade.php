<div class="col-lg-2 col-md-2 col-12" id="sub_total_{{ $cart_item->product->id }}">
          <p>{{ Currency::format($cart_item->quantity * $cart_item->product->price) }}</p>
      </div>