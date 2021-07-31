<?php
/*
$layout_page = shop_product_list
**Variables:**
- $subCategory: paginate
Use paginate: $subCategory->appends(request()->except(['page','_token']))->links()
- $products: paginate
Use paginate: $products->appends(request()->except(['page','_token']))->links()
*/ 
?>




<?php $__env->startSection('block_main'); ?>

<div class="container-indent">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3 col-xl-3 leftColumn aside">
                <div class="tt-btn-col-close">
                    <a href="#">Close</a>
                </div>
                <div class="tt-collapse open tt-filter-detach-option">
                    <div class="tt-collapse-content">
                        <div class="filters-mobile">
                            <div class="filters-row-select">

                            </div>
                        </div>
                    </div>
                </div>
                <form name="search" method="post" action="<?php echo e(route('search')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="tt-collapse open">
                        <h3 class="tt-collapse-title">PRODUCT CATEGORIES</h3>
                        <div class="tt-collapse-content">
                            <ul class="tt-list-row">
                                <?php $maincat = \EShop\Core\Front\Models\ShopCategory::where('parent',0)->get() ; ?>
                                    <?php $__currentLoopData = $maincat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="checkbox-group">
                                                <input id="checkbox<?php echo e($key); ?>" value="<?php echo e($cat->id); ?>" name="category[]"
                                                    type="checkbox" onChange="this.form.submit()"
                                                    <?php if(old('category')): ?>
                                                    <?php if(in_array($cat->id,old('category'))): ?> checked <?php endif; ?>
                                                        <?php endif; ?>
                                                >
                                                <label for="checkbox<?php echo e($key); ?>">
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    <?php echo e($cat->alias); ?></label>
                                            </div>
                                            <?php 
                                                $subcat = \EShop\Core\Front\Models\ShopCategory::where('parent',$cat->id)->get() ; 
                                            ?>
                                            <?php if(count($subcat)): ?>
                                            <div class="toggle-category js-toggle-category"><span><i class="icon-angle-up"></i></span></div>
                                            <ul style="list-style: none;">
                                                <?php $__currentLoopData = $subcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subk => $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <div class="checkbox-group">
                                                        <input id="checkbox<?php echo e($key); ?><?php echo e($subk); ?>" value="<?php echo e($subcat->id); ?>" name="category[]"
                                                        type="checkbox" onChange="this.form.submit()"
                                                        <?php if(old('category')): ?>
                                                        <?php if(in_array($subcat->id,old('category'))): ?> checked <?php endif; ?>
                                                        <?php endif; ?>
                                                        >
                                                        <label for="checkbox<?php echo e($key); ?><?php echo e($subk); ?>">
                                                            <span class="check"></span>
                                                            <span class="box"></span>
                                                            <?php echo e($subcat->alias); ?></label>
                                                    </div>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>

                    <div class="tt-collapse">
                        <h3 class="tt-collapse-title">Brands</h3>
                        <div class="tt-collapse-content">
                            <ul class="tt-list-row">
                                <?php $brands = \EShop\Core\Front\Models\ShopBrand::all() ; ?>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bkey => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <div class="checkbox-group">
                                        <input id="checkboxb<?php echo e($bkey); ?>" value="<?php echo e($brand->id); ?>" name="brand[]"
                                            type="checkbox" onChange="this.form.submit()"
                                            <?php if(old('brand')): ?>
                                            <?php if(in_array($brand->id,old('brand'))): ?> checked <?php endif; ?>
                                                <?php endif; ?>
                                        >
                                        <label for="checkboxb<?php echo e($bkey); ?>">
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            <?php echo e($brand->alias); ?></label>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>

                    <?php $__currentLoopData = \EShop\Core\Front\Models\ShopAttributeGroup::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $attributeGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tt-collapse">
                            <h3 class="tt-collapse-title"><?php echo e($attributeGroup->name); ?></h3>
                            <div class="tt-collapse-content">
                                <ul class="tt-list-row">
                                    <?php
                                        $attribute_name =[];
                                    ?>
                                    <?php $__currentLoopData = $attributeGroup->attributeDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if(!in_array($attr->name , $attribute_name)): ?>
                                            <?php
                                                array_push($attribute_name , $attr->name);
                                            ?>

                                            <li>
                                                <div class="checkbox-group">
                                                    <input id="checkboxattr<?php echo e($key); ?><?php echo e($k); ?>"
                                                        name="attribute[]"
                                                        type="checkbox" onChange="this.form.submit()"
                                                        value="<?php echo e($attr->name); ?>"
                                                        <?php if(old('attribute')): ?>
                                                        <?php if(in_array($attr->name,old('attribute'))): ?> checked <?php endif; ?>
                                                            <?php endif; ?>
                                                    >
                                                    <label for="checkboxattr<?php echo e($key); ?><?php echo e($k); ?>">
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        <?php echo e($attr->name); ?></label>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </form>

            </div>
            <div class="col-md-12 col-lg-9 col-xl-9">
                <div class="content-indent container-fluid-custom-mobile-padding-02">
                    <div class="tt-filters-options">
                        <h1 class="tt-title">
                            <?php echo e($title ?? ''); ?>

                        </h1>
                        <span><?php echo trans('front.result_item', ['item_from' => $products->firstItem(), 'item_to'=> $products->lastItem(), 'item_total'=> $products->total()  ]); ?> | </span>
                        <div class="tt-btn-toggle">
                            <a href="#">FILTER</a>
                        </div>

                        <form action="" method="GET" id="filter_sort">
                            <?php
                            $queries = request()->except(['filter_sort','page','token','category','brand','attribute']);
                            ?>
                            <?php $__currentLoopData = $queries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $query): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($query); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <div class="tt-sort">
                                <select name="filter_sort">
                                    <option value=""><?php echo e(trans('front.filters.sort')); ?></option>
                                    <option value="price_asc" <?php echo e(($filter_sort =='price_asc')?'selected':''); ?>>
                                        <?php echo e(trans('front.filters.price_asc')); ?></option>
                                    <option value="price_desc" <?php echo e(($filter_sort =='price_desc')?'selected':''); ?>>
                                        <?php echo e(trans('front.filters.price_desc')); ?></option>
                                    <option value="sort_asc" <?php echo e(($filter_sort =='sort_asc')?'selected':''); ?>>
                                        <?php echo e(trans('front.filters.sort_asc')); ?></option>
                                    <option value="sort_desc" <?php echo e(($filter_sort =='sort_desc')?'selected':''); ?>>
                                        <?php echo e(trans('front.filters.sort_desc')); ?></option>
                                    <option value="id_asc" <?php echo e(($filter_sort =='id_asc')?'selected':''); ?>><?php echo e(trans('front.filters.id_asc')); ?>

                                    </option>
                                    <option value="id_desc" <?php echo e(($filter_sort =='id_desc')?'selected':''); ?>>
                                        <?php echo e(trans('front.filters.id_desc')); ?></option>
                                </select>
                            </div>

                        </form>
                        
                        <div class="tt-quantity">
                            <a href="#" class="tt-col-one" data-value="tt-col-one"></a>
                            <a href="#" class="tt-col-two" data-value="tt-col-two"></a>
                            <a href="#" class="tt-col-three" data-value="tt-col-three"></a>
                            <a href="#" class="tt-col-four" data-value="tt-col-four"></a>
                            <a href="#" class="tt-col-six" data-value="tt-col-six"></a>
                        </div>
                        <a href="#" class="tt-grid-switch icon-h-43"></a>
                    </div>
                    <div class="tt-product-listing row">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-6 col-md-4 tt-col-item">
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
                                  <h2 class="tt-title"><a href="<?php echo e($product->getUrl()); ?>"><?php echo e($product->getName()); ?></a></h2>
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
                        <?php echo e($products->appends(request()->except(['page','_token']))->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



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


<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
  $('[name="filter_sort"]').change(function(event) {
      $('#filter_sort').submit();
  });
</script>


<?php if(!empty($layout_page) && $includePathScript = config('sc_include_script.'.$layout_page, [])): ?>
<?php $__currentLoopData = $includePathScript; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if(view()->exists($script)): ?>
    <?php echo $__env->make($script, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make($sc_templatePath.'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/screen/shop_product_list.blade.php ENDPATH**/ ?>