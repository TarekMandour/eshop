

<div class="row">

  <div class="col-md-5">
    <div class="card">
      <div class="card-header with-border">
        <h3 class="card-title"><?php echo e(trans('product.admin.setting_info')); ?></h3>
      </div>

      <div class="card-body table-responsivep-0">
       <table class="table table-hover box-body text-wrap table-bordered">
         <tbody>
           <?php $__currentLoopData = $productConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $config): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php if($config['key'] == 'product_tax'): ?>
           <tr>
            <td><?php echo e(trans('product.config_manager.tax')); ?></td>
            <td><a href="#" class="editable-required" data-name="product_tax" data-type="select" data-pk="" data-source="<?php echo e(json_encode($taxs)); ?>" data-url="<?php echo e($urlUpdateConfig); ?>" data-title="<?php echo e(trans('product.config_manager.tax')); ?>" data-value="<?php echo e(sc_config('product_tax', $storeId)); ?>" data-original-title="" title="" data-placement="left"></a></td>
          </tr>
           <?php else: ?>
           <tr>
            <td><?php echo e(sc_language_render($config['detail'])); ?></td>
            <td><input class="check-data-config" data-store="<?php echo e($storeId); ?>"  type="checkbox" name="<?php echo e($config['key']); ?>"  <?php echo e($config['value']?"checked":""); ?>></td>
          </tr>
           <?php endif; ?>

           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
       </table>
      </div>
    </div>
  </div>

  <div class="col-md-7">
    <div class="card">
      <div class="card-header with-border">
        <h3 class="card-title"><?php echo e(trans('product.admin.setting_info')); ?></h3>
      </div>

      <div class="card-body table-responsivep-0">
       <table class="table table-hover box-body text-wrap table-bordered">
        <thead>
          <tr>
            <th><?php echo e(trans('product.config_manager.field')); ?></th>
            <th><?php echo e(trans('product.config_manager.value')); ?></th>
            <th><?php echo e(trans('product.config_manager.required')); ?></th>
          </tr>
        </thead>
         <tbody>
           <?php $__currentLoopData = $productConfigAttribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $config): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <td><?php echo e(sc_language_render($config['detail'])); ?></td>
            <td><input class="check-data-config" data-store="<?php echo e($storeId); ?>"  type="checkbox" name="<?php echo e($config['key']); ?>"  <?php echo e($config['value']?"checked":""); ?>></td>
            <td>
              <?php if(!empty($productConfigAttributeRequired[$key.'_required'])): ?>
              <input class="check-data-config" data-store="<?php echo e($storeId); ?>"  type="checkbox" name="<?php echo e($productConfigAttributeRequired[$key.'_required']['key']); ?>"  <?php echo e($productConfigAttributeRequired[$key.'_required']['value']?"checked":""); ?>>
              <?php endif; ?>
            </td>
          </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
       </table>
      </div>
    </div>
  </div>

</div><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/screen/config_store/config_product.blade.php ENDPATH**/ ?>