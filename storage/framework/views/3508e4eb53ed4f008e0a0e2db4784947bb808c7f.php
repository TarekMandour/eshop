<?php $__env->startSection('main'); ?>
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container py-8">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">


                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-store-order-tab" data-toggle="pill"
                               href="#tab-store-order" role="tab" aria-controls="tab-store-order"
                               aria-selected="false"><?php echo e(trans('store.admin.config_order')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-store-customer-tab" data-toggle="pill"
                               href="#tab-store-customer" role="tab" aria-controls="tab-store-customer"
                               aria-selected="false"><?php echo e(trans('store.admin.config_customer')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-store-product-tab" data-toggle="pill" href="#tab-store-product"
                               role="tab" aria-controls="tab-store-product"
                               aria-selected="false"><?php echo e(trans('store.admin.config_product')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-store-email-tab" data-toggle="pill" href="#tab-store-email"
                               role="tab" aria-controls="tab-store-email"
                               aria-selected="false"><?php echo e(trans('store.admin.config_email')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-store-url-tab" data-toggle="pill" href="#tab-store-url"
                               role="tab" aria-controls="tab-store-url"
                               aria-selected="false"><?php echo e(trans('store.admin.config_url')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-store-captcha-tab" data-toggle="pill" href="#tab-store-captcha"
                               role="tab" aria-controls="tab-store-captcha"
                               aria-selected="false"><?php echo e(trans('captcha.captcha_title')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-store-display-tab" data-toggle="pill" href="#tab-store-display"
                               role="tab" aria-controls="tab-store-display"
                               aria-selected="false"><?php echo e(trans('store.admin.config_display')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-admin-other-tab" data-toggle="pill" href="#tab-admin-other"
                               role="tab" aria-controls="tab-admin-other"
                               aria-selected="false"><?php echo e(trans('store.admin.config_admin_other')); ?></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        
                        <div class="tab-pane fade  fade active show" id="tab-store-order" role="tabpanel"
                             aria-labelledby="store-order">
                            <?php echo $__env->make($templatePathAdmin.'screen.config_store.config_order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        

                        
                        <div class="tab-pane fade" id="tab-store-customer" role="tabpanel"
                             aria-labelledby="tab-store-customer-tab">
                            <?php echo $__env->make($templatePathAdmin.'screen.config_store.config_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        

                        
                        <div class="tab-pane fade" id="tab-store-product" role="tabpanel"
                             aria-labelledby="tab-store-product-tab">
                            <?php echo $__env->make($templatePathAdmin.'screen.config_store.config_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        

                        
                        <div class="tab-pane fade" id="tab-store-email" role="tabpanel"
                             aria-labelledby="tab-store-email-tab">
                            <?php echo $__env->make($templatePathAdmin.'screen.config_store.config_mail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        


                        
                        <div class="tab-pane fade" id="tab-store-url" role="tabpanel"
                             aria-labelledby="tab-store-url-tab">
                            <?php echo $__env->make($templatePathAdmin.'screen.config_store.config_url', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        

                        
                        <div class="tab-pane fade" id="tab-store-captcha" role="tabpanel"
                             aria-labelledby="tab-store-captcha-tab">
                            <?php echo $__env->make($templatePathAdmin.'screen.config_store.config_captcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        

                        
                        <div class="tab-pane fade" id="tab-store-display" role="tabpanel"
                             aria-labelledby="tab-store-display-tab">
                            <?php echo $__env->make($templatePathAdmin.'screen.config_store.config_display', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        

                        
                        <div class="tab-pane fade" id="tab-admin-other" role="tabpanel"
                             aria-labelledby="tab-admin-other-tab">
                            <?php echo $__env->make($templatePathAdmin.'screen.config_store.config_admin_other', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        


                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <!-- Ediable -->
    <link rel="stylesheet" href="<?php echo e(sc_file('admin/plugin/bootstrap-editable.css')); ?>">
    <style type="text/css">
        #maintain_content img {
            max-width: 100%;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php if(empty($dataNotFound)): ?>
    <?php $__env->startPush('scripts'); ?>
        <!-- Ediable -->
        <script src="<?php echo e(sc_file('admin/plugin/bootstrap-editable.min.js')); ?>"></script>

        <script type="text/javascript">

            // Editable
            $(document).ready(function () {

                //  $.fn.editable.defaults.mode = 'inline';
                $.fn.editable.defaults.params = function (params) {
                    params._token = "<?php echo e(csrf_token()); ?>";
                    params.storeId = "<?php echo e($storeId); ?>";
                    return params;
                };

                $('.editable-required').editable({
                    validate: function (value) {
                        if (value == '') {
                            return '<?php echo e(trans('admin.not_empty')); ?>';
                        }
                    },
                    success: function (data) {
                        if (data.error == 0) {
                            alertJs('success', '<?php echo e(trans('admin.msg_change_success')); ?>');
                        } else {
                            alertJs('error', data.msg);
                        }
                    }
                });

                $('.editable').editable({
                    validate: function (value) {
                    },
                    success: function (data) {
                        console.log(data);
                        if (data.error == 0) {
                            alertJs('success', '<?php echo e(trans('admin.msg_change_success')); ?>');
                        } else {
                            alertMsg('error', data.msg);
                        }
                    }
                });

            });


            $('input.check-data-config').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            }).on('ifChanged', function (e) {
                var isChecked = e.currentTarget.checked;
                isChecked = (isChecked == false) ? 0 : 1;
                var name = $(this).attr('name');
                $.ajax({
                    url: '<?php echo e($urlUpdateConfig); ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "name": $(this).attr('name'),
                        "storeId": $(this).data('store'),
                        "value": isChecked
                    },
                })
                    .done(function (data) {
                        if (data.error == 0) {
                            alertJs('success', '<?php echo e(trans('admin.msg_change_success')); ?>');
                        } else {
                            alertJs('error', data.msg);
                        }
                    });

            });

            $('input.check-data-config-global').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            }).on('ifChanged', function (e) {
                var isChecked = e.currentTarget.checked;
                isChecked = (isChecked == false) ? 0 : 1;
                var name = $(this).attr('name');
                $.ajax({
                    url: '<?php echo e($urlUpdateConfigGlobal); ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "name": $(this).attr('name'),
                        "value": isChecked
                    },
                })
                    .done(function (data) {
                        if (data.error == 0) {
                            if (isChecked == 0) {
                                $('#smtp-config').hide();
                            } else {
                                $('#smtp-config').show();
                            }
                            alertJs('success', '<?php echo e(trans('admin.msg_change_success')); ?>');
                        } else {
                            alertJs('error', data.msg);
                        }
                    });

            });


        </script>

        
        <script src="<?php echo e(sc_file('admin/plugin/jquery.pjax.js')); ?>"></script>


        <script>
            // Update store_info

            //End update store_info
        </script>

    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php echo $__env->make($templatePathAdmin.'layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/screen/config_store_default.blade.php ENDPATH**/ ?>