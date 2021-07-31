@php
/*
$layout_page = shop_compare
**Variables:**
- $compare: no paginate
*/
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main_content_center')

    @if (count($compare) ==0)
        <div class="container-indent nomargin">
            <div class="tt-empty-wishlist">
                <h1 class="tt-title">{{ $title ?? '' }}</h1>
                <div class="icon-svg">
                    <svg viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect fill="white"/>
                        <path d="M28.4688 13.046C28.4062 13.14 28.3281 13.2341 28.2344 13.3282C28.1719 13.391 28.0938 13.4694 28 13.5635C27.9062 13.4694 27.8125 13.391 27.7188 13.3282C27.6562 13.2341 27.5938 13.14 27.5312 13.046C26.1875 11.6973 24.6562 10.6937 22.9375 10.035C21.25 9.345 19.5156 9 17.7344 9C15.9844 9 14.2656 9.345 12.5781 10.035C10.8906 10.6937 9.375 11.6973 8.03125 13.046C6.71875 14.3632 5.71875 15.8687 5.03125 17.5624C4.34375 19.2247 4 20.981 4 22.8315C4 24.682 4.34375 26.454 5.03125 28.1477C5.71875 29.81 6.71875 31.2998 8.03125 32.6171L26.9219 51.5766C27.0781 51.702 27.25 51.7961 27.4375 51.8589C27.625 51.953 27.8125 52 28 52C28.1875 52 28.375 51.953 28.5625 51.8589C28.75 51.7961 28.9219 51.702 29.0781 51.5766L47.9688 32.6171C49.2812 31.2998 50.2812 29.81 50.9688 28.1477C51.6562 26.454 52 24.682 52 22.8315C52 20.981 51.6562 19.2247 50.9688 17.5624C50.2812 15.8687 49.2812 14.3632 47.9688 13.046C46.625 11.6973 45.1094 10.6937 43.4219 10.035C41.7344 9.345 40 9 38.2188 9C36.4688 9 34.7344 9.345 33.0156 10.035C31.3281 10.6937 29.8125 11.6973 28.4688 13.046ZM45.8594 30.453L28 48.3775L10.1406 30.453C9.14062 29.4493 8.35938 28.2888 7.79688 26.9716C7.26562 25.6543 7 24.2743 7 22.8315C7 21.3888 7.26562 20.0088 7.79688 18.6915C8.35938 17.3742 9.14062 16.198 10.1406 15.163C11.2031 14.128 12.3906 13.3439 13.7031 12.8107C15.0469 12.2775 16.4062 12.0109 17.7812 12.0109C19.1562 12.0109 20.5 12.2775 21.8125 12.8107C23.1562 13.3439 24.3438 14.128 25.375 15.163C25.625 15.4139 25.8594 15.6805 26.0781 15.9628C26.3281 16.2451 26.5469 16.543 26.7344 16.8567C27.0156 17.2644 27.4375 17.4683 28 17.4683C28.5625 17.4683 28.9844 17.2644 29.2656 16.8567C29.4531 16.543 29.6562 16.2451 29.875 15.9628C30.125 15.6805 30.375 15.4139 30.625 15.163C31.6562 14.128 32.8281 13.3439 34.1406 12.8107C35.4844 12.2775 36.8438 12.0109 38.2188 12.0109C39.5938 12.0109 40.9375 12.2775 42.25 12.8107C43.5938 13.3439 44.7969 14.128 45.8594 15.163C46.8594 16.198 47.625 17.3742 48.1562 18.6915C48.7188 20.0088 49 21.3888 49 22.8315C49 24.2743 48.7188 25.6543 48.1562 26.9716C47.625 28.2888 46.8594 29.4493 45.8594 30.453Z" fill="#C4C4C4"/>
                        <rect y="45" width="64.4191" height="3" transform="rotate(-30 0 45)" fill="#191919"/>
                        </svg>
                </div>
                <p>{{ trans('front.empty_product') }}</p>
                <a href="{{ sc_route('home') }}" class="btn">{{ trans('cart.back_to_shop') }}</a>
            </div>
        </div>
    @else

        <div class="container-indent">
            <div class="container">
                <h1 class="tt-title-subpages noborder">{{ $title ?? '' }} <span id="tt-compare-countitem">{{count($compare)}}</span> PRODUCTS</h1>
                <div class="tt-compare-table" id="tt-compare-table">
                    @php
                        $n = 0;
                    @endphp

                    @foreach($compare as $key => $item)
                    @php
                        $n++;
                        $product = $modelProduct->start()->getDetail($item->id, null, $item->storeId);
                    @endphp
                    <div class="tt-item">
                        <div class="tt-image-box">
                            <div class="tt-row-custom">
                                <div class="tt-col">
                                    <div class="tt-label-location">
                                        <div class="tt-label-in-stock">
                                            @if($product->stock <=0 && !sc_config('product_buy_out_of_stock'))
                                            {{ trans('product.out_stock') }} 
                                            @else 
                                            {{ trans('product.in_stock') }} 
                                            @endif 
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col">
                                    <a onClick="return confirm('Confirm')" title="Remove Item" alt="Remove Item"
                                            class="tt-remove-item js-remove-item"
                                            href="{{ sc_route("cart.remove",['id'=>$item->rowId, 'instance' => 'compare']) }}"></a>
                                </div>
                            </div>
                            <div class="tt-img">
                                <a href="{{ $product->getUrl() }}"><img src="{{sc_file($product->getImage())}}" alt="{{ $product->name }}"></a>
                            </div>
                            <h2 class="tt-title"><a href="{{ $product->getUrl() }}">{{ $product->name }}</a></h2>
                            {!! $product->showPrice() !!}
                        </div>
                        
                        <div class="tt-col tt-table-title">{{ trans('product.category') }}</div>
                        <div class="tt-col js-description">
                            @foreach ($product->categories as $category)
                                <a href="{{ $category->getUrl() }}">{{ $category->getTitle() }}</a>,
                            @endforeach
                        </div>

                        @if (sc_config('product_brand') && !empty($product->brand->name))
                            <div class="tt-col tt-table-title">{{ trans('product.brand') }}</div>
                            <div class="tt-col">
                                {!! empty($product->brand->name) ? 'None' : '<a href="'.$product->brand->getUrl().'">'.$product->brand->name.'</a>' !!}
                            </div>
                        @endif

                        <div class="tt-col tt-table-title">{{ trans('product.description') }}</div>
                        <div class="tt-col js-description">
                            {!! $product->description !!}
                        </div>
                        

                        <div class="tt-col">
                            <a href="javascript:;" onClick="addToCartAjax('{{ $product->id }}','default','{{ $product->store_id }}')" class="tt-btn-addtocart"><i class="icon-f-39"></i>{{trans('front.add_to_cart')}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    @endif

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

@push('styles')
{{-- Your css style --}}
@endpush