<!DOCTYPE html>
<html>

	<!--begin::Head-->
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title><?php echo e(sc_config_admin('ADMIN_TITLE')); ?> | <?php echo e($title??''); ?></title>
		<meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="<?php echo e(sc_file('admin/metro/assets/css/pages/login/login-4.css')); ?>" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?php echo e(sc_file('admin/metro/assets/plugins/global/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(sc_file('admin/metro/assets/plugins/custom/prismjs/prismjs.bundle.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(sc_file('admin/metro/assets/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="<?php echo e(sc_file('admin/metro/assets/css/themes/layout/header/base/light.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(sc_file('admin/metro/assets/css/themes/layout/header/menu/light.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(sc_file('admin/metro/assets/css/themes/layout/brand/dark.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(sc_file('admin/metro/assets/css/themes/layout/aside/dark.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="icon" href="<?php echo e(sc_file('images/icon.png')); ?>" type="image/png" sizes="16x16">
  </head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Content-->
				<div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white" style="background-image: url(<?php echo e(sc_file('admin/metro/assets/media/bg/bg2.jpg')); ?>);">
					<!--begin::Wrapper-->
					<div class="login-content d-flex flex-column pt-lg-0 pt-12">
						<!--begin::Logo-->
						
						<!--end::Logo-->
						<!--begin::Signin-->
						<div class="login-form">
							<!--begin::Form-->
                            <form class="form" action="<?php echo e(sc_route_admin('admin.login')); ?>" method="POST">
                              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
								<!--begin::Title-->
								<div class="pb-5 pb-lg-15">
									<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg"><?php echo e(trans('admin.login')); ?></h3>
								</div>
								<!--begin::Title-->
                <!--begin::Form group-->
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark"><?php echo e(trans('admin.username')); ?></label>
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0 <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="username" type="text" name="username"  placeholder="<?php echo e(trans('admin.username')); ?>" value="<?php echo e(old('username')); ?>" required autocomplete="email" autofocus />
                                    <?php if($errors->has('username')): ?>
                                    <?php $__currentLoopData = $errors->get('username'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </div>
								<!--end::Form group-->
                <!--begin::Form group-->
								<div class="form-group">

                  <label class="font-size-h6 font-weight-bolder text-dark"><?php echo e(trans('admin.password')); ?></label>
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" type="password" name="password" placeholder="<?php echo e(trans('admin.password')); ?>" required autocomplete="current-password" />
                                    <?php if($errors->has('password')): ?>
                                    <?php $__currentLoopData = $errors->get('password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </div>
                                <!--end::Form group-->
                                <div class="kt-login__extra">
                                    <label class="kt-checkbox">
                                        <input type="checkbox" name="remember" value="1"
                                        <?php echo e((old('remember')) ? 'checked' : ''); ?>> <?php echo e(trans('admin.remember_me')); ?>

                                        <span></span>
                                    </label>
                                </div>


								<!--begin::Action-->
								<div class="pb-lg-0 pb-5">
									<button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3"><?php echo e(trans('admin.login')); ?></button>
                                </div>
								<!--end::Action-->
                            </form>
                            <!--end::Form-->
						</div>
						<!--end::Signin-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--begin::Content-->
				<!--begin::Aside-->
				<div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
					<div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom" style="background-image: url(<?php echo e(sc_file('admin/metro/assets/media/svg/illustrations/login-visual-4.png')); ?>);">
						<!--begin::Aside title-->
						<h3 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">We Got
						<br />A Surprise
						<br />For You</h3>
						<!--end::Aside title-->
					</div>
				</div>
				<!--end::Aside-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->

		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="<?php echo e(sc_file('admin/metro/assets/plugins/global/plugins.bundle.js')); ?>"></script>
		<script src="<?php echo e(sc_file('admin/metro/assets/plugins/custom/prismjs/prismjs.bundle.js')); ?>"></script>
		<script src="<?php echo e(sc_file('admin/metro/assets/js/scripts.bundle.js')); ?>"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="<?php echo e(sc_file('admin/metro/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')); ?>"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
    <script src="<?php echo e(sc_file('admin/metro/assets/js/pages/widgets.js')); ?>"></script>
    <!--end::Page Scripts-->
		  <?php
    $message=session()->get("message");
    ?>

    <?php if( session()->has("message")): ?>
        <?php if( $message == "Success"): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: "<?php echo e(__('lang.Success')); ?>",
                    text: "<?php echo e(__('lang.Success_text')); ?>",
                    type:"success" ,
                    timer: 1000,
                    showConfirmButton: false
                });

            </script>
        <?php elseif( $message == "Failed"): ?>
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: "عفوا",
                    text: "عفوا كلمة المرور غير صحيحة ",
                    type:"error" ,
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        <?php endif; ?>
    <?php endif; ?>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>




    <?php $__env->startPush('styles'); ?>

    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>

    <?php $__env->stopPush(); ?><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>