

<div class="row">

  <div class="col-md-6">

    <div class="card">
      <div class="card-body table-responsivep-0 card-primary">
       <table class="table table-hover box-body text-wrap table-bordered">
         <tbody>
           <?php $__currentLoopData = $orderConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $config): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <tr>
               <td><?php echo e(sc_language_render($config->detail)); ?></td>
               <td><input class="check-data-config" data-store="<?php echo e($storeId); ?>"  type="checkbox" name="<?php echo e($config->key); ?>"  <?php echo e($config->value?"checked":""); ?>></td>
             </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
       </table>
      </div>
    </div>
  </div>


</div><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/screen/config_store/config_order.blade.php ENDPATH**/ ?>