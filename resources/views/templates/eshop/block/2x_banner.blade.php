@php
$banners = $modelBanner->start()->setType('2x_banner')->getData()
@endphp
@if (!empty($banners))
<div class="container-indent nomargin">
  <div class="container-fluid-custom">
    <div class="row">
      @foreach ($banners as $key => $banner)
      <div class="col-sm-6">
        <a href="{{ sc_route('banner.click',['id' => $banner->id]) }}" target="{{ $banner->target }}" class="tt-promo-box tt-one-child">
          <img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($banner->image) }}" alt="">
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endif
