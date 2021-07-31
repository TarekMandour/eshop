@php
/*
$layout_page = shop_product_list
**Variables:**
- $subCategory: paginate
Use paginate: $subCategory->appends(request()->except(['page','_token']))->links()
- $products: paginate
Use paginate: $products->appends(request()->except(['page','_token']))->links()
*/ 
@endphp

@extends($sc_templatePath.'.layout')

{{-- block_main_content_center --}}
@section('block_main')


<div class="holder">
  <div class="container">
      <div class="filter-row">
          <div class="row">               
              <div class="items-count">
                  {!! trans('front.result_item', ['item_from' => $products->firstItem(), 'item_to'=> $products->lastItem(), 'item_total'=> $products->total()  ]) !!}
              </div>
              <form action="" method="GET" id="filter_sort">
              @php
              $queries = request()->except(['filter_sort','page','token','category','brand','attribute']);
              @endphp
              @foreach ($queries as $key => $query)
              <input type="hidden" name="{{ $key }}" value="{{ $query }}">
              @endforeach
              
              <div class="select-wrap d-none d-md-flex">
                  <div class="select-label">{{ trans('front.filters.sort') }}:</div>
                  <div class="select-wrapper select-wrapper-xxs">
                      <select class="form-control input-sm" name="filter_sort">
                          <option value="">{{ trans('front.filters.sort') }}</option>
                          <option value="price_asc" {{ ($filter_sort =='price_asc')?'selected':'' }}>
                              {{ trans('front.filters.price_asc') }}</option>
                          <option value="price_desc" {{ ($filter_sort =='price_desc')?'selected':'' }}>
                              {{ trans('front.filters.price_desc') }}</option>
                          <option value="sort_asc" {{ ($filter_sort =='sort_asc')?'selected':'' }}>
                              {{ trans('front.filters.sort_asc') }}</option>
                          <option value="sort_desc" {{ ($filter_sort =='sort_desc')?'selected':'' }}>
                              {{ trans('front.filters.sort_desc') }}</option>
                          <option value="id_asc" {{ ($filter_sort =='id_asc')?'selected':'' }}>{{ trans('front.filters.id_asc') }}
                          </option>
                          <option value="id_desc" {{ ($filter_sort =='id_desc')?'selected':'' }}>
                              {{ trans('front.filters.id_desc') }}</option>
                      </select>
                  </div>
              </div>
              </form>
              <div class="viewmode-wrap">
                  <div class="view-mode">
                      <span class="js-horview d-none d-lg-inline-flex"><i class="icon-grid"></i></span>
                      <span class="js-gridview d-none d-lg-inline-flex"><i class="icon-grid"></i></span>
                      {{-- <span class="js-listview"><i class="icon-list"></i></span> --}}
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-4 aside aside--left filter-col filter-mobile-col filter-col--sticky js-filter-col filter-col--opened-desktop" data-grid-tab-content>
              <div class="filter-col-content filter-mobile-content">
                  <div class="sidebar-block">

                  </div>
                  <div class="sidebar-block d-filter-mobile">
                      <h3 class="mb-1">SORT BY</h3>
                      <div class="select-wrapper select-wrapper-xs">
                          <select class="form-control">
                              <option value="featured">Featured</option>
                              <option value="rating">Rating</option>
                              <option value="price">Price</option>
                          </select>
                      </div>
                  </div>
                  <form name="search" method="post" action="{{route('search')}}">
                      @csrf
                      <div class="sidebar-block filter-group-block open">
                          <div class="sidebar-block_title">
                              <span>category</span>
                              <span class="toggle-arrow"><span></span><span></span></span>
                          </div>
                          <div class="sidebar-block_content">
                              <ul class="category-list">
                                  {{--                                <li class="active"><a href="category.html" title="Casual" class="open">Casual&nbsp;<span>(30)</span></a>--}}
                                  {{--                                    <div class="toggle-category js-toggle-category"><span><i class="icon-angle-down"></i></span></div>--}}
                                  {{--                                    <ul class="category-list category-list">--}}
                                  {{--                                        <li><a href="category.html" title="Men">Men&nbsp;<span>(10)</span></a></li>--}}
                                  {{--                                        <li><a href="category.html" title="Women">Women&nbsp;<span>(10)</span></a></li>--}}
                                  {{--                                        <li><a href="category.html" title="Accessories">Accessories&nbsp;<span>(10)</span></a></li>--}}
                                  {{--                                    </ul>--}}
                                  {{--                                </li>--}}

                                    @php $maincat = \EShop\Core\Front\Models\ShopCategory::where('parent',0)->get() ; @endphp
                                    @foreach($maincat as $key => $cat)
                                        <li>
                                            <a href="javascript:;" title="{{$cat->alias}}" class="open">
                                                <input id="checkbox{{$key}}" value="{{$cat->id}}" name="category[]"
                                                    type="checkbox" onChange="this.form.submit()"
                                                    @if(old('category'))
                                                    @if(in_array($cat->id,old('category'))) checked @endif
                                                        @endif
                                                >
                                                <label for="checkbox{{$key}}">{{$cat->alias}}</label>
                                            </a>
                                            @php 
                                                $subcat = \EShop\Core\Front\Models\ShopCategory::where('parent',$cat->id)->get() ; 
                                            @endphp
                                            @if (count($subcat))
                                            <div class="toggle-category js-toggle-category"><span><i class="icon-angle-up"></i></span></div>
                                            <ul class="category-list category-list">
                                                @foreach($subcat as $subk => $subcat)
                                                <li>
                                                    <input id="checkbox{{$key}}{{$subk}}" value="{{$subcat->id}}" name="category[]"
                                                    type="checkbox" onChange="this.form.submit()"
                                                    @if(old('category'))
                                                    @if(in_array($subcat->id,old('category'))) checked @endif
                                                    @endif
                                                    >
                                                    <label for="checkbox{{$key}}{{$subk}}">{{$subcat->alias}}</label>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                    @endforeach
                              </ul>
                          </div>
                      </div>
                      <div class="sidebar-block filter-group-block collapsed">
                        <div class="sidebar-block_title">
                            <span>Brands</span>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="sidebar-block_content">
                            <ul class="category-list">
                                @php $brands = \EShop\Core\Front\Models\ShopBrand::all() ; @endphp
                                @foreach($brands as $bkey => $brand)
                                    <li>
                                        <input id="checkboxb{{$bkey}}" value="{{$brand->id}}" name="brand[]"
                                            type="checkbox" onChange="this.form.submit()"
                                            @if(old('brand'))
                                            @if(in_array($brand->id,old('brand'))) checked @endif
                                                @endif
                                        >
                                        <label for="checkboxb{{$bkey}}">{{$brand->alias}}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                      @foreach(\EShop\Core\Front\Models\ShopAttributeGroup::all() as $k => $attributeGroup)
                          <div class="sidebar-block filter-group-block collapsed">
                              <div class="sidebar-block_title">
                                  <span>{{$attributeGroup->name}}</span>
                                  <span class="toggle-arrow"><span></span><span></span></span>
                              </div>
                              <div class="sidebar-block_content">
                                  <ul class="color-list two-column">
                                      @php
                                          $attribute_name =[];
                                      @endphp
                                      @foreach($attributeGroup->attributeDetails as $key => $attr)

                                          @if(!in_array($attr->name , $attribute_name))
                                              @php
                                                  array_push($attribute_name , $attr->name);
                                              @endphp

                                              <li>

                                                  <input id="checkboxattr{{$key}}{{$k}}"
                                                         name="attribute[]"
                                                         type="checkbox" onChange="this.form.submit()"
                                                         value="{{$attr->name}}"
                                                         @if(old('attribute'))
                                                         @if(in_array($attr->name,old('attribute'))) checked @endif
                                                          @endif
                                                  >
                                                  <label for="checkboxattr{{$key}}{{$k}}">{{$attr->name}}</label>
                                              </li>
                                          @endif
                                      @endforeach
                                  </ul>
                              </div>
                          </div>
                      @endforeach
                  </form>

              </div>
          </div>
          <div class="col-lg aside">
              <div class="prd-grid-wrap">
                  <div class="prd-grid product-listing data-to-show-4 data-to-show-md-4 data-to-show-sm-2 js-category-grid" data-grid-tab-content>
                      @foreach ($products as $key => $product)
                      <div class="prd ">
                          <div class="prd-inside">
                              <div class="prd-img-area">
                                  <a href="{{ $product->getUrl() }}" class="prd-img image-hover-scale image-container" style="padding-bottom: 128.48%">
                                      <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ sc_file($product->getThumb()) }}" alt="{{ $product->name }}" class="js-prd-img lazyload">
                                      <div class="foxic-loader"></div>
                                      @if ($product->price != $product->getFinalPrice() && $product->kind != SC_PRODUCT_GROUP)
                                      <div class="prd-big-circle-labels">
                                          <div class="label-sale"><span><span class="sale-text">{{ trans('product.sale') }}</span></span>
                                          </div>
                                      </div>
                                      @endif
                                  </a>
                                  <div class="prd-circle-labels">
                                      <a onClick="addToCartAjax('{{ $product->id }}','wishlist','{{ $product->store_id }}')" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                  </div>
                              </div>
                              <div class="prd-info">
                                  <div class="prd-info-wrap">
                                      <h2 class="prd-title"><a href="{{ $product->getUrl() }}">{{ $product->name }}</a></h2>
                                  </div>
                                  <div class="prd-hovers">
                                      <div class="prd-circle-labels">
                                          <div><a onClick="addToCartAjax('{{ $product->id }}','wishlist','{{ $product->store_id }}')" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a></div>
                                      </div>
                                      <div class="prd-price">
                                          {!! $product->showPrice() !!}
                                      </div>
                                      @if ($product->allowSale())
                                      <div class="prd-action">
                                          <div class="prd-action-left">
                                              <button class="btn js-prd-addtocart" onClick="addToCartAjax('{{ $product->id }}','default','{{ $product->store_id }}')">{{trans('front.add_to_cart')}}</button>
                                          </div>
                                      </div>
                                      @endif
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endforeach
                  </div>

                  {{ $products->appends(request()->except(['page','_token']))->links() }}
                  
                  <!--<div class="mt-2">-->
                  <!--<button class="btn" onclick="THEME.loaderHorizontalSm.open()">Show Small Loader</button>-->
                  <!--<button class="btn" onclick="THEME.loaderHorizontalSm.close()">Hide Small Loader</button>-->
                  <!--</div>-->
                  <!--<div class="mt-2">-->
                  <!--<button class="btn" onclick="THEME.loaderCategory.open()">Show Opacity</button>-->
                  <!--<button class="btn" onclick="THEME.loaderCategory.close()">Hide Opacity</button>-->
                  <!--</div>-->
              </div>
          </div>
      </div>
  </div>
</div>

{{-- Render include view --}}
@if (!empty($layout_page && $includePathView = config('sc_include_view.'.$layout_page, [])))
@foreach ($includePathView as $view)
  @if (view()->exists($view))
    @include($view)
  @endif
@endforeach
@endif
{{--// Render include view --}}

@endsection
{{-- //block_main_content_center --}}


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
<script type="text/javascript">
  $('[name="filter_sort"]').change(function(event) {
      $('#filter_sort').submit();
  });
</script>

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