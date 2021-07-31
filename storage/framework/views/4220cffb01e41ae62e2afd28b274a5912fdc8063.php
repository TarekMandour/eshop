<?php
    /*
    $layout_page = shop_home
    **Variables:**
    - $products: paginate
    Use paginate: $products->appends(request()->except(['page','_token']))->links()
    */
?>





<?php $__env->startSection('block_main'); ?>

<div class="container-indent">
    <div class="container">
        <div class="tt-layout-promo-box">
            <div class="row">
                <?php $categoriesTop = $modelCategory->start()->getCategoryTop()->getData(); ?>
                <?php if($categoriesTop->count()): ?>
                    <?php $__currentLoopData = $categoriesTop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-md-4">
                            <a href="<?php echo e($category->getUrl()); ?>" class="tt-promo-box tt-one-child">
                                <img src="<?php echo e(sc_file('images/loader.svg')); ?>" data-src="<?php echo e(sc_file($category->image)); ?>" alt="<?php echo e($category->title); ?>">
                                <div class="tt-description">
                                    <div class="tt-description-wrapper">
                                        <div class="tt-background"></div>
                                        <div class="tt-title-small"><?php echo e($category->title); ?></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>




<?php $__env->startSection('breadcrumb'); ?>
<div class="tt-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="<?php echo e(sc_route('home')); ?>"><?php echo e(trans('front.home')); ?></a></li>
            <li><?php echo e($title ?? ''); ?></li>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $('[name="filter_sort"]').change(function (event) {
            $('#filter_sort').submit();
        });
    </script>

    
    <?php if(!empty($layout_page) && $includePathScript = config('sc_include_script.'.$layout_page, [])): ?>
        <?php $__currentLoopData = $includePathScript; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(view()->exists($script)): ?>
                <?php echo $__env->make($script, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    

<?php $__env->stopPush(); ?>
<?php echo $__env->make($sc_templatePath.'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/screen/shop_home.blade.php ENDPATH**/ ?>