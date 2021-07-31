<?php $__env->startSection('main'); ?>

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
  <!--begin::Container-->
  <div class="container py-8">
    <!--begin::Notice-->
    <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">

        <div class="card-tools">
          <?php if(!empty($topMenuRight) && count($topMenuRight)): ?>
            <?php $__currentLoopData = $topMenuRight; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="menu-right">
                  <?php
                      $arrCheck = explode('view::', $item);
                  ?>
                  <?php if(count($arrCheck) == 2): ?>
                    <?php if(view()->exists($arrCheck[1])): ?>
                      <?php echo $__env->make($arrCheck[1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                  <?php else: ?>
                    <?php echo trim($item); ?>

                  <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
        <div class="card-title">
          <?php if(!empty($topMenuLeft) && count($topMenuLeft)): ?>
            <?php $__currentLoopData = $topMenuLeft; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="menu-left">
                  <?php
                  $arrCheck = explode('view::', $item);
                  ?>
                  <?php if(count($arrCheck) == 2): ?>
                    <?php if(view()->exists($arrCheck[1])): ?>
                      <?php echo $__env->make($arrCheck[1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                  <?php else: ?>
                    <?php echo trim($item); ?>

                  <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
        <!-- /.box-tools -->
      
    </div>
    <!--end::Notice-->

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
      <div class="card-header with-border">
        <div class="card-toolbar">
          <?php if(!empty($removeList)): ?>
            <div class="menu-left mr-2">
              <span class="btn btn-danger font-weight-bolder grid-trash" title="<?php echo e(trans('admin.delete')); ?>"><i class="fas fa-trash-alt"></i></span>
            </div>
          <?php endif; ?>

          <?php if(!empty($buttonRefresh)): ?>
            <div class="menu-left mr-2">
              <span class="btn btn-primary font-weight-bolder grid-refresh" title="<?php echo e(trans('admin.refresh')); ?>"><i class="fas fa-sync-alt"></i></span>
            </div>
          <?php endif; ?>

          <?php if(!empty($menuRight) && count($menuRight)): ?>
            <?php $__currentLoopData = $menuRight; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="menu-right">
                <?php
                    $arrCheck = explode('view::', $item);
                ?>
                <?php if(count($arrCheck) == 2): ?>
                  <?php if(view()->exists($arrCheck[1])): ?>
                    <?php echo $__env->make($arrCheck[1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  <?php endif; ?>
                <?php else: ?>
                  <?php echo trim($item); ?>

                <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>

        <div class="card-title">

          <?php if(!empty($buttonSort)): ?>
          <div class="menu-left">
            <div class="input-group float-right ml-1" style="width: 250px;">
              <div class="btn-group">
                <select class="form-control rounded-0 float-right" id="order_sort">
                <?php echo $optionSort??''; ?>

                </select>
              </div>
              <div class="input-group-append">
                  <button title="<?php echo e(trans('admin.sort')); ?>" id="button_sort" type="submit" class="btn btn-primary"><i class="fas fa-sort-amount-down-alt"></i></button>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <?php if(!empty($menuLeft) && count($menuLeft)): ?>
            <?php $__currentLoopData = $menuLeft; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="menu-left">
                  <?php
                      $arrCheck = explode('view::', $item);
                  ?>
                  <?php if(count($arrCheck) == 2): ?>
                    <?php if(view()->exists($arrCheck[1])): ?>
                      <?php echo $__env->make($arrCheck[1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                  <?php else: ?>
                    <?php echo trim($item); ?>

                  <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>

      </div>
      <div class="card-body" id="pjax-container">
        <?php
            $urlSort = $urlSort ?? '';
        ?>
        <div id="url-sort" data-urlsort="<?php echo strpos($urlSort, "?")?$urlSort."&":$urlSort."?"; ?>"  style="display: none;"></div>

        <!--begin: Datatable-->
        <div class="table-responsive">
          <table class="table table-head-custom table-vertical-center checkTrash" id="kt_advance_table_widget_4">
            <thead>
              <tr>
                <?php if(!empty($removeList)): ?>
                <th>
                  <label class="checkbox checkbox-lg checkbox-inline mr-2">
                    <input type="checkbox" value="1" />
                    <span></span>
                  </label>
                </th>
                <?php endif; ?>
                <?php $__currentLoopData = $listTh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($loop->last): ?>
                  <th style="min-width: 100px"><?php echo $th; ?></th>
                  <?php else: ?>
                  <th><?php echo $th; ?></th>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $dataTr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyRow => $tr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <?php if(!empty($removeList)): ?>
                  <td>
                    <label class="checkbox checkbox-lg checkbox-inline">
                      <input type="checkbox" data-id="<?php echo e($tr['id']??''); ?>" />
                      <span></span>
                    </label>
                  </td>
                  <?php endif; ?>
                  <?php $__currentLoopData = $tr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $trtd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <td><?php echo $trtd; ?></td>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          <!--end: Datatable-->
        </div>

        <div class="block-pagination clearfix m-10">
          <div class="ml-3 float-left">
            <?php echo $resultItems??''; ?>

          </div>
          <div class="pagination pagination-sm mr-3 float-right">
            <?php echo $pagination??''; ?>

          </div>
        </div>
        
      </div>
      <div class="card-footer clearfix">
        <?php if(!empty($blockBottom) && count($blockBottom)): ?>
          <?php $__currentLoopData = $blockBottom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="clearfix">
              <?php
              $arrCheck = explode('view::', $item);
              ?>
              <?php if(count($arrCheck) == 2): ?>
                <?php if(view()->exists($arrCheck[1])): ?>
                  <?php echo $__env->make($arrCheck[1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
              <?php else: ?>
                <?php echo trim($item); ?>

              <?php endif; ?>
            </div>    
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
    <!--end::Card-->
  </div>
  <!--end::Container-->
</div>
<!--end::Entry-->

<?php $__env->stopSection(); ?>


<?php $__env->startPush('styles'); ?>
<?php echo $css ?? ''; ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    
   <script src="<?php echo e(sc_file('admin/plugin/jquery.pjax.js')); ?>"></script>

  <script type="text/javascript">

    $('.grid-refresh').click(function(){
      $.pjax.reload({container:'#pjax-container'});
    });

      $(document).on('submit', '#button_search', function(event) {
        $.pjax.submit(event, '#pjax-container')
      })

    $(document).on('pjax:send', function() {
      $('#loading').show()
    })
    $(document).on('pjax:complete', function() {
      $('#loading').hide()
    })

    // tag a
    $(function(){
     $(document).pjax('a.page-link', '#pjax-container')
    })


    $(document).ready(function(){
    // does current browser support PJAX
      if ($.support.pjax) {
        $.pjax.defaults.timeout = 2000; // time in milliseconds
      }
    });

    <?php if($buttonSort): ?>
      $('#button_sort').click(function(event) {
        var url = $('#url-sort').data('urlsort')+'sort_order='+$('#order_sort option:selected').val();
        $.pjax({url: url, container: '#pjax-container'})
      });
    <?php endif; ?>

  </script>
    


<script type="text/javascript">

var selectedRows = function () {
    var selected = [];
    $('.checkTrash input:checkbox:checked').each(function(){
        if ($(this).data('id') !=null) {
          selected.push($(this).data('id'));
        }
    });

    return selected;
}

$('.grid-trash').on('click', function() {
  var ids = selectedRows().join();
  alert(ids);
  deleteItem(ids);
});

  function deleteItem(ids){
  Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: true,
  }).fire({
    title: '<?php echo e(trans('admin.confirm_delete')); ?>',
    text: "",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: '<?php echo e(trans('admin.confirm_delete_yes')); ?>',
    confirmButtonColor: "#DD6B55",
    cancelButtonText: '<?php echo e(trans('admin.confirm_delete_no')); ?>',
    reverseButtons: true,

    preConfirm: function() {
        return new Promise(function(resolve) {
            $.ajax({
                method: 'post',
                url: '<?php echo e($urlDeleteItem ?? ''); ?>',
                data: {
                  ids:ids,
                    _token: '<?php echo e(csrf_token()); ?>',
                },
                success: function (data) {
                    if(data.error == 1){
                      alertMsg('error', data.msg, '<?php echo e(trans('admin.warning')); ?>');
                      $.pjax.reload('#pjax-container');
                      return;
                    }else{
                      alertMsg('success', data.msg);
                      $.pjax.reload('#pjax-container');
                      resolve(data);
                    }

                }
            });
        });
    }

  }).then((result) => {
    if (result.value) {
      alertMsg('success', '<?php echo e(trans('admin.confirm_delete_deleted_msg')); ?>', '<?php echo e(trans('admin.confirm_delete_deleted')); ?>');
    } else if (
      // Read more about handling dismissals
      result.dismiss === Swal.DismissReason.cancel
    ) {
      // swalWithBootstrapButtons.fire(
      //   'Cancelled',
      //   'Your imaginary file is safe :)',
      //   'error'
      // )
    }
  })
}



</script>

<?php echo $js ?? ''; ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make($templatePathAdmin.'layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/screen/list.blade.php ENDPATH**/ ?>