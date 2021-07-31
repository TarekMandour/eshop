<?php
/*
$layout_page = shop_page
**Variables:**
- $page: no paginate
*/ 
?>



<?php $__env->startSection('block_main'); ?>
<div class="container-indent">
	<div class="container container-fluid-custom-mobile-padding">
		<div class="row justify-content-center">
			<div class="col-xs-12 col-md-10 col-lg-8 col-md-auto">
				<div class="tt-post-single">
					<h1 class="tt-title">
						<?php echo e($title ?? ''); ?>

					</h1>
					<div class="tt-post-content">
						<?php echo sc_html_render($page->content); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php if(!empty($layout_page && $includePathView = config('sc_include_view.'.$layout_page, []))): ?>
<?php $__currentLoopData = $includePathView; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if(view()->exists($view)): ?>
    <?php echo $__env->make($view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


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

<?php if(!empty($layout_page) && $includePathScript = config('sc_include_script.'.$layout_page, [])): ?>
<?php $__currentLoopData = $includePathScript; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if(view()->exists($script)): ?>
    <?php echo $__env->make($script, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make($sc_templatePath.'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/screen/shop_page.blade.php ENDPATH**/ ?>