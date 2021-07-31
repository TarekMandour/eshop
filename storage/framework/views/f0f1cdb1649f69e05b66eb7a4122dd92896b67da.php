<?php
$banners = $modelBanner->start()->setType('home_banner_video')->getData()
?>
<?php if(!empty($banners)): ?>
<div class="container-indent nomargin">
  <div class="container-fluid">
    <div class="row">
      <div class="slider-revolution revolution-default">
        <div class="tp-banner-container">
          <div class="tp-banner revolution">
            <ul>
              <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li data-thumb="<?php echo e(sc_file($banner->image)); ?>" data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
                  <img src="<?php echo e(sc_file($banner->image)); ?>"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >
                  <div class="tp-caption tp-fade fadeout fullscreenvideo"
										data-x="0"
										data-y="0"
										data-speed="600"
										data-start="0"
										data-easing="Power4.easeOut"
										data-endspeed="1500"
										data-endeasing="Power4.easeIn"
										data-autoplay="true"
										data-autoplayonlyfirsttime="false"
										data-nextslideatend="true"
										data-forceCover="1"
										data-dottedoverlay="twoxtwo"
										data-aspectratio="16:9">
										<video class="video-js vjs-default-skin" preload="none"
											poster='<?php echo e(sc_file($banner->image)); ?>' data-setup="{}">
											<source src='<?php echo sc_html_render($banner->html); ?>' type='video/mp4'>
										</video>
                  </div>
                  <div class="tp-caption  tp-fade"
										data-x="right"
										data-y="bottom"
										data-voffset="-60"
										data-hoffset="-90"
										data-speed="600"
										data-start="900"
										data-easing="Power4.easeOut"
										data-endeasing="Power4.easeIn">
										<div class="video-play">
											<a class="icon-f-29 btn-play" href="javascript:;"></a>
											<a class="icon-f-28 btn-pause" href="javascript:;"></a>
										</div>
									</div>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>


<?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/block/home_banner_video.blade.php ENDPATH**/ ?>