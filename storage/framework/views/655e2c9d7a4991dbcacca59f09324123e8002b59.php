
<?php
    $points = (new App\Plugins\Cms\ProductReview\Models\PluginModel)->getPointProduct($product->id);
    $pathPlugin = (new App\Plugins\Cms\ProductReview\AppConfig)->pathPlugin;
?>
<div class="tt-review-block">
   <?php if($points->count()): ?>
      <div class="tt-review-comments">
         <?php $__currentLoopData = $points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="tt-item">
            <div class="tt-avatar">
               <?php if(auth()->user() && $point->customer_id == auth()->user()->id): ?>
               <a href="#" class="review-item_report r-remove " data-id="<?php echo e($point->id); ?>" ><i class="icon-recycle" aria-hidden="true"></i> Remove</a>
               <?php endif; ?>
            </div>
            <div class="tt-content">
               <div class="tt-rating">
                  <?php for($i = 1;  $i <= $point->point; $i++): ?>
                     <i class="icon-star"></i>
                  <?php endfor; ?>
               </div>
               <div class="tt-comments-info">
               <span class="username"><span><?php echo e($point->created_at); ?></span></span>
               </div>
               <div class="tt-comments-title"><?php echo e($point->name); ?></div>
               <p>
                  <?php echo sc_html_render($point->comment); ?>

               </p>
            </div>
         </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
     
   <?php else: ?>
   <div class="tt-row-custom-02">
      <h2 class="tt-title">
         <?php echo e(trans($pathPlugin.'::lang.no_review')); ?>

      </h2>
    </div>
   <?php endif; ?>

   <div class="tt-review-form">
      <div class="tt-message-info">
        <span><?php echo e(trans($pathPlugin.'::lang.write_review')); ?></span>
      </div>
      <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
      <div class="form-group required">
         <div class="col-sm-12">
            <label class="control-label" for="input-name"><?php echo e(trans($pathPlugin.'::lang.your_name')); ?></label>
            <input disabled type="text"  value="<?php echo e(auth()->user()?auth()->user()->name:trans($pathPlugin.'::lang.guest')); ?>" id="input-name" class="form-control">
         </div>
         </div>
         <div class="form-group required <?php echo e($errors->has('comment') ? ' has-error' : ''); ?>">
         <div class="col-sm-12">
            <label class="control-label" for="input-review"><?php echo e(trans($pathPlugin.'::lang.your_review')); ?></label>
            <textarea <?php echo e(auth()->user()?'':'disabled'); ?> name="comment" rows="5" id="input-review" class="form-control"><?php echo old('comment'); ?></textarea>
         </div>
         <?php if($errors->has('comment')): ?>
         <span class="help-block">
               <i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo e($errors->first('comment')); ?>

         </span>
         <?php endif; ?>
         </div>
         <div class="form-group required <?php echo e($errors->has('point') ? ' has-error' : ''); ?>">
         <div class="col-sm-12" >
            <label class="control-label"><?php echo e(trans($pathPlugin.'::lang.rating')); ?></label>
            &nbsp;&nbsp;&nbsp; <?php echo e(trans($pathPlugin.'::lang.bad')); ?>&nbsp;
            <input type="radio" style="display: inline-block;" <?php echo e((old('point') == 1)?'checked':''); ?> name="point" value="1" <?php echo e(auth()->user()?'':'disabled'); ?>>
            &nbsp;
            <input type="radio" style="display: inline-block;" <?php echo e((old('point') == 2)?'checked':''); ?> name="point" value="2" <?php echo e(auth()->user()?'':'disabled'); ?>>
            &nbsp;
            <input type="radio" style="display: inline-block;" <?php echo e((old('point') == 3)?'checked':''); ?> name="point" value="3" <?php echo e(auth()->user()?'':'disabled'); ?>>
            &nbsp;
            <input type="radio" style="display: inline-block;" <?php echo e((old('point') == 4)?'checked':''); ?> name="point" value="4" <?php echo e(auth()->user()?'':'disabled'); ?>>
            &nbsp;
            <input type="radio" style="display: inline-block;" <?php echo e((old('point') == 5)?'checked':''); ?> name="point" value="5" <?php echo e(auth()->user()?'':'disabled'); ?>>
            &nbsp;<?php echo e(trans($pathPlugin.'::lang.good')); ?></div>
            <?php if($errors->has('point')): ?>
            <span class="help-block">
               <i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo e($errors->first('point')); ?>

            </span>
            <?php endif; ?>
         </div>
         <?php if(sc_captcha_method() && in_array('review', sc_captcha_page()) && view()->exists(sc_captcha_method()->pathPlugin.'::render')): ?>
         <?php
            $titleButton = trans($pathPlugin.'::lang.submit');
            $idForm = 'form-review';
            $idButtonForm = 'button-review';
         ?>
         <?php echo $__env->make(sc_captcha_method()->pathPlugin.'::render', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <?php endif; ?>
        <div class="form-group">
            <button type="button" id="button-review" data-loading-text="Loading..."
            class="btn"><?php echo e(trans($pathPlugin.'::lang.submit')); ?>

            </button>
        </div>
      </form>
   </div>
   
</div>

<?php /**PATH C:\xampp7\htdocs\eshop\app\Plugins\Cms\ProductReview/Views/render.blade.php ENDPATH**/ ?>