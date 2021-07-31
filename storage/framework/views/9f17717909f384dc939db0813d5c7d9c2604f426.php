
<?php switch($kind):
    case (SC_PRODUCT_GROUP): ?>
    <div class="tt-price"><?php echo trans('product.price_group'); ?></div>
        <?php break; ?>
    <?php default: ?>
        <?php if($price == $priceFinal): ?>
            <div class="tt-price"><?php echo sc_currency_render($price); ?></div>
        <?php else: ?>
        <div class="tt-price">
            <span class="new-price"><?php echo sc_currency_render($priceFinal); ?></span>
            <span class="old-price"><?php echo sc_currency_render($price); ?></span>
        </div>
        <?php endif; ?>
<?php endswitch; ?>
   <?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/common/show_price.blade.php ENDPATH**/ ?>