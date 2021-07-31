<?php if(!empty($dataTotal) && count($dataTotal)): ?>
<table class="tt-shopcart-table01" id="showTotal">
    <?php $__currentLoopData = $dataTotal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($element['code']=='total'): ?>
        <tfoot class="showTotal">
            <tr>
                <th><?php echo $element['title']; ?></th>
                <td id="<?php echo e($element['code']); ?>"><?php echo e($element['text']); ?></td>
            </tr>
        </tfoot>
        <?php elseif($element['value'] !=0): ?>
        <tbody class="showTotal">
            <tr>
                <th><?php echo $element['title']; ?></th>
                <td id="<?php echo e($element['code']); ?>"><?php echo e($element['text']); ?></td>
            </tr>
        </tbody>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php endif; ?>
<?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/common/render_total.blade.php ENDPATH**/ ?>