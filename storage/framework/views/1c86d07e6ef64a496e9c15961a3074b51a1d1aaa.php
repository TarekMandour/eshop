
<?php
    $orderNew = \EShop\Core\Admin\Models\AdminOrder::getCountOrderNew()
?>

  <!--begin::Notifications-->
  <div class="dropdown">
    <!--begin::Toggle-->
    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
      <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Notifications1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <path d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z" fill="#000000"/>
              <rect fill="#000000" opacity="0.3" x="10" y="16" width="4" height="4" rx="2"/>
          </g>
          </svg><!--end::Svg Icon-->
        </span>
        <span class="pulse-ring"></span>
      </div>
    </div>
    <!--end::Toggle-->
    <!--begin::Dropdown-->
    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
      <form>
        <!--begin::Header-->
        <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url(<?php echo e(sc_file('admin/metro/assets/media/misc/bg-1.jpg')); ?>)">
          <!--begin::Title-->
          <h4 class="d-flex flex-center rounded-top">
            <span class="text-white"><?php echo e(trans('admin.menu_notice.new_order')); ?></span>
            <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2"><?php echo e($orderNew); ?></span>
          </h4>
          <!--end::Title-->
          <br><br>
        </div>
        <!--end::Header-->

      </form>
    </div>
    <!--end::Dropdown-->
  </div>
  <!--end::Notifications-->
<?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/component/notice.blade.php ENDPATH**/ ?>