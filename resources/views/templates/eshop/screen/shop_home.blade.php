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

<div class="container-indent">
    <div class="container">
        <div class="tt-layout-promo-box">
            <div class="row">
                @php $categoriesTop = $modelCategory->start()->getCategoryTop()->getData(); @endphp
                @if ($categoriesTop->count())
                    @foreach($categoriesTop as $key => $category)
                        <div class="col-sm-6 col-md-4">
                            <a href="{{ $category->getUrl() }}" class="tt-promo-box tt-one-child">
                                <img src="{{sc_file('images/loader.svg')}}" data-src="{{sc_file($category->image)}}" alt="{{$category->title}}">
                                <div class="tt-description">
                                    <div class="tt-description-wrapper">
                                        <div class="tt-background"></div>
                                        <div class="tt-title-small">{{$category->title}}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

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