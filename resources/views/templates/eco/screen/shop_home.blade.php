@php
    /*
    $layout_page = shop_home
    **Variables:**
    - $products: paginate
    Use paginate: $products->appends(request()->except(['page','_token']))->links()
    */
@endphp

@extends($sc_templatePath.'.layout')


{{-- block_main_content_center --}}
@section('block_main')



<div class="holder"> 
    

    <div class="container">
        <div class="page-title text-center">
            <div class="title">
                <h1>Shop Categories</h1>
            </div>
        </div>

        @php $categoriesTop = $modelCategory->start()->getCategoryTop()->getData(); @endphp
        @if ($categoriesTop->count())
            <div class="row collection-grid-2 mobile-sm-pad custom-grid data-to-show-4 data-to-show-lg-3 data-to-show-md-2 data-to-show-sm-2">
                @foreach($categoriesTop as $key => $category)
                    <div class="collection-grid-2-item w-100 text-center">
                        <a href="{{ $category->getUrl() }}" class="bnr-wrap collection-grid-2-item-inside">
                            <div class="collection-grid-2-img image-container image-hover-scale" style="padding-bottom: 80.0%">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{sc_file($category->image)}}" class="lazyload fade-up" alt="{{$category->title}}">
                            </div>
                        </a>
                        <h3 class="collection-grid-2-title"><a href="{{ $category->getUrl() }}">{{$category->title}}</a></h3>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>



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
@endpush

@push('scripts')
    <script type="text/javascript">
        $('[name="filter_sort"]').change(function (event) {
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