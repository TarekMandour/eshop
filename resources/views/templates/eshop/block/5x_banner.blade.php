@php
$banners = $modelBanner->start()->setType('5x_banner')->getData();

@endphp
@if (!empty($banners))
<div class="container-indent nomargin">
  <div class="container-fluid-custom">
    <div class="row tt-list-sm-shift">
      <div class="col-md-3">
        <div class="row">
          <div class="col-6 col-md-12 col-12-575width">
            <a href="{{ sc_route('banner.click',['id' => $banners[4]->id]) }}" target="{{ $banners[4]->target }}" class="tt-promo-box tt-one-child">
              <img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($banners[4]->image) }}" alt="">
            </a>
          </div>
          <div class="col-6 col-md-12 col-12-575width">
            <a href="{{ sc_route('banner.click',['id' => $banners[3]->id]) }}" target="{{ $banners[3]->target }}" class="tt-promo-box tt-one-child">
              <img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($banners[3]->image) }}" alt="">
            </a>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-6 col-sm-6 col-md-6 col-12-575width">
        <a href="{{ sc_route('banner.click',['id' => $banners[2]->id]) }}" target="{{ $banners[2]->target }}" class="tt-promo-box tt-one-child">
          <img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($banners[2]->image) }}" alt="">
        </a>
      </div>
      <div class="col-md-3 col-12-575width">
        <div class="row">
          <div class="col-6 col-md-12 col-12-575width">
            <a href="{{ sc_route('banner.click',['id' => $banners[1]->id]) }}" target="{{ $banners[1]->target }}" class="tt-promo-box tt-one-child">
              <img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($banners[1]->image) }}" alt="">
            </a>
          </div>
          <div class="col-6 col-md-12 col-12-575width">
            <a href="{{ sc_route('banner.click',['id' => $banners[0]->id]) }}" target="{{ $banners[0]->target }}" class="tt-promo-box tt-one-child">
              <img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($banners[0]->image) }}" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif




