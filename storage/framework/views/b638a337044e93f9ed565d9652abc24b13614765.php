<?php
$banners = $modelBanner->start()->setType('2x_banner')->getData()
?>
<?php if(!empty($banners)): ?>
<div class="container-indent nomargin">
  <div class="container-fluid-custom">
    <div class="row">
      <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-sm-6">
        <a href="<?php echo e(sc_route('banner.click',['id' => $banner->id])); ?>" target="<?php echo e($banner->target); ?>" class="tt-promo-box tt-one-child">
          <img src="<?php echo e(sc_file('images/loader.svg')); ?>" data-src="<?php echo e(sc_file($banner->image)); ?>" alt="">
        </a>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/block/2x_banner.blade.php ENDPATH**/ ?>