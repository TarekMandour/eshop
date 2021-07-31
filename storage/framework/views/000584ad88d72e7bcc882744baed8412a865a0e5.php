<?php
/*
$layout_page = shop_contact
*/
?>



<?php $__env->startSection('block_main'); ?>

<div class="container-indent">
    <div class="container">
        <div class="contact-map">
            <?php echo sc_store('mapg'); ?>

        </div>
    </div>
</div>

<div class="container-indent">
    <div class="container container-fluid-custom-mobile-padding">
        <div class="tt-contact02-col-list">
            <div class="row">
                <div class="col-sm-12 col-md-4 ml-sm-auto mr-sm-auto">
                    <div class="tt-contact-info">
                        <i class="tt-icon icon-f-93"></i>
                        <h6 class="tt-title">LET’S HAVE A CHAT!</h6>
                        <address>
                            <?php echo e(sc_store('long_phone')); ?><br>

                            <p><?php echo e(sc_store('email')); ?></p>
                            <?php if(sc_store('email2') != null): ?>
                                <p><?php echo e(sc_store('email2')); ?></p>
                            <?php endif; ?>
                            <?php if(sc_store('email3') != null): ?>
                                <p><?php echo e(sc_store('email3')); ?></p>
                            <?php endif; ?>
                            <?php if(sc_store('email4') != null): ?>
                                <p><?php echo e(sc_store('email4')); ?></p>
                            <?php endif; ?>
                            <?php if(sc_store('email5') != null): ?>
                                <p><?php echo e(sc_store('email5')); ?></p>
                            <?php endif; ?>
                            <?php if(sc_store('email6') != null): ?>
                                <p><?php echo e(sc_store('email6')); ?></p>
                            <?php endif; ?>
                        </address>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="tt-contact-info">
                        <i class="tt-icon icon-f-24"></i>
                        <h6 class="tt-title">VISIT OUR LOCATION</h6>
                        <address>
                            <?php echo e(sc_store('address')); ?>

                        </address>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="tt-contact-info">
                        <i class="tt-icon icon-f-92"></i>
                        <h6 class="tt-title">WORK TIME</h6>
                        <address>
                            <?php echo e(sc_store('time_active')); ?>

                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-indent">
    <div class="container container-fluid-custom-mobile-padding">
        <form id="" class="contact-form form-default" method="post" action="<?php echo e(sc_route('contact.post')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <input type="text" class="form-control  <?php echo e(($errors->has('name'))?"input-error":""); ?>"
                            name="name" placeholder="<?php echo e(trans('front.contact_form.name')); ?>" value="<?php echo e(old('name')); ?>">
                        <?php if($errors->has('name')): ?>
                        <span class="help-block">
                            <?php echo e($errors->first('name')); ?>

                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group <?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                        <input type="telephone" class="form-control <?php echo e(($errors->has('phone'))?"input-error":""); ?>"
                            name="phone" placeholder="<?php echo e(trans('front.contact_form.phone')); ?>" value="<?php echo e(old('phone')); ?>">
                        <?php if($errors->has('phone')): ?>
                        <span class="help-block">
                            <?php echo e($errors->first('phone')); ?>

                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <input type="email" class="form-control <?php echo e(($errors->has('email'))?"input-error":""); ?>"
                            name="email" placeholder="<?php echo e(trans('front.contact_form.email')); ?>" value="<?php echo e(old('email')); ?>">
                        <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <?php echo e($errors->first('email')); ?>

                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                        <input type="text" class="form-control form-control--sm <?php echo e(($errors->has('title'))?"input-error":""); ?>"
                            name="title" placeholder="<?php echo e(trans('front.contact_form.subject')); ?>" value="<?php echo e(old('title')); ?>">
                        <?php if($errors->has('title')): ?>
                        <span class="help-block">
                            <?php echo e($errors->first('title')); ?>

                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group <?php echo e($errors->has('content') ? ' has-error' : ''); ?>">
                        <textarea class="form-control <?php echo e(($errors->has('content'))?"input-error":""); ?>" rows="12"
                            cols="75" name="content" placeholder="<?php echo e(trans('front.contact_form.content')); ?>"><?php echo e(old('content')); ?></textarea>
                        <?php if($errors->has('content')): ?>
                        <span class="help-block">
                            <?php echo e($errors->first('content')); ?>

                        </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn"><?php echo e(trans('front.contact_form.submit')); ?></button>
            </div>
        </form>
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
<?php echo $__env->make($sc_templatePath.'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/screen/shop_contact.blade.php ENDPATH**/ ?>