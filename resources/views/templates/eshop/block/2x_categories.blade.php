@php
$categoriesTop = $modelCategory->start()->getCategoryTop()->getData();
@endphp
@if ($categoriesTop->count())
<div class="container-indent nomargin">
  <div class="container-fluid-custom">
    <div class="row">
      @foreach ($categoriesTop as $key => $category)
      <div class="col-6 col-sm-6 col-md-3 col-6-575width">
        <a href="{{ $category->getUrl() }}" class="tt-promo-box tt-one-child">
          <img src="images/loader.svg" data-src="{{sc_file($category->image)}}" alt="{{ $category->title }}">
          <div class="tt-description">
            <div class="tt-description-wrapper">
              <div class="tt-background"></div>
              <div class="tt-title-small">{{ $category->title }}</div>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endif



