<?php
/*
$layout_page = shop_product_detail
**Variables:**
- $product: no paginate
- $productRelation: no paginate
*/
?>




<?php $__env->startSection('block_main'); ?>
<?php
    $countItem = 0
?>

<div class="container-indent">
  <!-- mobile product slider  -->
  <div class="tt-mobile-product-layout visible-xs">
    <div class="tt-mobile-product-slider arrow-location-center slick-animated-show-js">
      <?php if($product->images->count()): ?>
      <?php
        $countItem = 1 + $product->images->count();
      ?>
      <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div><img src="<?php echo e(sc_file($image->getImage())); ?>" alt="<?php echo e($product->name); ?>"></div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php else: ?>
      <div><img src="<?php echo e(sc_file($product->getImage())); ?>" alt="<?php echo e($product->name); ?>"></div>
      <?php endif; ?>
    </div>
  </div>

  <!-- /mobile product slider  -->
  <div class="container container-mobile-airSticky">
    <div class="row airSticky_stop-block">
      <div class="col-6 hidden-xs">
        <div class="airSticky">
          <div class="tt-product-vertical-layout">
            <div class="tt-product-single-img">
              <div>
                <img class="zoom-product" src='<?php echo e(sc_file($product->getImage())); ?>' data-zoom-image="<?php echo e(sc_file($product->getImage())); ?>" alt="<?php echo e($product->name); ?>">
                <button class="tt-btn-zomm tt-top-right"><i class="icon-f-86"></i></button>
              </div>
            </div>
            <div class="tt-product-single-carousel-vertical">
              <ul id="smallGallery" class="tt-slick-button-vertical slick-animated-show-js">
                <li><a class="zoomGalleryActive" href="#" data-image="<?php echo e(sc_file($product->getImage())); ?>" data-zoom-image="<?php echo e(sc_file($product->getImage())); ?>"><img src="<?php echo e(sc_file($product->getImage())); ?>" alt="<?php echo e($product->name); ?>"></a></li>
                <?php if($product->images->count()): ?>
                <?php
                  $countItem = 1 + $product->images->count();
                ?>
                <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="#" data-image="<?php echo e(sc_file($image->getImage())); ?>" data-zoom-image="<?php echo e(sc_file($image->getImage())); ?>"><img src="<?php echo e(sc_file($image->getImage())); ?>" alt="<?php echo e($product->name); ?>"></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <form id="buy_block" class="product-information" action="<?php echo e(sc_route('cart.add')); ?>" method="post">
          <?php echo e(csrf_field()); ?>

          <input type="hidden" name="product_id" id="product-detail-id" value="<?php echo e($product->id); ?>" />
          <input type="hidden" name="storeId" id="product-detail-storeId" value="<?php echo e($product->store_id); ?>" />

          <div class="tt-product-single-info">
            <?php if(sc_config('product_stock')): ?>
              <div class="tt-wrapper">
                <div class="tt-label">
                  <?php if($product->stock <=0 && !sc_config('product_buy_out_of_stock')): ?>
                  <div class="tt-label-out-stock"><?php echo e(trans('product.out_stock')); ?> </div>
                  <?php else: ?> 
                  <div class="tt-label-new"><?php echo e(trans('product.in_stock')); ?></div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>
            
            
            <?php if(sc_config_global('MultiVendorPro') && config('app.storeId') == SC_ID_ROOT): ?>
            
            <div class="tt-add-info">
              <ul>
                <li><span><a href="<?php echo e($product->goToStore()); ?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <?php echo e(trans('front.store').' '. $product->store_id); ?></a></span> </li>
              </ul>
            </div>
            <?php endif; ?>
            
            
            <h1 class="tt-title"><?php echo e($product->name); ?></h1>

            <?php echo $product->showPriceDetail(); ?>


            <hr class="proHR">

            <div class="tt-wrapper">
              <div class="tt-add-info">
                <ul>

                  <?php if(sc_config('product_available') && $product->date_available >= date('Y-m-d H:i:s')): ?>
                    <li><strong><?php echo e(trans('product.date_available')); ?>:</strong> <?php echo e($product->date_available); ?></li>
                  <?php endif; ?>

                  <?php if(sc_config('product_brand') && !empty($product->brand->name)): ?>
                    <li><strong><?php echo e(trans('product.brand')); ?>:</strong> <?php echo empty($product->brand->name) ? 'None' : '<a href="'.$product->brand->getUrl().'">'.$product->brand->name.'</a>'; ?></li>
                  <?php endif; ?>

                  <li><strong>SKU:</strong> <?php echo e($product->sku); ?></li>
                  <?php if(sc_config_global('MultiVendorPro') && config('app.storeId') == SC_ID_ROOT): ?>
                    <li><strong><a href="<?php echo e($product->goToStore()); ?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <?php echo e(trans('front.store').' '. $product->store_id); ?></a></strong></li>
                  <?php endif; ?>
                  
                  <li><strong><?php echo e(trans('product.category')); ?>:</strong> <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($category->getUrl()); ?>"><?php echo e($category->getTitle()); ?></a>,
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></li>
                </ul>
              </div>
            </div>

            <hr class="proHR">

            
            <?php if($product->kind == SC_PRODUCT_GROUP): ?>
              <div class="tt-wrapper">
                <?php
                $groups = $product->groups
                ?>
                <h6><?php echo e(trans('product.groups')); ?>:</h6>
                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <a target=_blank href="<?php echo e($group->product->getUrl()); ?>">
                      <?php echo sc_image_render($group->product->image); ?>

                  </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <hr class="proHR">
            <?php endif; ?>

            <?php if($product->kind == SC_PRODUCT_BUILD): ?>
              <div class="tt-wrapper">
                <?php
                  $builds = $product->builds
                ?>
                <h6><?php echo e(trans('product.builds')); ?>:</h6>
                <span class="sc-product-build">
                  <?php echo sc_image_render($product->image); ?> =
                </span>
                <?php $__currentLoopData = $builds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $build): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo ($k) ? '<i class="fa fa-plus" aria-hidden="true"></i>':''; ?>

                <span class="sc-product-build"><?php echo e($build->quantity); ?> x
                    <a target="_new" href="<?php echo e($build->product->getUrl()); ?>"><?php echo sc_image_render($build->product->image); ?></a>
                </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <hr class="proHR">
            <?php endif; ?>
            

            <div class="tt-swatches-container">
              <form method="post" action="#">
                  <div class="prd-block_options">

                      
                      <?php if(sc_config('product_property')): ?>
                      <div id="product-detail-attr">
                          <?php if($product->attributes()): ?>
                          <?php echo $product->renderAttributeDetails(); ?>

                          <?php endif; ?>
                      </div>
                      <?php endif; ?>
                      
                      
                  </div>
                  
                  
                  <?php if($product->kind != SC_PRODUCT_GROUP && $product->allowSale()): ?>
                    <div class="tt-wrapper">
                      <div class="tt-row-custom-01">
                        <div class="col-item">
                          <div class="tt-input-counter style-01">
                            <span class="minus-btn"></span>
                            <input type="text" name="qty" value="1" data-min="1" data-max="1000" size="5">
                            <span class="plus-btn"></span>
                          </div>
                        </div>
                        <div class="col-item">
                          <button type="submit" class="btn btn-lg js-trigger-addtocart js-prd-addtocart"><?php echo e(trans('front.add_to_cart')); ?></button>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                  

              </form>

            </div>

            
            <div class="tt-wrapper">
              <ul class="tt-list-btn">
                <li><a class="btn-link" href="javascript:;" onClick="addToCartAjax('<?php echo e($product->id); ?>','wishlist','<?php echo e($product->store_id); ?>')"><i class="icon-n-072"></i>ADD TO WISH LIST</a></li>
                <li><a class="btn-link" href="javascript:;" onClick="addToCartAjax('<?php echo e($product->id); ?>','compare','<?php echo e($product->store_id); ?>')"><i class="icon-n-08"></i>ADD TO COMPARE</a></li>
              </ul>
            </div>
            
            <div class="tt-collapse-block">
              <div class="tt-item active">
                <div class="tt-collapse-title"><?php echo e(trans('product.description')); ?></div>
                <div class="tt-collapse-content">
                  <?php echo sc_html_render($product->content); ?>

                </div>
              </div>
              <?php if($product->specifications != null): ?>
              <div class="tt-item">
                <div class="tt-collapse-title">Specifications</div>
                <div class="tt-collapse-content">
                  <?php echo sc_html_render($product->specifications); ?>

                </div>
              </div>
              <?php endif; ?>
              <?php if($product->condition != null): ?>
              <div class="tt-item">
                <div class="tt-collapse-title">Condition</div>
                <div class="tt-collapse-content">
                  <?php echo sc_html_render($product->condition); ?>

                </div>
              </div>
              <?php endif; ?>
              <?php if($product->delivery != null): ?>
              <div class="tt-item">
                <div class="tt-collapse-title">Delivery & Return</div>
                <div class="tt-collapse-content">
                  <?php echo sc_html_render($product->delivery); ?>

                </div>
              </div>
              <?php endif; ?>
              <?php if($product->warranty != null): ?>
              <div class="tt-item">
                <div class="tt-collapse-title">Warranty</div>
                <div class="tt-collapse-content">
                  <?php echo sc_html_render($product->warranty); ?>

                </div>
              </div>
              <?php endif; ?>
              <div class="tt-item">
                <div class="tt-collapse-title">Reviews</div>
                <div class="tt-collapse-content">
                  
                  <?php if(!empty($layout_page && $includePathView = config('sc_include_view.'.$layout_page, []))): ?>
                  <?php $__currentLoopData = $includePathView; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(view()->exists($view)): ?>
                      <?php echo $__env->make($view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                  
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<br>
<br><br>
<br>
<div class="container-indent wrapper-social-icon">
  <div class="container">
    <ul class="tt-social-icon justify-content-center">
      <?php if(sc_store('facebook') != null): ?>
      <li>
          <a class="icon-g-64" target="_blank" href="<?php echo e(sc_store('facebook')); ?>"></a>
      </li>
      <?php endif; ?>
      <?php if(sc_store('twitter') != null): ?>
      <li>
          <a class="icon-h-58" target="_blank" href="<?php echo e(sc_store('twitter')); ?>"></a>
      </li>
      <?php endif; ?>
      <?php if(sc_store('youtube') != null): ?>
      <li>
          <a class="icon-g-76" target="_blank" href="<?php echo e(sc_store('youtube')); ?>"></a>
      </li>
      <?php endif; ?>
      <?php if(sc_store('instagram') != null): ?>
      <li>
          <a class="icon-g-67" target="_blank" href="<?php echo e(sc_store('instagram')); ?>"></a>
      </li>
      <?php endif; ?>
      <?php if(sc_store('snapchat') != null): ?>
      <li>
          <a class="mdi mdi-snapchat" target="_blank" href="<?php echo e(sc_store('snapchat')); ?>"></a>
      </li>
      <?php endif; ?>
      <?php if(sc_store('linkedin') != null): ?>
      <li>
          <a class="icon-g-68" target="_blank" href="<?php echo e(sc_store('linkedin')); ?>"></a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
</div>

<?php if($productRelation->count()): ?>
<div class="container-indent">
  <div class="container container-fluid-custom-mobile-padding">
    <div class="tt-block-title text-left">
      <h3 class="tt-title-small"><?php echo e(trans('product.featured_products')); ?></h3>
    </div>
    <div class="tt-carousel-products row arrow-location-right-top tt-alignment-img tt-layout-product-item slick-animated-show-js">
      <?php $__currentLoopData = $productRelation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product_rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-2 col-md-4 col-lg-3">
        <div class="tt-product thumbprod-center">
          <div class="tt-image-box">
            <a href="<?php echo e($product_rel->getUrl()); ?>" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
            <a href="javascript:;" onClick="addToCartAjax('<?php echo e($product_rel->id); ?>','wishlist','<?php echo e($product_rel->store_id); ?>')" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
            <a href="javascript:;" onClick="addToCartAjax('<?php echo e($product_rel->id); ?>','compare','<?php echo e($product_rel->store_id); ?>')" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
            <a href="<?php echo e($product_rel->getUrl()); ?>">
              <span class="tt-img"><img src="<?php echo e(sc_file('images/loader.svg')); ?>" data-src="<?php echo e(sc_file($product_rel->getThumb())); ?>" alt="<?php echo e($product_rel->name); ?>"></span>
              <span class="tt-img-roll-over"><img src="<?php echo e(sc_file('images/loader.svg')); ?>" data-src="<?php echo e(sc_file($product_rel->getThumb())); ?>" alt="<?php echo e($product_rel->name); ?>"></span>
              <?php if($product_rel->price != $product_rel->getFinalPrice() && $product_rel->kind != SC_PRODUCT_GROUP): ?>
                <span class="tt-label-location">
                  <span class="tt-label-sale">Sale</span>
                </span>
              <?php endif; ?>
            </a>
          </div>
          <div class="tt-description">
            <div class="tt-row">
              <ul class="tt-add-info">
                <li><a href="<?php echo e($product_rel->categories[0]->getUrl()); ?>"><?php echo e($product_rel->categories[0]->getTitle()); ?></a></li>
              </ul>
            </div>
            <h2 class="tt-title"><a href="<?php echo e($product_rel->getUrl()); ?>"><?php echo e($product_rel->name); ?></a></h2>
            <?php echo $product_rel->showPrice(); ?>

            <div class="tt-product-inside-hover">
              <div class="tt-row-btn">
                <a href="javascript:;" onClick="addToCartAjax('<?php echo e($product_rel->id); ?>','default','<?php echo e($product_rel->store_id); ?>')" class="tt-btn-addtocart thumbprod-button-bg"><?php echo e(trans('front.add_to_cart')); ?></a>
              </div>
              <div class="tt-row-btn">
                <a href="<?php echo e($product_rel->getUrl()); ?>" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                <a href="javascript:;" onClick="addToCartAjax('<?php echo e($product_rel->id); ?>','wishlist','<?php echo e($product_rel->store_id); ?>')" class="tt-btn-wishlist"></a>
                <a href="javascript:;" onClick="addToCartAjax('<?php echo e($product_rel->id); ?>','compare','<?php echo e($product_rel->store_id); ?>')" class="tt-btn-compare"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>
<?php endif; ?>



<!--/product-details-->
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



<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

<?php if(!empty($layout_page) && $includePathScript = config('sc_include_script.'.$layout_page, [])): ?>
<?php $__currentLoopData = $includePathScript; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if(view()->exists($script)): ?>
    <?php echo $__env->make($script, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make($sc_templatePath.'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/screen/shop_product_detail.blade.php ENDPATH**/ ?>