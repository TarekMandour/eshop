<?php
    $points = (new App\Plugins\Cms\ProductReview\Models\PluginModel)->getPointProduct($product->id);
    $pathPlugin = (new App\Plugins\Cms\ProductReview\AppConfig)->pathPlugin;
?>
<script>
    $('#button-review').click(function(){
       $('#form-review').submit();
    });

    $('.r-remove').click(function(){
       var cf = confirm('<?php echo e(trans($pathPlugin.'::lang.confirm_remove')); ?>');
       if (cf) {
          var id = $(this).data('id');
          $.ajax({
             url: '<?php echo e(sc_route('product_review.removeReview')); ?>',
             type: 'POST',
             dataType: 'json',
             data: {
                 _token: "<?php echo e(csrf_token()); ?>",
                 'id': id,
             },
         })
         .done(function(result) {
             if(result.error == 0) {
                location.reload();
             } else {
                //
             }
         })
         .fail(function() {
             console.log("error");
         })
      }
    
    });
</script><?php /**PATH C:\xampp7\htdocs\eshop\app\Plugins\Cms\ProductReview/Views/script.blade.php ENDPATH**/ ?>