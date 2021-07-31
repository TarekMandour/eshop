<script type="text/javascript">
  function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
  }
  $('#shipping').change(function(){
    $('#total').html(formatNumber(parseInt(<?php echo e(Cart::subtotal()); ?>)+ parseInt($('#shipping').val())));
  });
</script>

<script src="<?php echo e(sc_file('js/sweetalert2.all.min.js')); ?>"></script>
<script>
      function alertJs(type = 'error', msg = '') {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-start',
        showConfirmButton: false,
        timer: 3000
      });
      Toast.fire({
        type: type,
        title: msg
      })
    }

    function alertMsg(type = 'error', msg = '', note = '') {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: true,
      });
      swalWithBootstrapButtons.fire(
        msg,
        note,
        type
      )
    }
</script>

<!--process cart-->
<script type="text/javascript">
  $.ajax({
    url: '/get_json',
    type: 'get',
    dataType: 'json',
    success: function(response){
      var len = 0;

      if(response['cart'] != null){
        len = response['cart'].length;
      }
      
      if(len > 0){
        
        for(var i=0; i<len; i++){
          var rowId = response['cart'][i]['rowId'];
          var storeId = response['cart'][i]['storeId'];
          var id = response['cart'][i]['id'];
          var name = response['cart'][i]['name'];
          var price = response['cart'][i]['price'];
          var qty = response['cart'][i]['qty'];
          var pro_image = response['products_list'][i];

          var product = '$modelProduct->start()->getDetail('+id+', null, '+storeId+')';
          var tr_str = '<div class="tt-item">';
          tr_str +=   '<a href="javascript:;">';
          tr_str +=     '<div class="tt-item-img"><img src="http://127.0.0.1:8000'+pro_image+'" ></div>';
          tr_str +=   '<div class="tt-item-descriptions">';
          tr_str +=    '<h2 class="tt-title">'+ name +'</h2>';
          tr_str +=        '<div class="tt-quantity">'+ qty +' X</div> <div class="tt-price">'+ price +'</div>';
          tr_str +=        '</div></a>';
          tr_str +=        '<div class="tt-item-close">';
          tr_str +=            '<a onclick="cartremove(this)" data-line="http://127.0.0.1:8000/cart/remove/'+rowId+'" class="tt-btn-close"></a>';
          tr_str +=         '</div></div>';
          $(".appcart").append(tr_str);
          $(".sub_total_price").html(response['dataTotal'][0]['value']);
        }
      } else{
        var tr_str = '<div class="minicart-empty js-minicart-empty"><div class="minicart-empty-text"><?php echo e(trans("cart.cart_empty")); ?></div><div class="minicart-empty-icon"><i class="icon-shopping-bag"></i><svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;" xml:space="preserve"><path class="st0" d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z" /></svg></div></div>';
        $(".appcart").append(tr_str);
        $(".sub_total_price").html(0);
      }
    }, error: function (error) {
      var tr_str = '<div class="minicart-empty js-minicart-empty"><div class="minicart-empty-text"><?php echo e(trans("cart.cart_empty")); ?></div><div class="minicart-empty-icon"><i class="icon-shopping-bag"></i><svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;" xml:space="preserve"><path class="st0" d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z" /></svg></div></div>';
        $(".appcart").append(tr_str);
        $(".sub_total_price").html(0);
    }
  });

  function cartremove(element) {

    $.ajax({
      url: $(element).data("line"),
      type: 'GET',
      dataType: 'JSON',
      success: function(response){
        $.ajax({
          url: '/get_json',
          type: 'get',
          dataType: 'json',
          success: function(response){
            $(".appcart").html('');
            var len = 0;

            if(response['cart'] != null){
              len = response['cart'].length;
              $('.tt-badge-cart').html(len);
            } 
            
            if(len > 0){
              $('.tt-badge-cart').html(len);
              for(var i=0; i<len; i++){
                var rowId = response['cart'][i]['rowId'];
                var storeId = response['cart'][i]['storeId'];
                var id = response['cart'][i]['id'];
                var name = response['cart'][i]['name'];
                var price = response['cart'][i]['price'];
                var qty = response['cart'][i]['qty'];
                var pro_image = response['products_list'][i];

                var product = '$modelProduct->start()->getDetail('+id+', null, '+storeId+')';
                  var tr_str = '<div class="tt-item">';
                  tr_str +=   '<a href="javascript:;">';
                  tr_str +=     '<div class="tt-item-img"><img src="http://127.0.0.1:8000'+pro_image+'" alt=""></div>';
                  tr_str +=   '<div class="tt-item-descriptions">';
                  tr_str +=    '<h2 class="tt-title">'+ name +'</h2>';
                  tr_str +=        '<div class="tt-quantity">'+ qty +' X</div> <div class="tt-price">'+ price +'</div>';
                  tr_str +=        '</div></a>';
                  tr_str +=        '<div class="tt-item-close">';
                  tr_str +=            '<a onclick="cartremove(this)" data-line="http://127.0.0.1:8000/cart/remove/'+rowId+'" class="tt-btn-close"></a>';
                  tr_str +=         '</div></div>';
                $(".appcart").append(tr_str);
                $(".sub_total_price").html(response['dataTotal'][0]['value']);
              }
            } else{
              var tr_str = '<div class="minicart-empty js-minicart-empty"><div class="minicart-empty-text"><?php echo e(trans("cart.cart_empty")); ?></div><div class="minicart-empty-icon"><i class="icon-shopping-bag"></i><svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;" xml:space="preserve"><path class="st0" d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z" /></svg></div></div>';
              $(".appcart").append(tr_str);
              $(".sub_total_price").html(0);
            }
          }, error: function (error) {
            var tr_str = '<div class="minicart-empty js-minicart-empty"><div class="minicart-empty-text"><?php echo e(trans("cart.cart_empty")); ?></div><div class="minicart-empty-icon"><i class="icon-shopping-bag"></i><svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;" xml:space="preserve"><path class="st0" d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z" /></svg></div></div>';
              $(".appcart").append(tr_str);
              $(".sub_total_price").html(0);
          }
        });
      }, error: function (error) {
        $.ajax({
          url: '/get_json',
          type: 'get',
          dataType: 'json',
          success: function(response){
            var len = 0;
            $(".appcart").html('');

            if(response['cart'] != null){
              len = response['cart'].length;
              $('.tt-badge-cart').html(response['cart'].length);
            }
            
            if(len > 0){
              $('.tt-badge-cart').html(len);
              for(var i=0; i<len; i++){
                var rowId = response['cart'][i]['rowId'];
                var storeId = response['cart'][i]['storeId'];
                var id = response['cart'][i]['id'];
                var name = response['cart'][i]['name'];
                var price = response['cart'][i]['price'];
                var qty = response['cart'][i]['qty'];
                var pro_image = response['products_list'][i];

                var product = '$modelProduct->start()->getDetail('+id+', null, '+storeId+')';
                  var tr_str = '<div class="tt-item">';
                  tr_str +=   '<a href="javascript:;">';
                  tr_str +=     '<div class="tt-item-img"><img src="http://127.0.0.1:8000'+pro_image+'" ></div>';
                  tr_str +=   '<div class="tt-item-descriptions">';
                  tr_str +=    '<h2 class="tt-title">'+ name +'</h2>';
                  tr_str +=        '<div class="tt-quantity">'+ qty +' X</div> <div class="tt-price">'+ price +'</div>';
                  tr_str +=        '</div></a>';
                  tr_str +=        '<div class="tt-item-close">';
                  tr_str +=            '<a onclick="cartremove(this)" data-line="http://127.0.0.1:8000/cart/remove/'+rowId+'" class="tt-btn-close"></a>';
                  tr_str +=         '</div></div>';
                $(".appcart").append(tr_str);
                $(".sub_total_price").html(response['dataTotal'][0]['value']);
              }
            } else{
              var tr_str = '<div class="minicart-empty js-minicart-empty"><div class="minicart-empty-text"><?php echo e(trans("cart.cart_empty")); ?></div><div class="minicart-empty-icon"><i class="icon-shopping-bag"></i><svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;" xml:space="preserve"><path class="st0" d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z" /></svg></div></div>';
              $(".appcart").append(tr_str);
              $(".sub_total_price").html(0);
            }
          }, error: function (error) {
            var tr_str = '<div class="minicart-empty js-minicart-empty"><div class="minicart-empty-text"><?php echo e(trans("cart.cart_empty")); ?></div><div class="minicart-empty-icon"><i class="icon-shopping-bag"></i><svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;" xml:space="preserve"><path class="st0" d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z" /></svg></div></div>';
              $(".appcart").append(tr_str);
              $(".sub_total_price").html(0);
          }
        });
          }
    });
  }

  function addToCartAjax(id, instance = null, storeId = null){
    $.ajax({
        url: "<?php echo e(sc_route('cart.add_ajax')); ?>",
        type: "POST",
        dataType: "JSON",
        data: {
          "id": id,
          "instance":instance,
          "storeId":storeId,
          "_token":"<?php echo e(csrf_token()); ?>"
        },
        async: false,
        success: function(data){
          // console.log(data);
            error = parseInt(data.error);
            if(error ==0)
            {
              setTimeout(function () {
                if(data.instance =='default'){
                  $('.tt-badge-cart').html(data.count_cart);
                }else{
                  $('.sc-'+data.instance).html(data.count_cart);
                }
              }, 1000);
              alertJs('success', data.msg);
            }else{
              if(data.redirect){
                window.location.replace(data.redirect);
                return;
              }
              alertJs('error', data.msg);
            }

            }
    });

    $.ajax({
      url: '/get_json',
      type: 'get',
      dataType: 'json',
      success: function(response){
        var len = 0;
        //$('#userTable tbody').empty(); // Empty <tbody>
        if(response['cart'] != null){
          len = response['cart'].length;
        }
        
        if(len > 0){
          $(".appcart").html('');
          for(var i=0; i<len; i++){
            var rowId = response['cart'][i]['rowId'];
            var storeId = response['cart'][i]['storeId'];
            var id = response['cart'][i]['id'];
            var name = response['cart'][i]['name'];
            var price = response['cart'][i]['price'];
            var qty = response['cart'][i]['qty'];
            var pro_image = response['products_list'][i];
              var tr_str = '<div class="tt-item">';
              tr_str +=   '<a href="javascript:;">';
              tr_str +=     '<div class="tt-item-img"><img src="http://127.0.0.1:8000'+pro_image+'"></div>';
              tr_str +=   '<div class="tt-item-descriptions">';
              tr_str +=    '<h2 class="tt-title">'+ name +'</h2>';
              tr_str +=        '<div class="tt-quantity">'+ qty +' X</div> <div class="tt-price">'+ price +'</div>';
              tr_str +=        '</div></a>';
              tr_str +=        '<div class="tt-item-close">';
              tr_str +=            '<a onclick="cartremove(this)" data-line="http://127.0.0.1:8000/cart/remove/'+rowId+'" class="tt-btn-close"></a>';
              tr_str +=         '</div></div>';
            $(".appcart").append(tr_str);
            $(".sub_total_price").html(response['dataTotal'][0]['value']);
          }
        } else{
          $(".appcart").html('');
          var tr_str = '<div class="minicart-empty js-minicart-empty"><div class="minicart-empty-text"><?php echo e(trans("cart.cart_empty")); ?></div><div class="minicart-empty-icon"><i class="icon-shopping-bag"></i><svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;" xml:space="preserve"><path class="st0" d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z" /></svg></div></div>';
          $(".appcart").append(tr_str);
          $(".sub_total_price").html(0);
        }
      }
    });
  }
</script>
<!--//end cart -->


<!--message-->
<?php if(Session::has('success')): ?>
<script type="text/javascript">
    alertJs('success', '<?php echo Session::get('success'); ?>');
</script>
<?php endif; ?>

<?php if(Session::has('error')): ?>
<script type="text/javascript">
  alertJs('error', '<?php echo Session::get('error'); ?>');
</script>
<?php endif; ?>

<?php if(Session::has('warning')): ?>
<script type="text/javascript">
  alertJs('error', '<?php echo Session::get('warning'); ?>');
</script>
<?php endif; ?>
<!--//message-->
<?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/common/js.blade.php ENDPATH**/ ?>