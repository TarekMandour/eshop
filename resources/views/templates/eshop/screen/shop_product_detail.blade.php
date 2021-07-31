@php
/*
$layout_page = shop_product_detail
**Variables:**
- $product: no paginate
- $productRelation: no paginate
*/
@endphp

@extends($sc_templatePath.'.layout')

{{-- block_main --}}
@section('block_main')
@php
    $countItem = 0
@endphp

<div class="container-indent">
  <!-- mobile product slider  -->
  <div class="tt-mobile-product-layout visible-xs">
    <div class="tt-mobile-product-slider arrow-location-center slick-animated-show-js">
      @if ($product->images->count())
      @php
        $countItem = 1 + $product->images->count();
      @endphp
      @foreach ($product->images as $key=>$image)
      <div><img src="{{ sc_file($image->getImage()) }}" alt="{{ $product->name }}"></div>
      @endforeach
      @else
      <div><img src="{{ sc_file($product->getImage()) }}" alt="{{ $product->name }}"></div>
      @endif
    </div>
  </div>

  <!-- /mobile product slider  -->
  <div class="container container-mobile-airSticky">
    <div class="row airSticky_stop-block">
      <div class="col-6 hidden-xs">
        <div class="airSticky">
          <div class="tt-product-vertical-layout">
            <div class="tt-product-single-img">
              <div>
                <img class="zoom-product" src='{{ sc_file($product->getImage()) }}' data-zoom-image="{{ sc_file($product->getImage()) }}" alt="{{ $product->name }}">
                <button class="tt-btn-zomm tt-top-right"><i class="icon-f-86"></i></button>
              </div>
            </div>
            <div class="tt-product-single-carousel-vertical">
              <ul id="smallGallery" class="tt-slick-button-vertical slick-animated-show-js">
                <li><a class="zoomGalleryActive" href="#" data-image="{{ sc_file($product->getImage()) }}" data-zoom-image="{{ sc_file($product->getImage()) }}"><img src="{{ sc_file($product->getImage()) }}" alt="{{ $product->name }}"></a></li>
                @if ($product->images->count())
                @php
                  $countItem = 1 + $product->images->count();
                @endphp
                @foreach ($product->images as $key=>$image)
                <li><a href="#" data-image="{{ sc_file($image->getImage()) }}" data-zoom-image="{{ sc_file($image->getImage()) }}"><img src="{{ sc_file($image->getImage()) }}" alt="{{ $product->name }}"></a></li>
                @endforeach
                @endif
                
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <form id="buy_block" class="product-information" action="{{ sc_route('cart.add') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="product_id" id="product-detail-id" value="{{ $product->id }}" />
          <input type="hidden" name="storeId" id="product-detail-storeId" value="{{ $product->store_id }}" />

          <div class="tt-product-single-info">
            @if (sc_config('product_stock'))
              <div class="tt-wrapper">
                <div class="tt-label">
                  @if($product->stock <=0 && !sc_config('product_buy_out_of_stock'))
                  <div class="tt-label-out-stock">{{ trans('product.out_stock') }} </div>
                  @else 
                  <div class="tt-label-new">{{ trans('product.in_stock') }}</div>
                  @endif
                </div>
              </div>
            @endif
            
            {{-- Go to store --}}
            @if (sc_config_global('MultiVendorPro') && config('app.storeId') == SC_ID_ROOT)
            
            <div class="tt-add-info">
              <ul>
                <li><span><a href="{{ $product->goToStore() }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i> {{ trans('front.store').' '. $product->store_id  }}</a></span> </li>
              </ul>
            </div>
            @endif
            {{-- End go to store --}}
            
            <h1 class="tt-title">{{ $product->name }}</h1>

            {!! $product->showPriceDetail() !!}

            <hr class="proHR">

            <div class="tt-wrapper">
              <div class="tt-add-info">
                <ul>

                  @if (sc_config('product_available') && $product->date_available >= date('Y-m-d H:i:s'))
                    <li><strong>{{ trans('product.date_available') }}:</strong> {{ $product->date_available }}</li>
                  @endif

                  @if (sc_config('product_brand') && !empty($product->brand->name))
                    <li><strong>{{ trans('product.brand') }}:</strong> {!! empty($product->brand->name) ? 'None' : '<a href="'.$product->brand->getUrl().'">'.$product->brand->name.'</a>' !!}</li>
                  @endif

                  <li><strong>SKU:</strong> {{ $product->sku }}</li>
                  @if (sc_config_global('MultiVendorPro') && config('app.storeId') == SC_ID_ROOT)
                    <li><strong><a href="{{ $product->goToStore() }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i> {{ trans('front.store').' '. $product->store_id  }}</a></strong></li>
                  @endif
                  
                  <li><strong>{{ trans('product.category') }}:</strong> @foreach ($product->categories as $category)
                    <a href="{{ $category->getUrl() }}">{{ $category->getTitle() }}</a>,
                  @endforeach</li>
                </ul>
              </div>
            </div>

            <hr class="proHR">

            {{-- Product kind --}}
            @if ($product->kind == SC_PRODUCT_GROUP)
              <div class="tt-wrapper">
                @php
                $groups = $product->groups
                @endphp
                <h6>{{ trans('product.groups') }}:</h6>
                @foreach ($groups as $group)
                  <a target=_blank href="{{ $group->product->getUrl() }}">
                      {!! sc_image_render($group->product->image) !!}
                  </a>
                @endforeach
              </div>
              <hr class="proHR">
            @endif

            @if ($product->kind == SC_PRODUCT_BUILD)
              <div class="tt-wrapper">
                @php
                  $builds = $product->builds
                @endphp
                <h6>{{ trans('product.builds') }}:</h6>
                <span class="sc-product-build">
                  {!! sc_image_render($product->image) !!} =
                </span>
                @foreach ($builds as $k => $build)
                {!! ($k) ? '<i class="fa fa-plus" aria-hidden="true"></i>':'' !!}
                <span class="sc-product-build">{{ $build->quantity }} x
                    <a target="_new" href="{{ $build->product->getUrl() }}">{!!
                        sc_image_render($build->product->image) !!}</a>
                </span>
                @endforeach
              </div>
              <hr class="proHR">
            @endif
            {{-- Product kind --}}

            <div class="tt-swatches-container">
              <form method="post" action="#">
                  <div class="prd-block_options">

                      {{-- Show attribute --}}
                      @if (sc_config('product_property'))
                      <div id="product-detail-attr">
                          @if ($product->attributes())
                          {!! $product->renderAttributeDetails() !!}
                          @endif
                      </div>
                      @endif
                      {{--// Show attribute --}}
                      
                  </div>
                  
                  {{-- Button add to cart --}}
                  @if ($product->kind != SC_PRODUCT_GROUP && $product->allowSale())
                    <div class="tt-wrapper">
                      <div class="tt-row-custom-01">
                        <div class="col-item">
                          <div class="tt-input-counter style-01">
                            <span class="minus-btn"></span>
                            <input type="text" name="qty" value="1" data-min="1" data-max="1000" size="5">
                            <span class="plus-btn"></span>
                          </div>
                        </div>
                        <div class="col-item">
                          <button type="submit" class="btn btn-lg js-trigger-addtocart js-prd-addtocart">{{ trans('front.add_to_cart') }}</button>
                        </div>
                      </div>
                    </div>
                  @endif
                  {{--// Button add to cart --}}

              </form>

            </div>

            
            <div class="tt-wrapper">
              <ul class="tt-list-btn">
                <li><a class="btn-link" href="javascript:;" onClick="addToCartAjax('{{ $product->id }}','wishlist','{{ $product->store_id }}')"><i class="icon-n-072"></i>ADD TO WISH LIST</a></li>
                <li><a class="btn-link" href="javascript:;" onClick="addToCartAjax('{{ $product->id }}','compare','{{ $product->store_id }}')"><i class="icon-n-08"></i>ADD TO COMPARE</a></li>
              </ul>
            </div>
            
            <div class="tt-collapse-block">
              <div class="tt-item active">
                <div class="tt-collapse-title">{{ trans('product.description') }}</div>
                <div class="tt-collapse-content">
                  {!! sc_html_render($product->content) !!}
                </div>
              </div>
              @if ($product->specifications != null)
              <div class="tt-item">
                <div class="tt-collapse-title">Specifications</div>
                <div class="tt-collapse-content">
                  {!! sc_html_render($product->specifications) !!}
                </div>
              </div>
              @endif
              @if ($product->condition != null)
              <div class="tt-item">
                <div class="tt-collapse-title">Condition</div>
                <div class="tt-collapse-content">
                  {!! sc_html_render($product->condition) !!}
                </div>
              </div>
              @endif
              @if ($product->delivery != null)
              <div class="tt-item">
                <div class="tt-collapse-title">Delivery & Return</div>
                <div class="tt-collapse-content">
                  {!! sc_html_render($product->delivery) !!}
                </div>
              </div>
              @endif
              @if ($product->warranty != null)
              <div class="tt-item">
                <div class="tt-collapse-title">Warranty</div>
                <div class="tt-collapse-content">
                  {!! sc_html_render($product->warranty) !!}
                </div>
              </div>
              @endif
              <div class="tt-item">
                <div class="tt-collapse-title">Reviews</div>
                <div class="tt-collapse-content">
                  {{-- Render include view --}}
                  @if (!empty($layout_page && $includePathView = config('sc_include_view.'.$layout_page, [])))
                  @foreach ($includePathView as $view)
                    @if (view()->exists($view))
                      @include($view)
                    @endif
                  @endforeach
                  @endif
                  {{--// Render include view --}}
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<br>
<br><br>
<br>
<div class="container-indent wrapper-social-icon">
  <div class="container">
    <ul class="tt-social-icon justify-content-center">
      @if (sc_store('facebook') != null)
      <li>
          <a class="icon-g-64" target="_blank" href="{{sc_store('facebook')}}"></a>
      </li>
      @endif
      @if (sc_store('twitter') != null)
      <li>
          <a class="icon-h-58" target="_blank" href="{{sc_store('twitter')}}"></a>
      </li>
      @endif
      @if (sc_store('youtube') != null)
      <li>
          <a class="icon-g-76" target="_blank" href="{{sc_store('youtube')}}"></a>
      </li>
      @endif
      @if (sc_store('instagram') != null)
      <li>
          <a class="icon-g-67" target="_blank" href="{{sc_store('instagram')}}"></a>
      </li>
      @endif
      @if (sc_store('snapchat') != null)
      <li>
          <a class="mdi mdi-snapchat" target="_blank" href="{{sc_store('snapchat')}}"></a>
      </li>
      @endif
      @if (sc_store('linkedin') != null)
      <li>
          <a class="icon-g-68" target="_blank" href="{{sc_store('linkedin')}}"></a>
      </li>
      @endif
    </ul>
  </div>
</div>

@if ($productRelation->count())
<div class="container-indent">
  <div class="container container-fluid-custom-mobile-padding">
    <div class="tt-block-title text-left">
      <h3 class="tt-title-small">{{trans('product.featured_products')}}</h3>
    </div>
    <div class="tt-carousel-products row arrow-location-right-top tt-alignment-img tt-layout-product-item slick-animated-show-js">
      @foreach ($productRelation as $key => $product_rel)
      <div class="col-2 col-md-4 col-lg-3">
        <div class="tt-product thumbprod-center">
          <div class="tt-image-box">
            <a href="{{ $product_rel->getUrl() }}" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
            <a href="javascript:;" onClick="addToCartAjax('{{ $product_rel->id }}','wishlist','{{ $product_rel->store_id }}')" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
            <a href="javascript:;" onClick="addToCartAjax('{{ $product_rel->id }}','compare','{{ $product_rel->store_id }}')" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
            <a href="{{ $product_rel->getUrl() }}">
              <span class="tt-img"><img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($product_rel->getThumb()) }}" alt="{{ $product_rel->name }}"></span>
              <span class="tt-img-roll-over"><img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($product_rel->getThumb()) }}" alt="{{ $product_rel->name }}"></span>
              @if ($product_rel->price != $product_rel->getFinalPrice() && $product_rel->kind != SC_PRODUCT_GROUP)
                <span class="tt-label-location">
                  <span class="tt-label-sale">Sale</span>
                </span>
              @endif
            </a>
          </div>
          <div class="tt-description">
            <div class="tt-row">
              <ul class="tt-add-info">
                <li><a href="{{$product_rel->categories[0]->getUrl()}}">{{$product_rel->categories[0]->getTitle()}}</a></li>
              </ul>
            </div>
            <h2 class="tt-title"><a href="{{ $product_rel->getUrl() }}">{{ $product_rel->name }}</a></h2>
            {!! $product_rel->showPrice() !!}
            <div class="tt-product-inside-hover">
              <div class="tt-row-btn">
                <a href="javascript:;" onClick="addToCartAjax('{{ $product_rel->id }}','default','{{ $product_rel->store_id }}')" class="tt-btn-addtocart thumbprod-button-bg">{{trans('front.add_to_cart')}}</a>
              </div>
              <div class="tt-row-btn">
                <a href="{{ $product_rel->getUrl() }}" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                <a href="javascript:;" onClick="addToCartAjax('{{ $product_rel->id }}','wishlist','{{ $product_rel->store_id }}')" class="tt-btn-wishlist"></a>
                <a href="javascript:;" onClick="addToCartAjax('{{ $product_rel->id }}','compare','{{ $product_rel->store_id }}')" class="tt-btn-compare"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endif



<!--/product-details-->
@endsection
{{-- block_main --}}


{{-- breadcrumb --}}
@section('breadcrumb')
<div class="tt-breadcrumb">
  <div class="container">
      <ul>
          <li><a href="{{ sc_route('home') }}">{{ trans('front.home') }}</a></li>
          <li>{{ $title ?? '' }}</li>
      </ul>
  </div>
</div>
@endsection
{{-- //breadcrumb --}}


@push('styles')
{{-- Your css style --}}
@endpush

@push('scripts')
{{-- Render include script --}}
@if (!empty($layout_page) && $includePathScript = config('sc_include_script.'.$layout_page, []))
@foreach ($includePathScript as $script)
  @if (view()->exists($script))
    @include($script)
  @endif
@endforeach
@endif
{{--// Render include script --}}
@endpush
