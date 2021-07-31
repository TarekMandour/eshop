<?php
$banners = $modelBanner->start()->setType('1x_banner')->getData()
?>
<?php if(!empty($banners)): ?>
<?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="container-indent nomargin">
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="col-sm-12 no-gutter">
        <div class="tt-promo-fullwidth">
          
          <img src="<?php echo e(sc_file('images/loader.svg')); ?>" data-src="<?php echo e(sc_file($banner->image)); ?>" alt="">
          <?php echo sc_html_render($banner->html); ?>

          
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/block/1x_banner.blade.php ENDPATH**/ ?>