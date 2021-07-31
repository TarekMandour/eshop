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

<div class="container-indent">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3 col-xl-3 leftColumn aside">
                <div class="tt-btn-col-close">
                    <a href="#">Close</a>
                </div>
                <div class="tt-collapse open tt-filter-detach-option">
                    <div class="tt-collapse-content">
                        <div class="filters-mobile">
                            <div class="filters-row-select">

                            </div>
                        </div>
                    </div>
                </div>
                <form name="search" method="post" action="{{route('search')}}">
                    @csrf
                    <div class="tt-collapse open">
                        <h3 class="tt-collapse-title">PRODUCT CATEGORIES</h3>
                        <div class="tt-collapse-content">
                            <ul class="tt-list-row">
                                @php $maincat = \EShop\Core\Front\Models\ShopCategory::where('parent',0)->get() ; @endphp
                                    @foreach($maincat as $key => $cat)
                                        <li>
                                            <div class="checkbox-group">
                                                <input id="checkbox{{$key}}" value="{{$cat->id}}" name="category[]"
                                                    type="checkbox" onChange="this.form.submit()"
                                                    @if(old('category'))
                                                    @if(in_array($cat->id,old('category'))) checked @endif
                                                        @endif
                                                >
                                                <label for="checkbox{{$key}}">
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    {{$cat->alias}}</label>
                                            </div>
                                            @php 
                                                $subcat = \EShop\Core\Front\Models\ShopCategory::where('parent',$cat->id)->get() ; 
                                            @endphp
                                            @if (count($subcat))
                                            <div class="toggle-category js-toggle-category"><span><i class="icon-angle-up"></i></span></div>
                                            <ul style="list-style: none;">
                                                @foreach($subcat as $subk => $subcat)
                                                <li>
                                                    <div class="checkbox-group">
                                                        <input id="checkbox{{$key}}{{$subk}}" value="{{$subcat->id}}" name="category[]"
                                                        type="checkbox" onChange="this.form.submit()"
                                                        @if(old('category'))
                                                        @if(in_array($subcat->id,old('category'))) checked @endif
                                                        @endif
                                                        >
                                                        <label for="checkbox{{$key}}{{$subk}}">
                                                            <span class="check"></span>
                                                            <span class="box"></span>
                                                            {{$subcat->alias}}</label>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="tt-collapse">
                        <h3 class="tt-collapse-title">Brands</h3>
                        <div class="tt-collapse-content">
                            <ul class="tt-list-row">
                                @php $brands = \EShop\Core\Front\Models\ShopBrand::all() ; @endphp
                                @foreach($brands as $bkey => $brand)
                                    <li>
                                        <div class="checkbox-group">
                                        <input id="checkboxb{{$bkey}}" value="{{$brand->id}}" name="brand[]"
                                            type="checkbox" onChange="this.form.submit()"
                                            @if(old('brand'))
                                            @if(in_array($brand->id,old('brand'))) checked @endif
                                                @endif
                                        >
                                        <label for="checkboxb{{$bkey}}">
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            {{$brand->alias}}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    @foreach(\EShop\Core\Front\Models\ShopAttributeGroup::all() as $k => $attributeGroup)
                        <div class="tt-collapse">
                            <h3 class="tt-collapse-title">{{$attributeGroup->name}}</h3>
                            <div class="tt-collapse-content">
                                <ul class="tt-list-row">
                                    @php
                                        $attribute_name =[];
                                    @endphp
                                    @foreach($attributeGroup->attributeDetails as $key => $attr)

                                        @if(!in_array($attr->name , $attribute_name))
                                            @php
                                                array_push($attribute_name , $attr->name);
                                            @endphp

                                            <li>
                                                <div class="checkbox-group">
                                                    <input id="checkboxattr{{$key}}{{$k}}"
                                                        name="attribute[]"
                                                        type="checkbox" onChange="this.form.submit()"
                                                        value="{{$attr->name}}"
                                                        @if(old('attribute'))
                                                        @if(in_array($attr->name,old('attribute'))) checked @endif
                                                            @endif
                                                    >
                                                    <label for="checkboxattr{{$key}}{{$k}}">
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        {{$attr->name}}</label>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    @endforeach
                </form>

            </div>
            <div class="col-md-12 col-lg-9 col-xl-9">
                <div class="content-indent container-fluid-custom-mobile-padding-02">
                    <div class="tt-filters-options">
                        <h1 class="tt-title">
                            {{ $title ?? '' }}
                        </h1>
                        <span>{!! trans('front.result_item', ['item_from' => $products->firstItem(), 'item_to'=> $products->lastItem(), 'item_total'=> $products->total()  ]) !!} | </span>
                        <div class="tt-btn-toggle">
                            <a href="#">FILTER</a>
                        </div>

                        <form action="" method="GET" id="filter_sort">
                            @php
                            $queries = request()->except(['filter_sort','page','token','category','brand','attribute']);
                            @endphp
                            @foreach ($queries as $key => $query)
                            <input type="hidden" name="{{ $key }}" value="{{ $query }}">
                            @endforeach
                            
                            <div class="tt-sort">
                                <select name="filter_sort">
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

                        </form>
                        
                        <div class="tt-quantity">
                            <a href="#" class="tt-col-one" data-value="tt-col-one"></a>
                            <a href="#" class="tt-col-two" data-value="tt-col-two"></a>
                            <a href="#" class="tt-col-three" data-value="tt-col-three"></a>
                            <a href="#" class="tt-col-four" data-value="tt-col-four"></a>
                            <a href="#" class="tt-col-six" data-value="tt-col-six"></a>
                        </div>
                        <a href="#" class="tt-grid-switch icon-h-43"></a>
                    </div>
                    <div class="tt-product-listing row">
                        @foreach ($products as $key => $product)
                        <div class="col-6 col-md-4 tt-col-item">
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
                                  <h2 class="tt-title"><a href="{{ $product->getUrl() }}">{{ $product->getName() }}</a></h2>
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
                        {{ $products->appends(request()->except(['page','_token']))->links() }}
                    </div>
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