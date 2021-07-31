<h4 class="tt-title">
    <?php echo e(trans('cart.coupon')); ?>

</h4>

<div id="coupon-group" class="form-group <?php echo e(Session::has('error_discount')?'has-error':''); ?> mt-2">
    <input type="text" <?php echo e(($plugin['permission'])?'':'disabled'); ?> class="form-control" placeholder="<?php echo e(trans('cart.coupon')); ?>" id="coupon-value" aria-describedby="inputGroupSuccess3Status">
</div>
<span class="btn input-group-text <?php echo e(($plugin['permission'])?'':'disabled'); ?>" <?php echo ($plugin['permission'])?'id="coupon-button"':''; ?>  data-loading-text="<i class='fa fa-spinner fa-spin'></i> checking"><?php echo e(trans('cart.apply')); ?></span>
<span class="status-coupon" style="display: none;" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
<div class="coupon-msg  <?php echo e(Session::has('error_discount')?'text-danger':''); ?>" style="text-align: left;padding-left: 10px; <?php echo e(Session::has('error_discount')? 'color:red':''); ?>"><?php echo e(Session::has('error_discount')?Session::get('error_discount'):''); ?></div><?php /**PATH C:\xampp7\htdocs\eshop\app\Plugins\Total\Discount/Views/render.blade.php ENDPATH**/ ?>