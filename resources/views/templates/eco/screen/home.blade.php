@php
/*
$layout_page = home
*/ 
@endphp

@extends($sc_templatePath.'.layout')
@php
$productsNew = $modelProduct->start()->getProductLatest()->setlimit(sc_config('product_top'))->getData();
$news = $modelNews->start()->setlimit(sc_config('item_top'))->getData();
@endphp

@section('block_main')
      <!-- New Products--> 

    <div class="holder holder-mt-medium">
        <div class="container">
            <div class="title-wrap text-center">
                <h2 class="h1-style"><a href="#" title="View all">Best Sellers</a></h2>
                <div class="carousel-arrows">
                </div>
            </div>
            <div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2" data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'>
                @foreach ($productsNew as $key => $productNew)
                    <div class="prd ">
                        <div class="prd-inside">
                            <div class="prd-img-area">
                                <a href="{{ $productNew->getUrl() }}" class="prd-img image-hover-scale image-container" style="padding-bottom: 128.48%">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ sc_file($productNew->getThumb()) }}" alt="{{ $productNew->name }}" class="js-prd-img lazyload">
                                    <div class="foxic-loader"></div>
                                    {{-- Product type --}}
                                    @if ($productNew->price != $productNew->getFinalPrice() && $productNew->kind !=SC_PRODUCT_GROUP)
                                    <div class="prd-big-circle-labels">
                                        <div class="label-sale"><span> <span class="sale-text">Sale</span></span>
                                            <div class="countdown-circle">
                                                <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    {{-- //Product type --}}
                                    
                                </a>
                                <div class="prd-circle-labels">
                                    <a onClick="addToCartAjax('{{ $productNew->id }}','wishlist','{{ $productNew->store_id }}')" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                </div>
                            </div>
                            <div class="prd-info">
                                <div class="prd-info-wrap">

                                    <h2 class="prd-title"><a href="{{ $productNew->getUrl() }}">{{ $productNew->name }}</a></h2>
                                </div>
                                <div class="prd-hovers">
                                    <div class="prd-circle-labels">
                                        <div><a onClick="addToCartAjax('{{ $productNew->id }}','wishlist','{{ $productNew->store_id }}')" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                        <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                    </div>
                                    <div class="prd-price">
                                         {!! $productNew->showPrice() !!} 
                                    </div>
                                    <div class="prd-action">
                                        <div class="prd-action-left">
                                            <button class="btn js-prd-addtocart" onClick="addToCartAjax('{{ $productNew->id }}','default','{{ $productNew->store_id }}')">{{trans('front.add_to_cart')}}</button>
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

    @php
    $banners = $modelBanner->start()->setType('left_bannar')->getData()
    @endphp
    @if (!empty($banners))
    <div class="holder fullwidth full-nopad ">
        <div class="container">
            <div class="bnslider-wrapper">
                <div class="bnslider bnslider--lg keep-scale" id="bnslider-002" data-slick='{"arrows": true, "dots": false}' data-autoplay="false" data-speed="5000" data-start-width='1920' data-start-height='808' data-start-mwidth='375' data-start-mheight='365'>
                    <div class="bnslider-slide">
                        @foreach ($banners as $key => $banner)
                        <div class="bnslider-image-mobile lazyload" data-bgset="{{ $banner->image }}"></div>
                        <div class="bnslider-image lazyload" data-bgset="{{ $banner->image }}"></div>
                        {!! sc_html_render($banner->html) !!}
                        @endforeach                        
                    </div>
                </div>
                <div class="bnslider-arrows container">
                    <div></div>
                </div>
                <div class="bnslider-dots container"></div>
            </div>
        </div>
    </div>
    @endif

    @php
    $ccontent = $modelBanner->start()->setType('center_content')->getData()
    @endphp
    @if (!empty($ccontent))
    <div class="holder holder-welcome-block py-50 mt-0">
        <div class="container">
            <div class="row welcome-block">
                @foreach ($ccontent as $key2 => $ccon)
                    <div class="col-lg-7 welcome-block-image">
                        <img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ $ccon->image }}" alt="{{ $ccon->title }}">
                    </div>
                    {!! sc_html_render($ccon->html) !!}
                @endforeach
            </div>
        </div>
    </div>
    @endif
    
    @php 
        $services = App\Plugins\Cms\Content\Models\CmsContent::latest()->take(12)->get();
    @endphp
    <div class="holder">
        <div class="container">
            <div class="page-title text-center">
                <h1>WHAT WE DO ?</h1>
            </div>
            <div class="post-prws-grid row">
                @foreach ($services as $entryDetail)
                @php 
                    $services_details = App\Plugins\Cms\Content\Models\CmsContentDescription::where('content_id',$entryDetail->id)->first();
                @endphp
                <div class="col-sm-9 col-md-6">
                    <div class="post-prw-simple">
                        <div class="post-prw-img">
                            <a href="{{ $entryDetail->getUrl() }}" class="image-hover-scale image-container" style="padding-bottom: 54.44%">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ sc_file($entryDetail->getThumb()) }}" class="lazyload fade-up" alt="{{ $entryDetail->title }}">
                            </a>
                        </div>
                        <h4 class="post-prw-title"><a href="{{ $entryDetail->getUrl() }}">@if ($services_details){{ $services_details['title'] }} @endif</a></h4>
                    </div>
                </div>
                @endforeach

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

@section('news')

@endsection

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
