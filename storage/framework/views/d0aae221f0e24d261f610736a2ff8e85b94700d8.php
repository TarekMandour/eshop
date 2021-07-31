

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body table-responsivep-0">
       <table class="table table-hover box-body text-wrap table-bordered">
         <tbody>
           <?php $__currentLoopData = $configCaptcha; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $config): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php if($config->key == 'captcha_mode'): ?>
           <tr>
            <td><?php echo e(sc_language_render($config->detail)); ?></td>
            <td><input class="check-data-config" data-store="<?php echo e($storeId); ?>" type="checkbox" name="<?php echo e($config->key); ?>"  <?php echo e($config->value ? "checked":""); ?>></td>
          </tr>
           <?php elseif($config->key == 'captcha_page'): ?>
           <tr>
            <td><?php echo e(trans('captcha.captcha_page_help')); ?></td>
            <td align="left"><a href="#" class="editable-required editable editable-click" data-name="<?php echo e($config->key); ?>" data-type="checklist" data-pk="<?php echo e($config->key); ?>" data-source="<?php echo e(json_encode($captcha_page)); ?>" data-url="<?php echo e($urlUpdateConfig); ?>" data-title="<?php echo e(sc_language_render($config->detail)); ?>" data-value="<?php echo e($config->value); ?>" data-original-title="" title=""></a></td>
          </tr>
           <?php elseif($config->key == 'captcha_method'): ?>
          <tr>
            <td><?php echo e(sc_language_render($config->detail)); ?></td>
            <td align="left"><a href="#" class="editable-required editable editable-click" data-name="<?php echo e($config->key); ?>" data-type="select" data-pk="<?php echo e($config->key); ?>" data-source="<?php echo e(json_encode($pluginCaptchaInstalled)); ?>" data-url="<?php echo e($urlUpdateConfig); ?>" data-title="<?php echo e(sc_language_render($config->detail)); ?>" data-value="<?php echo e($config->value); ?>" data-original-title="" title=""></a></td>
          </tr>
          <?php else: ?>
          <tr>
            <td><?php echo e(sc_language_render($config->detail)); ?></td>
            <td align="left"><a href="#" class="editable-required editable editable-click" data-name="<?php echo e($config->key); ?>" data-type="text" data-pk="<?php echo e($config->key); ?>" data-source="" data-url="<?php echo e($urlUpdateConfig); ?>" data-title="<?php echo e(sc_language_render($config->detail)); ?>" data-value="<?php echo e($config->value); ?>" data-original-title="" title=""></a></td>
          </tr>
           <?php endif; ?>

           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
       </table>
      </div>
    </div>
  </div>
</div><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/screen/config_store/config_captcha.blade.php ENDPATH**/ ?>