@switch($kind)
    @case(SC_PRODUCT_GROUP)
        <h5 class="review-item_author">{!! trans('product.price_group_chose') !!}</h5>
        @break
    @default
        @if ($price == $priceFinal)
            <div class="prd-block_price--actual">{!! sc_currency_render($price) !!}</div>
        @else
            <div class="prd-block_price--actual">{!! sc_currency_render($priceFinal) !!}</div>
            <div class="prd-block_price-old-wrap">
                <span class="prd-block_price--old">{!!  sc_currency_render($price) !!}</span>
            </div>
        @endif
@endswitch