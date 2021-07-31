@php
$banners = $modelBanner->start()->setType('6x_banner')->getData();

@endphp
@if (!empty($banners))
<div class="nomargin container-indent">
  <div class="container-fluid">
    <div class="row tt-layout-promo-box">
      <div class="col-sm-12 col-md-6">
        <div class="row">
          <div class="col-sm-6">
            <a href="{{ sc_route('banner.click',['id' => $banners[5]->id]) }}" target="{{ $banners[5]->target }}" class="tt-promo-box tt-one-child hover-type-2">
              <img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($banners[5]->image) }}" alt="">
            </a>
            <a href="{{ sc_route('banner.click',['id' => $banners[4]->id]) }}" target="{{ $banners[4]->target }}" class="tt-promo-box tt-one-child hover-type-2">
              <img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($banners[4]->image) }}" alt="">
            </a>
          </div>
          <div class="col-sm-6">
            <a href="{{ sc_route('banner.click',['id' => $banners[3]->id]) }}" target="{{ $banners[3]->target }}" class="tt-promo-box tt-one-child hover-type-2">
              <img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($banners[3]->image) }}" alt="">
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="row">
          <div class="col-sm-6">
            <a href="{{ sc_route('banner.click',['id' => $banners[2]->id]) }}" target="{{ $banners[2]->target }}" class="tt-promo-box tt-one-child hover-type-2">
              <img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($banners[2]->image) }}" alt="">
            </a>
          </div>
          <div class="col-sm-6">
            <a href="{{ sc_route('banner.click',['id' => $banners[1]->id]) }}" target="{{ $banners[1]->target }}" class="tt-promo-box tt-one-child hover-type-2">
              <img src="{{sc_file('images/loader.svg')}}" data-src="{{ sc_file($banners[1]->image) }}" alt="">
            </a>
          </div>
          <div class="col-sm-12">
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




