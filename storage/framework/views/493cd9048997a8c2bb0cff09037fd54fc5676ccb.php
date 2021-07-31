<?php
$categries_array = explode(",",$layout->products_category);
$categries = $modelCategory->whereIn('alias', $categries_array)->get();
?>

<?php if($categries->count() == 1): ?>
  <?php
  session()->put('cat_one', $categries[0]->id);
  $productPromotion = $modelProduct->start()->getProductToCategory(session()->get('cat_one'))->setLimit(sc_config('product_viewed'))->getData();

  ?>
  <?php if(!empty($productPromotion)): ?>
  <div class="container-indent">
    <div class="container container-fluid-custom-mobile-padding">
      <div class="tt-block-title">
      <h1 class="tt-title"><?php echo e(trans('front.products_special')); ?> <?php echo e($categries->count()); ?> <?php echo e($categries[0]->alias); ?></h1>
      </div>
      <div class="row tt-layout-product-item">
        <?php $__currentLoopData = $productPromotion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-6 col-md-4 col-lg-3">
          <div class="tt-product thumbprod-center">
            <div class="tt-image-box">
              <a href="<?php echo e($product->getUrl()); ?>" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
              <a href="javascript:;" onClick="addToCartAjax('<?php echo e($product->id); ?>','wishlist','<?php echo e($product->store_id); ?>')" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
              <a href="javascript:;" onClick="addToCartAjax('<?php echo e($product->id); ?>','compare','<?php echo e($product->store_id); ?>')" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
              <a href="<?php echo e($product->getUrl()); ?>">
                <span class="tt-img"><img src="<?php echo e(sc_file('images/loader.svg')); ?>" data-src="<?php echo e(sc_file($product->getThumb())); ?>" alt="<?php echo e($product->name); ?>"></span>
                <span class="tt-img-roll-over"><img src="<?php echo e(sc_file('images/loader.svg')); ?>" data-src="<?php echo e(sc_file($product->getThumb())); ?>" alt="<?php echo e($product->name); ?>"></span>
                <?php if($product->price != $product->getFinalPrice() && $product->kind != SC_PRODUCT_GROUP): ?>
                  <span class="tt-label-location">
                    <span class="tt-label-sale">Sale</span>
                  </span>
                <?php endif; ?>
              </a>
            </div>
            <div class="tt-description">
              <div class="tt-row">
                <ul class="tt-add-info">
                  <li><a href="<?php echo e($product->categories[0]->getUrl()); ?>"><?php echo e($product->categories[0]->getTitle()); ?></a></li>
                </ul>
              </div>
              <h2 class="tt-title"><a href="<?php echo e($product->getUrl()); ?>"><?php echo e($product->name); ?></a></h2>
              <?php echo $product->showPrice(); ?>

              <div class="tt-product-inside-hover">
                <div class="tt-row-btn">
                  <a href="javascript:;" onClick="addToCartAjax('<?php echo e($product->id); ?>','default','<?php echo e($product->store_id); ?>')" class="tt-btn-addtocart thumbprod-button-bg"><?php echo e(trans('front.add_to_cart')); ?></a>
                </div>
                <div class="tt-row-btn">
                  <a href="<?php echo e($product->getUrl()); ?>" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                  <a href="javascript:;" onClick="addToCartAjax('<?php echo e($product->id); ?>','wishlist','<?php echo e($product->store_id); ?>')" class="tt-btn-wishlist"></a>
                  <a href="javascript:;" onClick="addToCartAjax('<?php echo e($product->id); ?>','compare','<?php echo e($product->store_id); ?>')" class="tt-btn-compare"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
  <!--/product special-->
  <?php endif; ?>
<?php elseif($categries->count() > 1): ?>

