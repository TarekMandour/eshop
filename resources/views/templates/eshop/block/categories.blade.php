@php
$categoriesTop = $modelCategory->start()->getCategoryTop()->getData();
@endphp
@if ($categoriesTop->count())
<div class="container-indent">
  <div class="container container-fluid-custom-mobile-padding">
    <div class="tt-block-title">
      <h1 class="tt-title">{{ trans('front.categories') }}</h1>
    </div>
    <div class="tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-collection-listing slick-animated-show-js">
      @foreach ($categoriesTop as $key => $category)
      <div class="col-2 col-md-4 col-lg-3">
        <a href="{{ $category->getUrl() }}" class="tt-collection-item">
          <div class="tt-image-box"><img src="{{sc_file($category->image)}}" alt="{{ $category->title }}"></div>
          <div class="tt-description">
            <h2 class="tt-title">{{ $category->title }}</h2>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endif

