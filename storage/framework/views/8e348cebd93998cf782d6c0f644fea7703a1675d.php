<?php
    $languages     = sc_language_all();
?>

    <!--begin::Languages-->
    <div class="dropdown">
        <!--begin::Toggle-->
        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
            <img class="h-20px w-20px rounded-sm" src="<?php echo e(sc_file($languages[session('locale')??app()->getLocale()]['icon'])); ?>" alt="" />
        </div>
        </div>
        <!--end::Toggle-->
        <!--begin::Dropdown-->
        <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
        <!--begin::Nav-->
        <ul class="navi navi-hover py-4">

            <!--begin::Item-->
            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="navi-item active">
            <a href="<?php echo e(sc_route_admin('admin.locale', ['code' => $key, 'layout_rtl' => $language['rtl']])); ?>" class="navi-link">
                <span class="symbol symbol-20 mr-3">
                <img src="<?php echo e(sc_file($language['icon'])); ?>" style="height: 25px;" alt="<?php echo e($language['name']); ?>" />
                </span>
                <span class="navi-text"><?php echo e($language['name']); ?></span>
            </a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            <!--end::Item-->

        </ul>
        <!--end::Nav-->
        </div>
        <!--end::Dropdown-->
    </div>
    <!--end::Languages--><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/component/language.blade.php ENDPATH**/ ?>