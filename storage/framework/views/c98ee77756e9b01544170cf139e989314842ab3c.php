<?php
$banners = $modelBanner->start()->setType('4x_banner')->getData();

?>
<?php if(!empty($banners)): ?>
<div class="nomargin container-indent">
  <div class="container">
    <div class="row flex-sm-row-reverse tt-layout-promo-box">
      <div class="col-sm-12 col-md-6">
        <div class="row">
          <div class="col-sm-6">
            <a href="<?php echo e(sc_route('banner.click',['id' => $banners[3]->id])); ?>" target="<?php echo e($banners[3]->target); ?>" class="tt-promo-box tt-one-child hover-type-2">
              <img src="<?php echo e(sc_file('images/loader.svg')); ?>" data-src="<?php echo e(sc_file($banners[3]->image)); ?>" alt="">
            </a>
          </div>
          <div class="col-sm-6">
            <a href="<?php echo e(sc_route('banner.click',['id' => $banners[2]->id])); ?>" target="<?php echo e($banners[2]->target); ?>" class="tt-promo-box tt-one-child hover-type-2">
              <img src="<?php echo e(sc_file('images/loader.svg')); ?>" data-src="<?php echo e(sc_file($banners[2]->image)); ?>" alt="">
            </a>
          </div>
          <div class="col-sm-12">
            <a href="<?php echo e(sc_route('banner.click',['id' => $banners[1]->id])); ?>" target="<?php echo e($banners[1]->target); ?>" class="tt-promo-box tt-one-child">
              <img src="<?php echo e(sc_file('images/loader.svg')); ?>" data-src="<?php echo e(sc_file($banners[1]->image)); ?>" alt="">
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <a href="<?php echo e(sc_route('banner.click',['id' => $banners[0]->id])); ?>" target="<?php echo e($banners[0]->target); ?>" class="tt-promo-box">
          <img src="<?php echo e(sc_file('images/loader.svg')); ?>" data-src="<?php echo e(sc_file($banners[0]->image)); ?>" alt="">
        </a>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>


<?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/block/4x_banner.blade.php ENDPATH**/ ?>