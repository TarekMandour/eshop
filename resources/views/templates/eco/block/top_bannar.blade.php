@php
$banners = $modelBanner->start()->setType('top_bannar')->getData()
@endphp
@if (!empty($banners))
<div class="holder holder-pb-small holder-pt-small holder-with-bg bgcolor mt-10">
  <div class="container">
      <div class="title-with-arrows">
          <h2>Clients</h2>
          <div class="carousel-arrows"></div>
      </div>
      <div class="collection-grid-2 data-slick" data-slick='{"slidesToShow": 6, "responsive": [{"breakpoint": 1200,"settings": {"slidesToShow": 5}},{"breakpoint": 992,"settings": {"slidesToShow": 4}},{"breakpoint": 768,"settings": {"slidesToShow": 3}},{"breakpoint": 480,"settings": {"slidesToShow": 2}}]}'>
        @foreach ($banners as $key => $banner)
          <div class="collection-grid-2-item mr-1">
              <a href="{{ sc_route('banner.click',['id' => $banner->id]) }}" target="{{ $banner->target }}" class="bnr-wrap collection-grid-2-item-inside">
                  <div class="collection-grid-2-img image-hover-scale image-container" style="padding-bottom: 77.78%">
                      <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ sc_file($banner->image) }}" class="lazyload fade-up" alt="">
                  </div>
                  <h3 class="collection-grid-2-title">{!! sc_html_render($banner->html) !!}</h3>
              </a>
          </div>
        @endforeach
      </div>
  </div>
</div>
@endif