<div class="container-indent">
  <div class="container container-fluid-custom-mobile-padding">
    <ul class="nav nav-tabs tt-tabs-default" role="tablist">
      <?php $__currentLoopData = $categries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icat => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
      session()->put('cat_many', $cat->id);
      $productPromotion = $modelProduct->start()->whereHas('categories',function ($q){
                $q->where('id',[session()->get('cat_many')]);
            })->limit(sc_config('product_viewed'))->get()->first();
      ?>

      <li class="nav-item">
        <a class="nav-link <?php if($icat == 0): ?> active <?php endif; ?>" data-toggle="tab" href="#tt-tab<?php echo e($layout->id); ?>-<?php echo e($cat->id); ?>"><?php echo e($productPromotion->categories[0]->getTitle()); ?></a>
      </li> 
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
    </ul>
    <div class="tab-content">
      <?php $__currentLoopData = $categries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icat => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
      session()->put('cat_many', $cat->id);
      // $productPromotion = $modelProduct->whereHas('categories',function ($q){
      //           $q->where('id',[session()->get('cat_many')]);
      //       })->with('descriptions')->limit(sc_config('product_viewed'))->get();
            $productPromotion = $modelProduct->start()->getProductToCategory(session()->get('cat_many'))->setLimit(sc_config('product_viewed'))->getData()

      ?>
      <div class="tab-pane <?php if($icat == 0): ?> active <?php endif; ?>" id="tt-tab<?php echo e($layout->id); ?>-<?php echo e($cat->id); ?>">
        <div class="row tt-layout-product-item">
          <?php $__currentLoopData = $productPromotion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6 col-md-4 col-lg-3">
              <div class="tt-product thumbprod-center">
                <div class="tt-image-box">
                  <a href="<?php echo e($product->getUrl()); ?>" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                  <a href="javascript:;" onClick="addToCartAjax('<?php echo e($product->id); ?>','wishlist','<?php echo e($product->store_id); ?>')" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                  <a href="javascript:;" onClick="addToCartAjax('<?php echo e($product->id); ?>','compare','<?php echo e($product->store_id); ?>')" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                  <a href="<?php echo e($product->getUrl()); ?>">
                    <span class="tt-img"><img src="<?php echo e(sc_file('images/loader.svg')); ?>" data-src="<?php echo e(sc_file($product->getThumb())); ?>" alt="<?php echo e($product->name); ?>"></span>
                    <span class="tt-img-roll-over"><img src="<?php echo e(sc_file('images/loader.svg')); ?>" data-src="<?php echo e(sc_file($product->getThumb())); ?>" alt="<?php echo e($product->name); ?>"></span>
                    <?php if($product->price != $product->getFinalPrice() && $product->kind != SC_PRODUCT_GROUP): ?>
                      <span class="tt-label-location">
                        <span class="tt-label-sale">Sale</span>
                      </span>
                    <?php endif; ?>
                  </a>
                </div>
                <div class="tt-description">
                  <div class="tt-row">
                    <ul class="tt-add-info">
                      <li><a href="<?php echo e($product->categories[0]->getUrl()); ?>"><?php echo e($product->categories[0]->getTitle()); ?></a></li>
                    </ul>
                  </div>
                  <h2 class="tt-title"><a href="<?php echo e($product->getUrl()); ?>"><?php echo e($product->name); ?></a></h2>
                  <?php echo $product->showPrice(); ?>

                  <div class="tt-product-inside-hover">
                    <div class="tt-row-btn">
                      <a href="javascript:;" onClick="addToCartAjax('<?php echo e($product->id); ?>','default','<?php echo e($product->store_id); ?>')" class="tt-btn-addtocart thumbprod-button-bg"><?php echo e(trans('front.add_to_cart')); ?></a>
                    </div>
                    <div class="tt-row-btn">
                      <a href="<?php echo e($product->getUrl()); ?>" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                      <a href="javascript:;" onClick="addToCartAjax('<?php echo e($product->id); ?>','wishlist','<?php echo e($product->store_id); ?>')" class="tt-btn-wishlist"></a>
                      <a href="javascript:;" onClick="addToCartAjax('<?php echo e($product->id); ?>','compare','<?php echo e($product->store_id); ?>')" class="tt-btn-compare"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="text-center tt_product_showmore">
          <a href="<?php echo e($product->categories[0]->getUrl()); ?>" class="btn btn-border">More Products</a>
        </div>
        <br>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>

<?php endif; ?>




<?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/block/products_category.blade.php ENDPATH**/ ?>