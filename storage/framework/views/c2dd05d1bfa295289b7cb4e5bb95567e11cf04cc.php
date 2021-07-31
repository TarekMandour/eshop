  <!--begin::Header-->
  <div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
      <!--begin::Header Menu Wrapper-->
      <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
        <!--begin::Header Menu-->
        <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
          <!--begin::Header Nav-->
          <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
              <a href="<?php echo e(sc_route_admin('admin.home')); ?>"><i class="flaticon-home-2"></i> <?php echo e(trans('admin.home')); ?></a>
            </h5>
            <!--end::Page Title-->
            <!--begin::Actions-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4">|</div>
            <span class="text-muted font-weight-bold mr-4"><?php echo $title??''; ?></span>
            <!--end::Actions-->
          </div>
          <!--end::Header Nav-->
        </div>
        <!--end::Header Menu-->
      </div>
      <!--end::Header Menu Wrapper-->
      <!--begin::Topbar-->
      <div class="topbar">

        <!--begin::Quick panel-->
        <div class="topbar-item">
          <div class="btn btn-icon btn-clean btn-lg mr-1" id="kt_quick_panel_toggle">
            <a href="<?php echo e(sc_route_admin('home')); ?>" target="_blank">
              <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Home.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000"/>
                </g>
                </svg>
              <!--end::Svg Icon-->
            </span>
          </a>
          </div>
        </div>
        <!--end::Quick panel-->
        
        <?php echo $__env->make($templatePathAdmin.'component.notice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make($templatePathAdmin.'component.language', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php echo $__env->make($templatePathAdmin.'component.admin_profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
      </div>
      <!--end::Topbar-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::Header--><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/header.blade.php ENDPATH**/ ?>