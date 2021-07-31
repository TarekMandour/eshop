

<ul class="nav nav-pills flex-column">
  <?php $__currentLoopData = $root_folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $root_folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="nav-item">
      <a class="nav-link" href="#" data-type="0" data-path="<?php echo e($root_folder->url); ?>">
        <i class="fa fa-folder fa-fw"></i> <?php echo e($root_folder->name); ?>

      </a>
    </li>
    <?php $__currentLoopData = $root_folder->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $directory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="nav-item sub-item">
      <a class="nav-link" href="#" data-type="0" data-path="<?php echo e($directory->url); ?>">
        <i class="fa fa-folder fa-fw"></i> <?php echo e($directory->name); ?>

      </a>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH C:\xampp7\htdocs\eshop\resources\views/vendor/laravel-filemanager/tree.blade.php ENDPATH**/ ?>