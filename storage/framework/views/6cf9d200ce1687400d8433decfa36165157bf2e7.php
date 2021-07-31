<?php if(!empty($details) && count($details)): ?>
    <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupId => $detailsGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="tt-wrapper">
            <div class="tt-title-options"><?php echo $groups[$groupId]??'Not found'; ?>:</div>
            <ul class="list-form-inline">
                
                <?php $__currentLoopData = $detailsGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $valueOption = $detail->name.' __ '.$detail->add_price;
                ?>

                <li>
                    <label class="radio">
                    <input id="radio" type="radio" name="form_attr[<?php echo e($groupId); ?>]" value="<?php echo e($valueOption); ?>" <?php echo e((($k == 0) ? "checked" : "")); ?>>
                    <span class="outer"><span class="inner"></span></span><?php echo sc_render_option_price($valueOption); ?></label>
                </li>
                        
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </ul>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/common/render_attribute.blade.php ENDPATH**/ ?>