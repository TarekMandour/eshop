@php
$banners = $modelBanner->start()->setType('1x_banner')->getData()
@endphp
@if (!empty($banners))
@foreach ($banners as $key => $banner)
<div class="container-indent nomargin">
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="col-sm-12 no-gutter">
        <div class="tt-promo-fullwidth">
          
          <img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($banner->image) }}" alt="">
          {!! sc_html_render($banner->html) !!}
          
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@endif


