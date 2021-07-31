<?php
$categoriesTop = $modelCategory->start()->getCategoryTop()->getData();
?>
<?php if($categoriesTop->count()): ?>
<div class="container-indent nomargin">
  <div class="container-fluid-custom">
    <div class="row">
      <?php $__currentLoopData = $categoriesTop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-6 col-sm-6 col-md-3 col-6-575width">
        <a href="<?php echo e($category->getUrl()); ?>" class="tt-promo-box tt-one-child">
          <img src="images/loader.svg" data-src="<?php echo e(sc_file($category->image)); ?>" alt="<?php echo e($category->title); ?>">
          <div class="tt-description">
            <div class="tt-description-wrapper">
              <div class="tt-background"></div>
              <div class="tt-title-small"><?php echo e($category->title); ?></div>
            </div>
          </div>
        </a>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>
<?php endif; ?>



<?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/block/2x_categories.blade.php ENDPATH**/ ?>