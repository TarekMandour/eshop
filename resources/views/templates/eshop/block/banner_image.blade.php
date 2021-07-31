@php
$banners = $modelBanner->start()->setType('banner')->getData()
@endphp
@if (!empty($banners))

<div class="holder fullwidth full-nopad mt-0">
  <div class="container">
      <div class="bnslider-wrapper">
          <div class="bnslider bnslider--lg keep-scale" id="bnslider-001" data-slick='{"arrows": true, "dots": true}' data-autoplay="false" data-speed="12000" data-start-width="1917" data-start-height="1000" data-start-mwidth="1550" data-start-mheight="1000">

            @foreach ($banners as $key => $banner)
              <div class="bnslider-slide">
                <div class="bnslider-image-mobile lazyload" data-bgset="{{ sc_file($banner->image) }}"></div>
                <div class="bnslider-image lazyload" data-bgset="{{ sc_file($banner->image) }}"></div>
                <div class="bnslider-text-wrap bnslider-overlay ">
                    {!! sc_html_render($banner->html) !!}
                </div>
              </div>
            @endforeach

            <div class="bnslider-slide slick-slide is-paused" data-autoplay="true" data-video-type="video" data-slick-index="2" aria-hidden="true" style="width: 1903px; position: relative; left: -3806px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;" id="slick-slide02">
                <div class="video-wrap">
                    <video playsinline="" loop="" preload="auto">
                        <source src="https://previews.customer.envatousercontent.com/h264-video-previews/5b825bde-b625-4b28-aebb-363b5b1aeeda/30955315.mp4" type="video/mp4">
                    </video>
                    <div class="video-control visible">
                        <div class="video-play js-video-slider-play"><i class="icon-play"></i></div>
                        <div class="video-stop js-video-slider-stop"><i class="icon-pause"></i></div>
                    </div>
                </div>
            </div>

          </div>
          <div class="bnslider-arrows container-fluid">
              <div></div>
          </div>
          <div class="bnslider-dots container-fluid"></div>
      </div>
  </div>
</div>
@endif