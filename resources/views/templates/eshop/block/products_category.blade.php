@php
$categries_array = explode(",",$layout->products_category);
$categries = $modelCategory->whereIn('alias', $categries_array)->get();
@endphp

@if ($categries->count() == 1)
  @php
  session()->put('cat_one', $categries[0]->id);
  $productPromotion = $modelProduct->start()->getProductToCategory(session()->get('cat_one'))->setLimit(sc_config('product_viewed'))->getData();

  @endphp
  @if (!empty($productPromotion))
  <div class="container-indent">
    <div class="container container-fluid-custom-mobile-padding">
      <div class="tt-block-title">
      <h1 class="tt-title">{{ trans('front.products_special') }} {{$categries->count()}} {{$categries[0]->alias}}</h1>
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
@elseif ($categries->count() > 1)

<div class="container-indent">
  <div class="container container-fluid-custom-mobile-padding">
    <ul class="nav nav-tabs tt-tabs-default" role="tablist">
      @foreach ($categries as $icat => $cat)
      @php
      session()->put('cat_many', $cat->id);
      $productPromotion = $modelProduct->start()->whereHas('categories',function ($q){
                $q->where('id',[session()->get('cat_many')]);
            })->limit(sc_config('product_viewed'))->get()->first();
      @endphp

      <li class="nav-item">
        <a class="nav-link @if($icat == 0) active @endif" data-toggle="tab" href="#tt-tab{{$layout->id}}-{{$cat->id}}">{{$productPromotion->categories[0]->getTitle()}}</a>
      </li> 
      @endforeach
      
    </ul>
    <div class="tab-content">
      @foreach ($categries as $icat => $cat)
      @php
      session()->put('cat_many', $cat->id);
      // $productPromotion = $modelProduct->whereHas('categories',function ($q){
      //           $q->where('id',[session()->get('cat_many')]);
      //       })->with('descriptions')->limit(sc_config('product_viewed'))->get();
            $productPromotion = $modelProduct->start()->getProductToCategory(session()->get('cat_many'))->setLimit(sc_config('product_viewed'))->getData()

      @endphp
      <div class="tab-pane @if($icat == 0) active @endif" id="tt-tab{{$layout->id}}-{{$cat->id}}">
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
        <div class="text-center tt_product_showmore">
          <a href="{{$product->categories[0]->getUrl()}}" class="btn btn-border">More Products</a>
        </div>
        <br>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endif




