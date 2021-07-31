@php
$banners = $modelBanner->start()->setType('home_banner_slider')->getData()
@endphp
@if (!empty($banners))
<div class="container-indent nomargin">
  <div class="container-fluid">
    <div class="row">
      <div class="slider-revolution revolution-default">
        <div class="tp-banner-container">
          <div class="tp-banner revolution">
            <ul>
              @foreach ($banners as $key => $banner)
              <a href="{{ sc_route('banner.click',['id' => $banner->id]) }}" target="{{ $banner->target }}">
                <li data-thumb="{{ sc_file($banner->image) }}" data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
                  <img src="{{ sc_file($banner->image) }}"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >
                  {!! sc_html_render($banner->html) !!}
                </li>
              </a>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif


