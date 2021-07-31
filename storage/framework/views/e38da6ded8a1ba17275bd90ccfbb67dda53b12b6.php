<?php if(sc_store('active') == '1'  || (sc_store('active') == '0' && auth()->guard('admin')->user())): ?>
        
    <?php if(sc_store('active') == '0' && auth()->guard('admin')->user()): ?>
        <?php echo $__env->make($sc_templatePath . '.maintenance_note', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
	<meta charset="utf-8">
	<title><?php echo e($title??sc_store('title')); ?></title>
	<meta name="description" content="<?php echo e($description??sc_store('description')); ?>">
    <meta name="keyword" content="<?php echo e($keyword??sc_store('keyword')); ?>">
    <meta name="author" content="Tarek Mandour">

	<link rel="icon" href="<?php echo e(sc_file(sc_store('icon', null, 'images/icon.png'))); ?>" type="image/png" sizes="16x16">
    <meta property="og:image" content="<?php echo e(!empty($og_image)?sc_file($og_image):sc_file('images/org.jpg')); ?>" />
    <meta property="og:url" content="<?php echo e(\Request::fullUrl()); ?>" />
    <meta property="og:type" content="Website" />
    <meta property="og:title" content="<?php echo e($title??sc_store('title')); ?>" />
    <meta property="og:description" content="<?php echo e($description??sc_store('description')); ?>" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- css default for item -->
    <?php echo $__env->make($sc_templatePath.'.common.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--//end css defaut -->

    <!--Module meta -->
    <?php if(isset($sc_blocksContent['meta'])): ?>
    <?php $__currentLoopData = $sc_blocksContent['meta']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $arrPage = explode(',', $layout->page)
    ?>
    <?php if($layout->page == '*' || (isset($layout_page) && in_array($layout_page, $arrPage))): ?>
    <?php if($layout->type =='html'): ?>
    <?php echo $layout->text; ?>

    <?php endif; ?>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <!--//Module meta -->

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo e(sc_file($sc_templateFile.'/css/icons.css')); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo e(sc_file($sc_templateFile.'/css/theme.css')); ?>">
    
    <?php if(session('layout') == 1): ?>
    <link href="<?php echo e(sc_file($sc_templateFile.'/css/rtl.css')); ?>" rel="stylesheet">
    <?php endif; ?>

    <style>
        <?php echo sc_store_css(); ?>

    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>

</head>


<body>
    <div id="loader-wrapper">
        <div id="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    
    
    <?php $__env->startSection('block_header'); ?>
    <?php echo $__env->make($sc_templatePath.'.block_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
    

    
    
    <div id="tt-pageContent">
        
        <?php $__env->startSection('block_top'); ?>
        <?php echo $__env->make($sc_templatePath.'.block_top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldSection(); ?>
        

        
        <?php $__env->startSection('block_main'); ?>
            <?php $__env->startSection('block_main_content'); ?>
            <?php echo $__env->make($sc_templatePath.'.block_main_content_left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make($sc_templatePath.'.block_main_content_center', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make($sc_templatePath.'.block_main_content_right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldSection(); ?>
        <?php echo $__env->yieldSection(); ?>

        <?php echo $__env->yieldContent('news'); ?>

        
        <?php $__env->startSection('block_bottom'); ?>
        <?php echo $__env->make($sc_templatePath.'.block_bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldSection(); ?>
        

        
        <?php $__env->startSection('block_footer'); ?>
        <?php echo $__env->make($sc_templatePath.'.block_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldSection(); ?>
        

    </div>

    

    <script src="<?php echo e(sc_file($sc_templateFile.'/external/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/elevatezoom/jquery.elevatezoom.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/slick/slick.min.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/panelmenu/panelmenu.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/instafeed/instafeed.min.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/rs-plugin/js/jquery.themepunch.tools.min.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/rs-plugin/js/jquery.themepunch.revolution.min.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/countdown/jquery.plugin.min.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/countdown/jquery.countdown.min.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/isotope/imagesloaded.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/isotope/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/magnific-popup/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/air-sticky/air-sticky-block.min.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/lazyLoad/lazyload.min.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/js/main.js')); ?>"></script>
    <!-- form validation and sending to mail -->
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/form/jquery.form.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/form/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(sc_file($sc_templateFile.'/external/form/jquery.form-init.js')); ?>"></script>

    <!-- js default for item -->
    <?php echo $__env->make($sc_templatePath.'.common.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--//end js defaut -->
    <?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html>

<?php else: ?>
    <?php echo $__env->make($sc_templatePath . '.maintenance', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/layout.blade.php ENDPATH**/ ?>