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
<div class="holder">
  <div class="container js-prd-gallery" id="prdGallery">

      <div class="row prd-block prd-block--prv-left">
          <div class="col-md-8 col-lg-8 aside--sticky js-sticky-collision">
              <div class="aside-content">
                  <div class="mb-2 js-prd-m-holder"></div>
                  <div class="prd-block_main-image">
                      <div class="prd-block_main-image-holder" id="prdMainImage">
                          <div class="product-main-carousel js-product-main-carousel" data-zoom-position="inner">
                              <div data-value="Beige"><span class="prd-img"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ sc_file($product->getImage()) }}" class="lazyload fade-up elzoom" alt="" data-zoom-image="{{ sc_file($product->getImage()) }}" /></span></div>
                              @if ($product->images->count())
                              @php
                                $countItem = 1 + $product->images->count();
                              @endphp
                              @foreach ($product->images as $key=>$image)
                              <div><span class="prd-img"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ sc_file($image->getImage()) }}" class="lazyload fade-up elzoom" alt="" data-zoom-image="{{ sc_file($image->getImage()) }}" /></span></div>
                              @endforeach
                              @endif
                          </div>
                      </div>
                      <div class="prd-block_main-image-links">
                        <a href="#" class="prd-block_zoom-link"><i class="icon-zoom-in"></i></a>
                      </div>
                  </div>
                  <div class="product-previews-wrapper">
                      <div class="product-previews-carousel js-product-previews-carousel" data-desktop="5" data-tablet="3">
                          
                          @if ($countItem > 1)
                              <a href="#"><span class="prd-img"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ sc_file($product->getImage()) }}" class="lazyload fade-up" alt="" /></span></a>
                              @foreach ($product->images as $key=>$image)
                              <a href="#"><span class="prd-img"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ sc_file($image->getThumb()) }}" class="lazyload fade-up" alt="" /></span></a>
                              @endforeach
                          @endif
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-10 col-lg-10 mt-1 mt-md-0">
            <form id="buy_block" class="product-information" action="{{ sc_route('cart.add') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="product_id" id="product-detail-id" value="{{ $product->id }}" />
              <input type="hidden" name="storeId" id="product-detail-storeId" value="{{ $product->store_id }}" />

              <div class="js-prd-d-holder">
                  <div class="prd-block_title-wrap">
                      <h1 class="prd-block_title">{{ $product->name }}</h1>
                      {{-- Go to store --}}
                      @if (sc_config_global('MultiVendorPro') && config('app.storeId') == SC_ID_ROOT)
                      <a href="{{ $product->goToStore() }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i> {{ trans('front.store').' '. $product->store_id  }}</a>
                      
                      @endif
                      {{-- End go to store --}}
                  </div>
              </div>

              <div class="prd-block_info prd-block_info--style1" data-prd-handle="/products/copy-of-suede-leather-mini-skirt">
                  <div class="prd-block_info-top prd-block_info_item order-0 order-md-2">
                      <div class="prd-block_price prd-block_price--style2">
                        {!! $product->showPriceDetail() !!}
                      </div>
                  </div>
                  
                  <div class="prd-block_info-box prd-block_info_item">
                      <div class="two-column">
                          @if (sc_config('product_stock'))
                              <p>{{ trans('product.stock_status') }}:
                                <span class="prd-in-stock" id="stock_status" data-stock-status="">
                                    @if($product->stock <=0 && !sc_config('product_buy_out_of_stock'))
                                    {{ trans('product.out_stock') }} 
                                    @else 
                                    {{ trans('product.in_stock') }} 
                                    @endif 
                                </span>
                              </p>
                          @endif

                          @if (sc_config('product_available') && $product->date_available >= date('Y-m-d H:i:s'))
                              <p>{{ trans('product.date_available') }}:
                                <span id="product-detail-available">
                                  {{ $product->date_available }}
                                </span>
                              </p>
                          @endif

                          @if (sc_config('product_brand') && !empty($product->brand->name))
                              <p>{{ trans('product.brand') }}:
                                <span id="product-detail-brand">
                                  {!! empty($product->brand->name) ? 'None' : '<a href="'.$product->brand->getUrl().'">'.$product->brand->name.'</a>' !!}
                              </span>
                              </p>
                          @endif

                          <p>SKU: <span id="product-detail-model">{{ $product->sku }}</span></p>
                          @if (sc_config_global('MultiVendorPro') && config('app.storeId') == SC_ID_ROOT)
                            <p> <span><a href="{{ $product->goToStore() }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i> {{ trans('front.store').' '. $product->store_id  }}</a></span></p>
                          @endif
                      </div>
                  </div>

                  <div class="prd-block_description prd-block_info_item ">
                      <h3>{{ trans('product.category') }}:</h3>
                      @foreach ($product->categories as $category)
                        <a href="{{ $category->getUrl() }}">{{ $category->getTitle() }}</a>,
                      @endforeach
                  </div>

                  {{-- Product kind --}}
                  @if ($product->kind == SC_PRODUCT_GROUP)
                    <div class="prd-block_description prd-block_info_item ">
                      @php
                      $groups = $product->groups
                      @endphp
                      <h3>{{ trans('product.groups') }}:</h3>
                      @foreach ($groups as $group)
                        <span class="sc-product-group">
                            <a target=_blank href="{{ $group->product->getUrl() }}">
                                {!! sc_image_render($group->product->image) !!}
                            </a>
                        </span>
                      @endforeach
                    </div>
                  @endif

                  @if ($product->kind == SC_PRODUCT_BUILD)
                    <div class="prd-block_description prd-block_info_item ">
                      @php
                        $builds = $product->builds
                      @endphp
                      <h3>{{ trans('product.builds') }}:</h3>
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

                  @endif
                  {{-- Product kind --}}

                  <div class="order-0 order-md-100">
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
                          <div class="prd-block_actions prd-block_actions--wishlist">
                              <div class="prd-block_qty">
                                  <div class="qty qty-changer">
                                      <button class="decrease js-qty-button"></button>
                                      <input type="number" class="qty-input" name="qty" value="1" data-min="1" data-max="1000">
                                      <button class="increase js-qty-button"></button>
                                  </div>
                              </div>
                              <div class="btn-wrap">
                                  <button type="submit" class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart">{{ trans('front.add_to_cart') }}</button>
                              </div>
                              <div class="btn-wishlist-wrap">
                                  <a onClick="addToCartAjax('{{ $product->id }}','wishlist','{{ $product->store_id }}')" class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--add js-add-wishlist" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                              </div>
                          </div>
                          @endif
                          {{--// Button add to cart --}}

                      </form>
                      <br><br>
                  </div>
              </div>
              <div class="prd-block_info prd-block_info--style1">
                  <div class="panel-group panel-group--style1 prd-block_accordion" id="productAccordion">
                      <div class="panel">
                          <div class="panel-heading active">
                              <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse2">
                                    {{ trans('product.description') }}</a>
                                  <span class="toggle-arrow"><span></span><span></span></span>
                              </h4>
                          </div>
                          <div id="collapse2" class="panel-collapse collapse show">
                              <div class="panel-body">
                                {!! sc_html_render($product->content) !!}
                              </div>
                          </div>
                      </div>

                      <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse1">
                                  Specifications</a>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                              {!! sc_html_render($product->specifications) !!}
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse4">
                                  Condition</a>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">
                              {!! sc_html_render($product->condition) !!}
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse5">Delivery & Return</a>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </h4>
                        </div>
                        <div id="collapse5" class="panel-collapse collapse">
                            <div class="panel-body">
                              {!! sc_html_render($product->delivery) !!}
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse6">
                                Warranty</a>
                              <span class="toggle-arrow"><span></span><span></span></span>
                          </h4>
                      </div>
                      <div id="collapse6" class="panel-collapse collapse">
                          <div class="panel-body">
                            {!! sc_html_render($product->warranty) !!}
                          </div>
                      </div>
                  </div>
                  <div class="panel">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse7">Reviews</a>
                              <span class="toggle-arrow"><span></span><span></span></span>
                          </h4>
                      </div>
                      <div id="collapse7" class="panel-collapse collapse">
                          <div class="panel-body">
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
              </div>
            </form>
          </div>
      </div>
  </div>
</div>

@if ($productRelation->count())
  <div class="holder">
    <div class="container">
        <div class="title-wrap text-center">
            <h2 class="h1-style">{{trans('product.featured_products')}}</h2>
            <div class="carousel-arrows carousel-arrows--center"></div>
        </div>
        <div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2" data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'>
          @foreach ($productRelation as $key => $product_rel)
          <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                <div class="prd-inside">
                    <div class="prd-img-area">
                        <a href="{{ $product_rel->getUrl() }}" class="prd-img image-hover-scale image-container" style="padding-bottom: 128.48%">
                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ sc_file($product_rel->getThumb()) }}" alt="{{ $product_rel->name }}" class="js-prd-img lazyload fade-up">
                            <div class="foxic-loader"></div>
                            <div class="prd-big-squared-labels">
                            </div>
                        </a>
                        <div class="prd-circle-labels">
                            <a onClick="addToCartAjax('{{ $product_rel->id }}','wishlist','{{ $product_rel->store_id }}')" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                        </div>
                    </div>
                    <div class="prd-info">
                        <div class="prd-info-wrap">
                            <h2 class="prd-title"><a href="{{ $product_rel->getUrl() }}">{{ $product_rel->name }}</a></h2>
                            <div class="prd-action">
                              @if ($product_rel->allowSale())
                              <a onClick="addToCartAjax('{{ $product_rel->id }}','default','{{ $product_rel->store_id }}')" class="btn js-prd-addtocart">
                                <i class="fa fa-cart-plus"></i> {{trans('front.add_to_cart')}}</a>
                              @endif
                            </div>
                        </div>
                        <div class="prd-hovers">
                            <div class="prd-circle-labels">
                                <div><a onClick="addToCartAjax('{{ $product_rel->id }}','wishlist','{{ $product_rel->store_id }}')" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a></div>
                            </div>
                            <div class="prd-price">
                              {!! $product_rel->showPrice() !!}
                            </div>
                            <div class="prd-action">
                              <div class="prd-action-left">
                                @if ($product_rel->allowSale())
                                <a onClick="addToCartAjax('{{ $product_rel->id }}','default','{{ $product_rel->store_id }}')" class="btn js-prd-addtocart">
                                  <i class="fa fa-cart-plus"></i> {{trans('front.add_to_cart')}}</a>
                                @endif
                              </div>
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
@php
$bannerBreadcrumb = $modelBanner->start()->getBreadcrumb()->getData()->first();
@endphp
<div class="holder breadcrumbs-wrap mt-0">
  <div class="container">
    <ul class="breadcrumbs">
      <li><a href="{{ sc_route('home') }}">{{ trans('front.home') }}</a></li>
      @if (sc_config_global('MultiVendorPro') && config('app.storeId') == SC_ID_ROOT)
        <li><a href="{{ $goToStore }}">{{ sc_store('title', $product->store_id) }}</a></li>
      @endif
      <li><span>{{ $title ?? '' }}</span></li>
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
