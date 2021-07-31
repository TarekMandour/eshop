<?php switch($kind):
    case (SC_PRODUCT_GROUP): ?>
        <div class="tt-price">
            <span class="new-price"><?php echo trans('product.price_group_chose'); ?></span>
            <span class="old-price"></span>
        </div>
        <?php break; ?>
    <?php default: ?>
        <?php if($price == $priceFinal): ?>
            <div class="tt-price">
                <span class="new-price"><?php echo sc_currency_render($price); ?></span>
                <span class="old-price"></span>
            </div>
        <?php else: ?>
            <div class="tt-price">
                <span class="sale-price"><?php echo sc_currency_render($priceFinal); ?></span>
                <span class="old-price"><?php echo sc_currency_render($price); ?></span>
            </div>
        <?php endif; ?>
<?php endswitch; ?>

<?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/common/show_price_detail.blade.php ENDPATH**/ ?>