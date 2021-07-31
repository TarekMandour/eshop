<?php echo $__env->yieldContent('breadcrumb'); ?>


<?php if(isset($sc_blocksContent['banner_top'])): ?>
<?php $__currentLoopData = $sc_blocksContent['banner_top']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$arrPage = explode(',', $layout->page)
?>
<?php if($layout->page == '*' || (isset($layout_page) && in_array($layout_page, $arrPage))): ?>
<?php if($layout->type =='html'): ?>
<?php echo $layout->text; ?>

<?php elseif($layout->type =='view'): ?>
<?php if(view()->exists($sc_templatePath.'.block.'.$layout->text)): ?>
<?php echo $__env->make($sc_templatePath.'.block.'.$layout->text, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>



<?php if(isset($sc_blocksContent['top'])): ?>
<?php $__currentLoopData = $sc_blocksContent['top']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$arrPage = explode(',', $layout->page)
?>
<?php if($layout->page == '*' || (isset($layout_page) && in_array($layout_page, $arrPage))): ?>
<?php if($layout->type =='html'): ?>
<?php echo $layout->text; ?>

<?php elseif($layout->type =='view'): ?>
<?php if(view()->exists($sc_templatePath.'.block.'.$layout->text)): ?>
<?php echo $__env->make($sc_templatePath.'.block.'.$layout->text, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>




<!--Notice -->
<?php echo $__env->make($sc_templatePath.'.common.notice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--//Notice --><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/block_top.blade.php ENDPATH**/ ?>