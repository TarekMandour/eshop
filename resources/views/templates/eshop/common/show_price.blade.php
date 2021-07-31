
@switch($kind)
    @case(SC_PRODUCT_GROUP)
    <div class="tt-price">{!! trans('product.price_group') !!}</div>
        @break
    @default
        @if ($price == $priceFinal)
            <div class="tt-price">{!! sc_currency_render($price) !!}</div>
        @else
        <div class="tt-price">
            <span class="new-price">{!! sc_currency_render($priceFinal) !!}</span>
            <span class="old-price">{!!  sc_currency_render($price) !!}</span>
        </div>
        @endif
@endswitch
   