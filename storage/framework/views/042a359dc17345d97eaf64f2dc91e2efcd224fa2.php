<?php
$categoriesTop = $modelCategory->start()->getCategoryTop()->getData();
?>
<?php if($categoriesTop->count()): ?>
<div class="container-indent">
  <div class="container container-fluid-custom-mobile-padding">
    <div class="tt-block-title">
      <h1 class="tt-title"><?php echo e(trans('front.categories')); ?></h1>
    </div>
    <div class="tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-collection-listing slick-animated-show-js">
      <?php $__currentLoopData = $categoriesTop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-2 col-md-4 col-lg-3">
        <a href="<?php echo e($category->getUrl()); ?>" class="tt-collection-item">
          <div class="tt-image-box"><img src="<?php echo e(sc_file($category->image)); ?>" alt="<?php echo e($category->title); ?>"></div>
          <div class="tt-description">
            <h2 class="tt-title"><?php echo e($category->title); ?></h2>
          </div>
        </a>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>
<?php endif; ?>

<?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/block/categories.blade.php ENDPATH**/ ?>