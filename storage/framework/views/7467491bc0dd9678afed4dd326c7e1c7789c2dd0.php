<?php
/*
$layout_page = shop_cart
**Variables:**
- $cart: no paginate
- $shippingMethod: string
- $paymentMethod: string
- $totalMethod: array
- $dataTotal: array
- $shippingAddress: array
- $countries: array
- $attributesGroup: array
*/
?>



<?php $__env->startSection('block_main'); ?>

<?php if(count($cart) ==0): ?>

<div class="container-indent nomargin">
    <div class="tt-empty-cart">
        <span class="tt-icon icon-f-39"></span>
        <h1 class="tt-title">SHOPPING CART IS EMPTY</h1>
        <p>You have no items in your shopping cart.</p>
        <a href="<?php echo e(sc_route('home')); ?>" class="btn"><?php echo e(trans('cart.back_to_shop')); ?></a>
    </div>
</div>

<?php else: ?>
<div class="container-indent">
    <div class="container">
        <h1 class="tt-title-subpages noborder"><?php echo e($title ?? ''); ?></h1>
        <div class="row">
            <div class="col-sm-12 col-xl-8">
                <div class="tt-shopcart-table">
                    <table>
                        <tbody>
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $n = (isset($n)?$n:0);
                                $n++;
                                // Check product in cart
                                $product = $modelProduct->start()->getDetail($item->id, null, $item->storeId);
                                if(!$product) {
                                    continue;
                                }
                                // End check product in cart
                            ?>
                                <tr>
                                    <td>
                                        <a onClick="return confirm('<?php echo e(trans('messages.ask_delete')); ?>')" title="Remove Item" alt="Remove Item"
                                        class="tt-btn-close" data-tooltip="Remove Product"
                                        href="<?php echo e(sc_route("cart.remove", ['id'=>$item->rowId, 'instance' => 'cart'])); ?>"></a>
                                    </td>
                                    <td>
                                        <div class="tt-product-img">
                                            <img src="<?php echo e(sc_file('images/loader.svg')); ?>" data-src="<?php echo e(sc_file($product->getImage())); ?>" alt="<?php echo e($product->name); ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <h2 class="tt-title">
                                            <a href="<?php echo e($product->getUrl()); ?>"><?php echo e($product->name); ?></a>
                                            
                                            <?php if(sc_config_global('MultiVendorPro') && config('app.storeId') == SC_ID_ROOT): ?>
                                            <div class="store-url"><a href="<?php echo e($product->goToStore()); ?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <?php echo e(trans('front.store').' '. $product->store_id); ?></a>
                                            </div>
                                            <?php endif; ?>
                                            
                                            
                                            
                                            <?php if($item->options->count()): ?>
                                            <?php $__currentLoopData = $item->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupAtt => $att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <b><?php echo e($attributesGroup[$groupAtt]); ?></b>: <?php echo sc_render_option_price($att); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            
                                        </h2>
                                    </td>
                                    <td>
                                        <?php echo $product->showPrice(); ?>

                                    </td>
                                    <td>
                                        <div class="detach-quantity-desctope">
                                            <div class="tt-input-counter style-01">
                                                <span class="minus-btn"></span>
                                                <input  type="text" data-id="<?php echo e($item->id); ?>"
                                                    data-rowid="<?php echo e($item->rowId); ?>" data-store_id="<?php echo e($product->store_id); ?>" onChange="updateCart($(this));"
                                                    class="qty-input item-qty" name="qty-<?php echo e($item->id); ?>" value="<?php echo e($item->qty); ?>" size="5">
                                                <span class="plus-btn"></span>
                                            </div>
                                        </div>
                                        <span class="text-danger item-qty-<?php echo e($item->id); ?>" style="display: none;"></span>
                                        <?php if(session('arrErrorQty')[$product->id] ?? 0): ?>
                                        <span class="help-block">
                                            <br><?php echo e(trans('cart.minimum_value', ['value' => session('arrErrorQty')[$product->id]])); ?>

                                        </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="tt-price subtotal">
                                            <?php echo e(sc_currency_render($item->subtotal)); ?>

                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </tbody>
                    </table>
                    <div class="tt-shopcart-btn">
                        <div class="col-left">
                            <a href="<?php echo e(sc_route('home')); ?>" class="btn-link"><i class="icon-e-19"></i> <?php echo e(trans('cart.back_to_shop')); ?></a>
                        </div>
                        <div class="col-right">
                            <a class="btn-link" type="button"
                            onClick="if(confirm('Confirm ?')) window.location.href='<?php echo e(sc_route('cart.clear', ['instance' => 'cart'])); ?>';">
                            <i class="icon-h-02"></i> <?php echo e(trans('cart.remove_all')); ?></a>
                        </div>
                    </div>
                </div>

                <div class="tt-shopcart-col">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="tt-shopcart-box">
                                <h4 class="tt-title">
                                    ESTIMATE SHIPPING AND TAX
                                </h4>
                                <a href="<?php echo e(route('login')); ?>"><?php echo e(trans('account.login')); ?></a> | <a href="<?php echo e(route('register')); ?>"><?php echo e(trans('account.register')); ?></a>

                                    <form class="form-default" id="form-process" role="form" method="POST" action="<?php echo e(sc_route('checkout.prepare')); ?>">
                                        <?php echo csrf_field(); ?>
                                    <?php if(sc_config('customer_lastname')): ?>
                                        
                                        <div class="row  mt-2">
                                            <div class="col-md-6">
                                                <div class="form-group <?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
                                                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="<?php echo e(trans('cart.first_name')); ?>"
                                                    value="<?php echo e(old('first_name', $shippingAddress['first_name'])); ?>">
                                                    <?php if($errors->has('first_name')): ?>
                                                        <span class="help-block"><?php echo e($errors->first('first_name')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group <?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
                                                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="<?php echo e(trans('cart.last_name')); ?>"
                                                    value="<?php echo e(old('last_name', $shippingAddress['last_name'])); ?>">
                                                    <?php if($errors->has('last_name')): ?>
                                                        <span class="help-block"><?php echo e($errors->first('last_name')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-group <?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
                                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="<?php echo e(trans('cart.first_name')); ?>"
                                            value="<?php echo e(old('first_name', $shippingAddress['first_name'])); ?>">
                                            <?php if($errors->has('first_name')): ?>
                                                <span class="help-block"><?php echo e($errors->first('first_name')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(sc_config('customer_name_kana')): ?>
                                        <div class="row  mt-2">
                                            <div class="col-md-6">
                                                <div class="form-group <?php echo e($errors->has('first_name_kana') ? ' has-error' : ''); ?>">
                                                    <input class="form-control" name="first_name_kana" type="text"
                                                        placeholder="<?php echo e(trans('cart.first_name_kana')); ?>"
                                                        value="<?php echo e(old('first_name_kana', $shippingAddress['first_name_kana'])); ?>">
                                                    <?php if($errors->has('first_name_kana')): ?>
                                                    <span class="help-block"><?php echo e($errors->first('first_name_kana')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group <?php echo e($errors->has('last_name_kana') ? ' has-error' : ''); ?>">
                                                    <input class="form-control" name="last_name_kana" type="text" placeholder="<?php echo e(trans('cart.last_name_kana')); ?>"
                                                        value="<?php echo e(old('last_name_kana',$shippingAddress['last_name_kana'])); ?>">
                                                    <?php if($errors->has('last_name_kana')): ?>
                                                    <span class="help-block"><?php echo e($errors->first('last_name_kana')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="row  mt-2">
                                        <?php if(sc_config('customer_phone')): ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" name="email" type="text" placeholder="<?php echo e(trans('cart.email')); ?>"
                                                    value="<?php echo e(old('email', $shippingAddress['email'])); ?>">
                                                <?php if($errors->has('email')): ?>
                                                    <span class="help-block"><?php echo e($errors->first('email')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" name="phone" type="text" placeholder="<?php echo e(trans('cart.phone')); ?>"
                                                    value="<?php echo e(old('phone',$shippingAddress['phone'])); ?>">
                                                <?php if($errors->has('phone')): ?>
                                                    <span class="help-block"><?php echo e($errors->first('phone')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <div class="form-group">
                                            <input class="form-control" name="email" type="text" placeholder="<?php echo e(trans('cart.email')); ?>"
                                                value="<?php echo e(old('email', $shippingAddress['email'])); ?>">
                                            <?php if($errors->has('email')): ?>
                                                <span class="help-block"><?php echo e($errors->first('email')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if(sc_config('customer_country')): ?>
                                    <div class="form-group select-wrapper select-wrapper-sm  mt-2">
                                        <?php
                                            $ct = old('country',$shippingAddress['country']);
                                        ?>
                                        <select class="form-control form-control--sm country" name="country">
                                            <option value=""><?php echo e(trans('cart.country')); ?></option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>" <?php echo e(($ct ==$k) ? 'selected':''); ?>><?php echo e($v); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('country')): ?>
                                            <span class="help-block">
                                                <?php echo e($errors->first('country')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>

                                    <div class="row  mt-2">
                                        
                                        <?php if(sc_config('customer_postcode')): ?>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <input class="form-control" name="postcode" type="text" placeholder="<?php echo e(trans('cart.postcode')); ?>"
                                                    value="<?php echo e(old('postcode',$shippingAddress['postcode'])); ?>">
                                                    <?php if($errors->has('postcode')): ?>
                                                        <span class="help-block"><?php echo e($errors->first('postcode')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(sc_config('customer_company')): ?>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <input class="form-control" name="company" type="text" placeholder="<?php echo e(trans('cart.company')); ?>"
                                                    value="<?php echo e(old('company',$shippingAddress['company'])); ?>">
                                                    <?php if($errors->has('company')): ?>
                                                        <span class="help-block"><?php echo e($errors->first('company')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if(sc_config('customer_address1')): ?>
                                        <div class="form-group">
                                            <input class="form-control" name="address1" type="text" placeholder="<?php echo e(trans('cart.address1')); ?>"
                                                value="<?php echo e(old('address1',$shippingAddress['address1'])); ?>">
                                            <?php if($errors->has('address1')): ?>
                                                <span class="help-block"><?php echo e($errors->first('address1')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(sc_config('customer_address2')): ?>
                                        <div class="form-group">
                                            <input class="form-control" name="address2" type="text" placeholder="<?php echo e(trans('cart.address2')); ?>"
                                                value="<?php echo e(old('address2',$shippingAddress['address2'])); ?>">
                                            <?php if($errors->has('address2')): ?>
                                                <span class="help-block"><?php echo e($errors->first('address2')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(sc_config('customer_address3')): ?>
                                        <div class="form-group">
                                            <input class="form-control" name="address3" type="text" placeholder="<?php echo e(trans('cart.address3')); ?>"
                                                value="<?php echo e(old('address3',$shippingAddress['address3'])); ?>">
                                            <?php if($errors->has('address3')): ?>
                                                <span class="help-block"><?php echo e($errors->first('address3')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <textarea class="form-control" rows="3" name="comment"
                                            placeholder="<?php echo e(trans('cart.note')); ?>...."><?php echo e(old('comment','')); ?></textarea>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="tt-shopcart-box">
                                <?php if(!sc_config('shipping_off')): ?>
                                    <div class="card">
                                        <div class="card-body <?php echo e($errors->has('shippingMethod') ? ' has-error' : ''); ?>">
                                            <h4 class="tt-title">
                                                <?php echo e(trans('cart.shipping_method')); ?>

                                            </h4>
                                            <?php if($errors->has('shippingMethod')): ?>
                                            <span class="help-block"><?php echo e($errors->first('shippingMethod')); ?></span>
                                            <?php endif; ?>

                                            <ul class="list-form-column"> 
                                                <?php $__currentLoopData = $shippingMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <label class="radio">
                                                    <input id="formcheckoutRadio1<?php echo e($key); ?>" type="radio" name="shippingMethod" value="<?php echo e($shipping['key']); ?>" <?php echo e((old('shippingMethod') == $key)?'checked':''); ?> <?php echo e(($shipping['permission'])?'':'disabled'); ?>>
                                                    <span class="outer"><span class="inner"></span></span><img title="<?php echo e($shipping['title']); ?>"
                                                    alt="<?php echo e($shipping['title']); ?>"
                                                    src="<?php echo e(sc_file($shipping['image'])); ?>" style="width: 60px;"> <?php echo e($shipping['title']); ?></label>
                                                </li>
                                                
                                                <?php if(view()->exists($shipping['pathPlugin'].'::render')): ?>
                                                    <?php echo $__env->make($shipping['pathPlugin'].'::render', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                                

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(!sc_config('payment_off')): ?>
                                    <div class="mt-2"></div>
                                    <div class="card">
                                        <div class="card-body <?php echo e($errors->has('paymentMethod') ? ' has-error' : ''); ?>">
                                            <h4 class="tt-title">
                                                <?php echo e(trans('cart.payment_method')); ?>

                                            </h4>
                                            <?php if($errors->has('paymentMethod')): ?>
                                                <span class="help-block"><?php echo e($errors->first('paymentMethod')); ?></span>
                                            <?php endif; ?>

                                            <ul class="list-form-column">                                            
                                                <?php $__currentLoopData = $paymentMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <li>
                                                        <label class="radio">
                                                        <input id="formcheckoutRadio4<?php echo e($key); ?>" type="radio" name="paymentMethod" value="<?php echo e($payment['key']); ?>" <?php echo e((old('shippingMethod') == $key)?'checked':''); ?> <?php echo e(($payment['permission'])?'':'disabled'); ?>>
                                                        <span class="outer"><span class="inner"></span></span><img title="<?php echo e($payment['title']); ?>"
                                                        alt="<?php echo e($payment['title']); ?>"
                                                        src="<?php echo e(sc_file($payment['image'])); ?>" style="width: 60px;"> <?php echo e($payment['title']); ?></label>
                                                    </li>

                                                    
                                                    <?php if(view()->exists($payment['pathPlugin'].'::render')): ?>
                                                        <?php echo $__env->make($payment['pathPlugin'].'::render', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                    

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>

                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-xl-4">
                <div class="tt-shopcart-wrapper"> 
                    <div class="tt-shopcart-box tt-boredr-large">
                        <?php $__currentLoopData = $totalMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plugin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(view()->exists($plugin['pathPlugin'].'::render')): ?>
                                <?php echo $__env->make($plugin['pathPlugin'].'::render', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <hr>

                        <?php if(view()->exists($sc_templatePath.'.common.render_total')): ?>
                            <?php echo $__env->make($sc_templatePath.'.common.render_total', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                        <div
                            class="form-group <?php echo e($errors->has('totalMethod') ? ' has-error' : ''); ?>">
                            <?php if($errors->has('totalMethod')): ?>
                                <span class="help-block"><?php echo e($errors->first('totalMethod')); ?></span>
                            <?php endif; ?>
                        </div>

                        

                        <?php echo $viewCaptcha ?? ''; ?>


                        <button class="btn btn-lg" type="submit" id="button-form-process"><span class="icon icon-check_circle"></span> <?php echo e(trans('cart.checkout')); ?></button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
    

<?php endif; ?>

</section>


<?php if(!empty($layout_page && $includePathView = config('sc_include_view.'.$layout_page, []))): ?>
<?php $__currentLoopData = $includePathView; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if(view()->exists($view)): ?>
    <?php echo $__env->make($view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('breadcrumb'); ?>
<div class="tt-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="<?php echo e(sc_route('home')); ?>"><?php echo e(trans('front.home')); ?></a></li>
            <li><?php echo e($title ?? ''); ?></li>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts'); ?>


<?php $__currentLoopData = $totalMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plugin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(view()->exists($plugin['pathPlugin'].'::script')): ?>
    <?php echo $__env->make($plugin['pathPlugin'].'::script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php $__currentLoopData = $shippingMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plugin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(view()->exists($plugin['pathPlugin'].'::script')): ?>
    <?php echo $__env->make($plugin['pathPlugin'].'::script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php $__currentLoopData = $paymentMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plugin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(view()->exists($plugin['pathPlugin'].'::script')): ?>
    <?php echo $__env->make($plugin['pathPlugin'].'::script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php if(!empty($layout_page) && $includePathScript = config('sc_include_script.'.$layout_page, [])): ?>
<?php $__currentLoopData = $includePathScript; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if(view()->exists($script)): ?>
    <?php echo $__env->make($script, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<script type="text/javascript">
    function updateCart(obj){
        let new_qty = obj.val();
        let storeId = obj.data('store_id');
        let rowid = obj.data('rowid');
        let id = obj.data('id');
        $.ajax({
            url: '<?php echo e(sc_route('cart.update')); ?>',
            type: 'POST',
            dataType: 'json',
            async: false,
            cache: false,
            data: {
                id: id,
                rowId: rowid,
                new_qty: new_qty,
                storeId: storeId,
                _token:'<?php echo e(csrf_token()); ?>'},
            success: function(data){
                error= parseInt(data.error);
                if(error ===0)
                {
                    window.location.replace(location.href);
                }else{
                    $('.item-qty-'+id).css('display','block').html(data.msg);
                }

                }
        });
    }

    // function buttonQty(action){

    //     if(action === 'reduce'){
    //         $('.qty-input').val(parseInt($('.qty-input').val()) - 1);
    //     }else{
    //         $('.qty-input').val(parseInt($('.qty-input').val()) + 1);
    //     }
    //     updateCart($('.qty-input'))
    // }

    $('#button-form-process').click(function(){
        $('#form-process').submit();
        $(this).prop('disabled',true);
    });

    $('#addressList').change(function(){
        var id = $('#addressList').val();
        if(!id) {
            return;   
        } else if(id == 'new') {
            $('#form-process [name="first_name"]').val('');
            $('#form-process [name="last_name"]').val('');
            $('#form-process [name="phone"]').val('');
            $('#form-process [name="postcode"]').val('');
            $('#form-process [name="company"]').val('');
            $('#form-process [name="country"]').val('');
            $('#form-process [name="address1"]').val('');
            $('#form-process [name="address2"]').val('');
            $('#form-process [name="address3"]').val('');
        } else {
            $.ajax({
            url: '<?php echo e(sc_route('customer.address_detail')); ?>',
            type: 'GET',
            dataType: 'json',
            async: false,
            cache: false,
            data: {
                id: id,
            },
            success: function(data){
                error= parseInt(data.error);
                if(error === 1)
                {
                    alert(data.msg);
                }else{
                    $('#form-process [name="first_name"]').val(data.first_name);
                    $('#form-process [name="last_name"]').val(data.last_name);
                    $('#form-process [name="phone"]').val(data.phone);
                    $('#form-process [name="postcode"]').val(data.postcode);
                    $('#form-process [name="company"]').val(data.company);
                    $('#form-process [name="country"]').val(data.country);
                    $('#form-process [name="address1"]').val(data.address1);
                    $('#form-process [name="address2"]').val(data.address2);
                    $('#form-process [name="address3"]').val(data.address3);
                }

                }
        });
        }
    });

</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make($sc_templatePath.'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/screen/shop_cart.blade.php ENDPATH**/ ?>