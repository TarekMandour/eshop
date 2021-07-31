
<!--message-->
    <?php if(session()->has('success')): ?>

    <script type="text/javascript">
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        type: 'success',
        title: '<?php echo e(session('success')); ?>'
      })
    </script>
    <?php endif; ?>

    <?php if(session()->has('error')): ?>
    <script type="text/javascript">
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        type: 'error',
        title: '<?php echo e(session('error')); ?>'
      })
    </script>
    <?php endif; ?>

    <?php if(session()->has('warning')): ?>
    <script type="text/javascript">
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        type: 'warning',
        title: '<?php echo e(session('warning')); ?>'
      })
    </script>
    <?php endif; ?>
<?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/component/alerts.blade.php ENDPATH**/ ?>