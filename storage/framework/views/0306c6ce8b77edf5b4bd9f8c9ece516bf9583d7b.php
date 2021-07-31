

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body table-responsivep-0">
       <table class="table table-hover box-body text-wrap table-bordered">
         <tbody>
           <?php $__currentLoopData = $configDisplay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $config): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <tr>
               <td><?php echo e(sc_language_render($config->detail)); ?></td>
               <td align="left"><a href="#" class="editable-required editable editable-click" data-name="<?php echo e($config->key); ?>" data-type="number" data-pk="<?php echo e($config->key); ?>" data-source="" data-url="<?php echo e($urlUpdateConfig); ?>" data-title="<?php echo e(sc_language_render($config->detail)); ?>" data-value="<?php echo e($config->value); ?>" data-original-title="" title=""><?php echo e($config->value); ?></a></td>
             </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
       </table>
      </div>
    </div>
  </div>
</div><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/screen/config_store/config_display.blade.php ENDPATH**/ ?>