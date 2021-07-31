@php
$productPromotion = $modelProduct->start()->setRandom()->setLimit(sc_config('product_viewed'))->getData()
@endphp
@if (!empty($productPromotion))

<div class="container-indent">
  <div class="container container-fluid-custom-mobile-padding">
    <div class="tt-block-title">
      <h1 class="tt-title">{{ trans('front.products_special') }}</h1>
    </div>
    <div class="row tt-layout-product-item">
      @foreach ($productPromotion as $key => $product)
      <div class="col-6 col-md-4 col-lg-3">
        <div class="tt-product thumbprod-center">
          <div class="tt-image-box">
            <a href="{{ $product->getUrl() }}" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
            <a href="javascript:;" onClick="addToCartAjax('{{ $product->id }}','wishlist','{{ $product->store_id }}')" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
            <a href="javascript:;" onClick="addToCartAjax('{{ $product->id }}','compare','{{ $product->store_id }}')" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
            <a href="{{ $product->getUrl() }}">
              <span class="tt-img"><img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($product->getThumb()) }}" alt="{{ $product->name }}"></span>
              <span class="tt-img-roll-over"><img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($product->getThumb()) }}" alt="{{ $product->name }}"></span>
              @if ($product->price != $product->getFinalPrice() && $product->kind != SC_PRODUCT_GROUP)
                <span class="tt-label-location">
                  <span class="tt-label-sale">Sale</span>
                </span>
              @endif
            </a>
          </div>
          <div class="tt-description">
            <div class="tt-row">
              <ul class="tt-add-info">
                <li><a href="{{$product->categories[0]->getUrl()}}">{{$product->categories[0]->getTitle()}}</a></li>
              </ul>
            </div>
            <h2 class="tt-title"><a href="{{ $product->getUrl() }}">{{ $product->name }}</a></h2>
            {!! $product->showPrice() !!}
            <div class="tt-product-inside-hover">
              <div class="tt-row-btn">
                <a href="javascript:;" onClick="addToCartAjax('{{ $product->id }}','default','{{ $product->store_id }}')" class="tt-btn-addtocart thumbprod-button-bg">{{trans('front.add_to_cart')}}</a>
              </div>
              <div class="tt-row-btn">
                <a href="{{ $product->getUrl() }}" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                <a href="javascript:;" onClick="addToCartAjax('{{ $product->id }}','wishlist','{{ $product->store_id }}')" class="tt-btn-wishlist"></a>
                <a href="javascript:;" onClick="addToCartAjax('{{ $product->id }}','compare','{{ $product->store_id }}')" class="tt-btn-compare"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!--/product special-->
@endif

