


<div class="card">

  <div class="card-body table-responsivep-0">
   <table class="table table-hover box-body text-wrap table-bordered">
     <thead>
       <tr>
         <th><?php echo e(trans('customer.config_manager.field')); ?></th>
         <th><?php echo e(trans('customer.config_manager.value')); ?></th>
         <th><?php echo e(trans('customer.config_manager.reqired')); ?></th>
       </tr>
     </thead>
     <tbody>
       <?php $__currentLoopData = $customerConfigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customerConfig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
           <td><?php echo e(sc_language_render($customerConfig['detail'])); ?></td>
           <td><input class="check-data-config" data-store="<?php echo e($storeId); ?>" type="checkbox" name="<?php echo e($customerConfig['key']); ?>"  <?php echo e($customerConfig['value']?"checked":""); ?>></td>
           <td>
             <?php if(!empty($customerConfigsRequired[$key.'_required'])): ?>
             <input class="check-data-config" data-store="<?php echo e($storeId); ?>" type="checkbox" name="<?php echo e($customerConfigsRequired[$key.'_required']['key']); ?>"  <?php echo e($customerConfigsRequired[$key.'_required']['value']?"checked":""); ?>>
             <?php endif; ?>
           </td>
         </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </tbody>
   </table>
  </div>
</div><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/screen/config_store/config_customer.blade.php ENDPATH**/ ?>