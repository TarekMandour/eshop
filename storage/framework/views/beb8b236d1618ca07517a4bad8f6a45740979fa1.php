<?php $__env->startSection('main'); ?>

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container py-8">

            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header with-border">
                    <div class="card-toolbar">
                        <h2 class="card-title"><?php echo e($title_description??''); ?></h2>
                    </div>

                    <div class="card-title">
                        <div class="btn-group float-right" style="margin-right: 5px">
                            <a href="<?php echo e(sc_route_admin('admin_product.index')); ?>" class="btn  btn-flat btn-default"
                               title="List">
                                <i class="fa fa-list"></i><span class="hidden-xs"> <?php echo e(trans('admin.back_list')); ?></span>
                            </a>
                        </div>
                    </div>


                </div>


                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo e(sc_route_admin('admin_product.edit',['id'=>$product['id']])); ?>" method="post"
                      accept-charset="UTF-8"
                      class="form-horizontal" id="form-main" enctype="multipart/form-data">



                    <div class="card-body">
                        <?php if(sc_config_admin('product_kind')): ?>
                            <div class="d-flex d-flex justify-content-center mb-3" id="start-add">
                                <div class="form-group">
                                    <div style="width: 300px;text-align: center; z-index:999">
                                        <b><?php echo e(trans('product.type')); ?>:</b> <?php echo $kinds[$product->kind]??''; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php
                            $descriptions = $product->descriptions->keyBy('lang')->toArray();
                        ?>

                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card card-<?php echo e(($product->kind == 1) ? 'success': (($product->kind == 2) ? 'danger': '')); ?>">
                                <div class="card-header with-border">
                                    <h3 class="card-title"><?php echo e($language->name); ?> <?php echo sc_image_render($language->icon,'20px','20px', $language->name); ?></h3>

                                </div>

                                <div class="card-body">

                                    <div class="form-group row  <?php echo e($errors->has('descriptions.'.$code.'.name') ? ' text-red' : ''); ?>">
                                        <label for="<?php echo e($code); ?>__name"
                                               class="col-sm-2 col-form-label"><?php echo e(trans('product.name')); ?> <span
                                                    class="seo" title="SEO"><i class="fa fa-coffee"
                                                                               aria-hidden="true"></i></span></label>

                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="fas fa-pencil-alt"></i></span>
                                                </div>
                                                <input type="text" id="<?php echo e($code); ?>__name"
                                                       name="descriptions[<?php echo e($code); ?>][name]"
                                                       value="<?php echo old('descriptions.'.$code.'.name',($descriptions[$code]['name']??'')); ?>"
                                                       class="form-control <?php echo e($code.'__name'); ?>" placeholder=""/>
                                            </div>
                                            <?php if($errors->has('descriptions.'.$code.'.name')): ?>
                                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i>
                                    <?php echo e($errors->first('descriptions.'.$code.'.name')); ?>

                                </span>
                                            <?php else: ?>
                                                <span class="form-text">
                                        <i class="fa fa-info-circle"></i> <?php echo e(trans('admin.max_c',['max'=>200])); ?>

                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div
                                            class="form-group row  <?php echo e($errors->has('descriptions.'.$code.'.keyword') ? ' text-red' : ''); ?>">
                                        <label for="<?php echo e($code); ?>__keyword"
                                               class="col-sm-2 col-form-label"><?php echo e(trans('product.keyword')); ?> <span
                                                    class="seo" title="SEO"><i class="fa fa-coffee"
                                                                               aria-hidden="true"></i></span></label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="fas fa-pencil-alt"></i></span>
                                                </div>
                                                <input type="text" id="<?php echo e($code); ?>__keyword"
                                                       name="descriptions[<?php echo e($code); ?>][keyword]"
                                                       value="<?php echo old('descriptions.'.$code.'.keyword',($descriptions[$code]['keyword']??'')); ?>"
                                                       class="form-control <?php echo e($code.'__keyword'); ?>" placeholder=""/>
                                            </div>
                                            <?php if($errors->has('descriptions.'.$code.'.keyword')): ?>
                                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i>
                                    <?php echo e($errors->first('descriptions.'.$code.'.keyword')); ?>

                                </span>
                                            <?php else: ?>
                                                <span class="form-text">
                                        <i class="fa fa-info-circle"></i> <?php echo e(trans('admin.max_c',['max'=>200])); ?>

                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div
                                            class="form-group row  <?php echo e($errors->has('descriptions.'.$code.'.description') ? ' text-red' : ''); ?>">
                                        <label for="<?php echo e($code); ?>__description"
                                               class="col-sm-2 col-form-label"><?php echo e(trans('product.description')); ?> <span
                                                    class="seo" title="SEO"><i class="fa fa-coffee"
                                                                               aria-hidden="true"></i></span></label>
                                        <div class="col-sm-8">
                                    <textarea id="<?php echo e($code); ?>__description"
                                              name="descriptions[<?php echo e($code); ?>][description]"
                                              class="form-control <?php echo e($code.'__description'); ?>"
                                              placeholder=""/><?php echo e(old('descriptions.'.$code.'.description',($descriptions[$code]['description']??''))); ?></textarea>
                                            <?php if($errors->has('descriptions.'.$code.'.description')): ?>
                                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i>
                                    <?php echo e($errors->first('descriptions.'.$code.'.description')); ?>

                                </span>
                                            <?php else: ?>
                                                <span class="form-text">
                                        <i class="fa fa-info-circle"></i> <?php echo e(trans('admin.max_c',['max'=>300])); ?>

                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?php if($product->kind == SC_PRODUCT_SINGLE): ?>
                                        <div
                                                class="form-group row <?php echo e($errors->has('descriptions.'.$code.'.content') ? ' text-red' : ''); ?>">
                                            <label for="<?php echo e($code); ?>__content"
                                                   class="col-sm-2 col-form-label"><?php echo e(trans('product.content')); ?></label>
                                            <div class="col-sm-8">
                                <textarea id="<?php echo e($code); ?>__content" class="editor"
                                          name="descriptions[<?php echo e($code); ?>][content]">
                                    <?php echo old('descriptions.'.$code.'.content',($descriptions[$code]['content']??'')); ?></textarea>
                                                <?php if($errors->has('descriptions.'.$code.'.content')): ?>
                                                    <span class="form-text">
                                                        <i class="fa fa-info-circle"></i>
                                                        <?php echo e($errors->first('descriptions.'.$code.'.content')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($product->kind == SC_PRODUCT_SINGLE): ?>
                                        <div
                                                class="form-group row <?php echo e($errors->has('descriptions.'.$code.'.specifications') ? ' text-red' : ''); ?>">
                                            <label for="<?php echo e($code); ?>__specifications"
                                                   class="col-sm-2 col-form-label">Specifications</label>
                                            <div class="col-sm-8">
                                <textarea id="<?php echo e($code); ?>__specifications" class="editor"
                                          name="descriptions[<?php echo e($code); ?>][specifications]">
                                    <?php echo old('descriptions.'.$code.'.specifications',($descriptions[$code]['specifications']??'')); ?></textarea>
                                                <?php if($errors->has('descriptions.'.$code.'.specifications')): ?>
                                                    <span class="form-text">
                                                        <i class="fa fa-info-circle"></i>
                                                        <?php echo e($errors->first('descriptions.'.$code.'.specifications')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($product->kind == SC_PRODUCT_SINGLE): ?>
                                        <div
                                                class="form-group row <?php echo e($errors->has('descriptions.'.$code.'.condition') ? ' text-red' : ''); ?>">
                                            <label for="<?php echo e($code); ?>__condition"
                                                   class="col-sm-2 col-form-label">Condition</label>
                                            <div class="col-sm-8">
                                <textarea id="<?php echo e($code); ?>__condition" class="editor"
                                          name="descriptions[<?php echo e($code); ?>][condition]">
                                    <?php echo old('descriptions.'.$code.'.condition',($descriptions[$code]['condition']??'')); ?></textarea>
                                                <?php if($errors->has('descriptions.'.$code.'.condition')): ?>
                                                    <span class="form-text">
                                                        <i class="fa fa-info-circle"></i>
                                                        <?php echo e($errors->first('descriptions.'.$code.'.condition')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($product->kind == SC_PRODUCT_SINGLE): ?>
                                        <div
                                                class="form-group row <?php echo e($errors->has('descriptions.'.$code.'.delivery') ? ' text-red' : ''); ?>">
                                            <label for="<?php echo e($code); ?>__delivery"
                                                   class="col-sm-2 col-form-label">delivery & Return</label>
                                            <div class="col-sm-8">
                                <textarea id="<?php echo e($code); ?>__delivery" class="editor"
                                          name="descriptions[<?php echo e($code); ?>][delivery]">
                                    <?php echo old('descriptions.'.$code.'.delivery',($descriptions[$code]['delivery']??'')); ?></textarea>
                                                <?php if($errors->has('descriptions.'.$code.'.delivery')): ?>
                                                    <span class="form-text">
                                                        <i class="fa fa-info-circle"></i>
                                                        <?php echo e($errors->first('descriptions.'.$code.'.delivery')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($product->kind == SC_PRODUCT_SINGLE): ?>
                                        <div
                                                class="form-group row <?php echo e($errors->has('descriptions.'.$code.'.warranty') ? ' text-red' : ''); ?>">
                                            <label for="<?php echo e($code); ?>__warranty"
                                                   class="col-sm-2 col-form-label">Warranty</label>
                                            <div class="col-sm-8">
                                <textarea id="<?php echo e($code); ?>__warranty" class="editor"
                                          name="descriptions[<?php echo e($code); ?>][warranty]">
                                    <?php echo old('descriptions.'.$code.'.warranty',($descriptions[$code]['warranty']??'')); ?></textarea>
                                                <?php if($errors->has('descriptions.'.$code.'.warranty')): ?>
                                                    <span class="form-text">
                                                        <i class="fa fa-info-circle"></i>
                                                        <?php echo e($errors->first('descriptions.'.$code.'.warranty')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        

                        
                        <?php
                            $listCate = [];
                            $category = old('category', $product->categories->pluck('id')->toArray());
                            if(is_array($category)){
                                foreach($category as $value){
                                    $listCate[] = (int)$value;
                                }
                            }
                        ?>

                        <div class="form-group row <?php echo e($errors->has('category') ? ' text-red' : ''); ?>">
                            <label for="category"
                                   class="col-sm-2 col-form-label"><?php echo e(trans('product.admin.select_category')); ?></label>
                            <div class="col-sm-8">
                                <select class="form-control category select2" multiple="multiple"
                                        data-placeholder="<?php echo e(trans('product.admin.select_category')); ?>"
                                        style="width: 100%;"
                                        name="category[]">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k); ?>"
                                                <?php echo e((count($listCate) && in_array($k, $listCate))?'selected':''); ?>><?php echo e($v); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('category')): ?>
                                    <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('category')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        


                        
                        <div class="form-group row  <?php echo e($errors->has('image') ? ' text-red' : ''); ?>">
                            <label for="image" class="col-sm-2 col-form-label"><?php echo e(trans('product.image')); ?></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" id="image" name="image"
                                           value="<?php echo old('image',$product->image); ?>" class="form-control image"
                                           placeholder=""/>
                                    <div class="input-group-append">
                                        <a data-input="image" data-preview="preview_image" data-type="product"
                                           class="btn btn-primary lfm">
                                            <i class="fa fa-image"></i> <?php echo e(trans('product.admin.choose_image')); ?>

                                        </a>
                                    </div>
                                </div>
                                <?php if($errors->has('image')): ?>
                                    <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('image')); ?>

                                </span>
                                <?php endif; ?>
                                <div id="preview_image" class="img_holder">
                                    <?php if(old('image',$product->image)): ?>
                                        <img src="<?php echo e(sc_file(old('image',$product->image))); ?>">
                                    <?php endif; ?>
                                </div>
                                <?php
                                    $listsubImages = old('sub_image',$product->images->pluck('image')->all());
                                ?>
                                <?php if(!empty($listsubImages)): ?>
                                    <?php $__currentLoopData = $listsubImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sub_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($sub_image): ?>
                                            <div class="group-image">
                                                <div class="input-group"><input type="text" id="sub_image_<?php echo e($key); ?>"
                                                                                name="sub_image[]"
                                                                                value="<?php echo $sub_image; ?>"
                                                                                class="form-control sub_image"
                                                                                placeholder=""/><span
                                                            class="input-group-btn"><span><a
                                                                    data-input="sub_image_<?php echo e($key); ?>"
                                                                    data-preview="preview_sub_image_<?php echo e($key); ?>"
                                                                    data-type="product"
                                                                    class="btn btn-flat btn-primary lfm"><i
                                                                        class="fa fa-image"></i>
                                                    <?php echo e(trans('product.admin.choose_image')); ?></a></span><span
                                                                title="Remove"
                                                                class="btn btn-flat btn-danger removeImage"><i
                                                                    class="fa fa-times"></i></span></span></div>
                                                <div id="preview_sub_image_<?php echo e($key); ?>" class="img_holder"><img
                                                            src="<?php echo e(sc_file($sub_image)); ?>"></div>
                                            </div>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <button type="button" id="add_sub_image" class="btn btn-flat btn-success">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    <?php echo e(trans('product.admin.add_sub_image')); ?>

                                </button>

                            </div>
                        </div>
                        


                        
                        <div class="form-group row <?php echo e($errors->has('sku') ? ' text-red' : ''); ?>">
                            <label for="sku" class="col-sm-2 col-form-label"><?php echo e(trans('product.sku')); ?></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                    </div>
                                    <input type="text" style="width: 100px;" id="sku" name="sku"
                                           value="<?php echo old('sku',$product->sku); ?>" class="form-control sku"
                                           placeholder=""/>
                                </div>
                                <?php if($errors->has('sku')): ?>
                                    <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('sku')); ?>

                                </span>
                                <?php else: ?>
                                    <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e(trans('product.sku_validate')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        


                        
                        <div class="form-group row <?php echo e($errors->has('alias') ? ' text-red' : ''); ?>">
                            <label for="alias" class="col-sm-2 col-form-label"><?php echo trans('product.alias'); ?></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                    </div>
                                    <input type="text" id="alias" name="alias"
                                           value="<?php echo old('alias', $product->alias); ?>" class="form-control alias"
                                           placeholder=""/>
                                </div>
                                <?php if($errors->has('alias')): ?>
                                    <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('alias')); ?>

                                </span>
                                <?php else: ?>
                                    <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e(trans('product.alias_validate')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        

                        <?php if(sc_config_admin('product_brand') && ($product->kind == SC_PRODUCT_SINGLE || $product->kind == SC_PRODUCT_BUILD)): ?>
                            
                            <div class="form-group row kind kind0 kind1 <?php echo e($errors->has('brand_id') ? ' text-red' : ''); ?>">
                                <label for="brand_id" class="col-sm-2 col-form-label"><?php echo e(trans('product.brand')); ?> (<a
                                            href="<?php echo e(sc_route_admin('admin_brand.index')); ?>"><i class="fa fa-link"
                                                                                                aria-hidden="true"></i></a>)</label>
                                <div class="col-sm-8">
                                    <select class="form-control brand_id select2" style="width: 100%;"
                                            name="brand_id">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>"
                                                    <?php echo e((old('brand_id') ==$k || (!old() && $product->brand_id ==$k) ) ? 'selected':''); ?>>
                                                <?php echo e($v->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('brand_id')): ?>
                                        <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('brand_id')); ?>

                                </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                        <?php endif; ?>

                        <?php if(sc_config_admin('product_supplier') && ($product->kind == SC_PRODUCT_SINGLE || $product->kind == SC_PRODUCT_BUILD)): ?>
                            
                            <div class="form-group row kind kind0 kind1 <?php echo e($errors->has('supplier_id') ? ' text-red' : ''); ?>">
                                <label for="supplier_id" class="col-sm-2 col-form-label"><?php echo e(trans('product.supplier')); ?>

                                    (<a href="<?php echo e(sc_route_admin('admin_supplier.index')); ?>"><i class="fa fa-link"
                                                                                               aria-hidden="true"></i></a>)</label>
                                <div class="col-sm-8">
                                    <select class="form-control supplier_id select2" style="width: 100%;"
                                            name="supplier_id">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>"
                                                    <?php echo e((old('supplier_id') ==$k || (!old() && $product->supplier_id ==$k) ) ? 'selected':''); ?>>
                                                <?php echo e($v->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('supplier_id')): ?>
                                        <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('supplier_id')); ?>

                                </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                        <?php endif; ?>

                        <?php if(sc_config_admin('product_cost')): ?>
                            
                            <?php if($product->kind == SC_PRODUCT_SINGLE): ?>
                                <div class="form-group row kind kind0 kind1  <?php echo e($errors->has('cost') ? ' text-red' : ''); ?>">
                                    <label for="cost"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('product.cost')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <input type="number" style="width: 100px;" id="cost" name="cost"
                                                   value="<?php echo old('cost',$product->cost); ?>" class="form-control cost"
                                                   placeholder=""/>
                                        </div>
                                        <?php if($errors->has('cost')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('cost')); ?>

                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                        <?php endif; ?>

                        <?php if(sc_config_admin('product_price')): ?>
                            <?php if($product->kind == SC_PRODUCT_SINGLE || $product->kind == SC_PRODUCT_BUILD): ?>
                                
                                <div class="form-group row  <?php echo e($errors->has('price') ? ' text-red' : ''); ?>">
                                    <label for="price"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('product.price')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <input type="number" style="width: 100px;" id="price" name="price"
                                                   value="<?php echo old('price',$product->price); ?>"
                                                   class="form-control price"
                                                   placeholder=""/>
                                        </div>
                                        <?php if($errors->has('price')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('price')); ?>

                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                            <?php endif; ?>

                            <?php if(sc_config_admin('product_tax')): ?>
                                <?php if($product->kind == SC_PRODUCT_SINGLE || $product->kind == SC_PRODUCT_BUILD): ?>
                                    
                                    <div class="form-group row <?php echo e($errors->has('tax_id') ? ' text-red' : ''); ?>">
                                        <label for="tax_id" class="col-sm-2 col-form-label"><?php echo e(trans('product.tax')); ?> (<a
                                                    href="<?php echo e(sc_route_admin('admin_tax.index')); ?>"><i class="fa fa-link"
                                                                                                      aria-hidden="true"></i></a>)</label>
                                        <div class="col-sm-8">
                                            <select class="form-control tax_id select2" style="width: 100%;"
                                                    name="tax_id">
                                                <option value="0" <?php echo e((old('tax_id', $product->tax_id) == 0) ? 'selected':''); ?>><?php echo e(trans('tax.admin.non_tax')); ?></option>
                                                <option value="auto" <?php echo e((old('tax_id', $product->tax_id) == 'auto') ? 'selected':''); ?>><?php echo e(trans('tax.admin.auto')); ?></option>
                                                <?php $__currentLoopData = $taxs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($k); ?>"
                                                            <?php echo e((old('tax_id') ==$k || (!old() && $product->tax_id ==$k) ) ? 'selected':''); ?>>
                                                        <?php echo e($v->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('tax_id')): ?>
                                                <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('tax_id')); ?>

                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(sc_config_admin('product_promotion')): ?>
                                
                                <div class="form-group row kind kind0 kind1  <?php echo e($errors->has('price_promotion') ? ' text-red' : ''); ?>">
                                    <label for="price"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('product.price_promotion')); ?></label>
                                    <div class="col-sm-8">
                                        <?php if(old('price_promotion') || $product->promotionPrice): ?>
                                            <div class="price_promotion">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                                    </div>
                                                    <input type="number" style="width: 100px;" id="price_promotion"
                                                           name="price_promotion"
                                                           value="<?php echo old('price_promotion',$product->promotionPrice->price_promotion ?? ''); ?>"
                                                           class="form-control price_promotion" placeholder=""/>
                                                    <span title="Remove"
                                                          class="btn btn-flat btn-danger removePromotion"><i
                                                                class="fa fa-times"></i></span>
                                                </div>
                                                <div class="form-group">
                                                    <label><?php echo e(trans('product.price_promotion_start')); ?></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar fa-fw"></i></span>
                                                        </div>
                                                        <input type="text" style="width: 100px;"
                                                               id="price_promotion_start"
                                                               name="price_promotion_start"
                                                               value="<?php echo old('price_promotion_start', sc_datetime_to_date($product->promotionPrice->date_start)); ?>"
                                                               class="form-control price_promotion_start date_time"
                                                               placeholder="yyyy-mm-dd"/>
                                                    </div>

                                                    <label><?php echo e(trans('product.price_promotion_end')); ?></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="fa fa-calendar fa-fw"></i></span>
                                                        </div>
                                                        <input type="text" style="width: 100px;"
                                                               id="price_promotion_end"
                                                               name="price_promotion_end"
                                                               value="<?php echo old('price_promotion_end', sc_datetime_to_date($product->promotionPrice->date_end)); ?>"
                                                               class="form-control price_promotion_end date_time"
                                                               placeholder="yyyy-mm-dd"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" style="display: none;" id="add_product_promotion"
                                                    class="btn btn-flat btn-success">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                <?php echo e(trans('product.admin.add_product_promotion')); ?>

                                            </button>
                                        <?php else: ?>
                                            <button type="button" id="add_product_promotion"
                                                    class="btn btn-flat btn-success">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                <?php echo e(trans('product.admin.add_product_promotion')); ?>

                                            </button>
                                        <?php endif; ?>
                                        <?php if($errors->has('price_promotion')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('price_promotion')); ?>

                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if(sc_config_admin('product_stock')): ?>
                            
                            <?php if($product->kind == SC_PRODUCT_SINGLE || $product->kind == SC_PRODUCT_BUILD): ?>
                                <div class="form-group row <?php echo e($errors->has('stock') ? ' text-red' : ''); ?>">
                                    <label for="stock"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('product.stock')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <input type="number" style="width: 100px;" id="stock" name="stock"
                                                   value="<?php echo old('stock',$product->stock); ?>"
                                                   class="form-control stock"
                                                   placeholder=""/>
                                        </div>
                                        <?php if($errors->has('stock')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('stock')); ?>

                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                        <?php endif; ?>

                        <?php if(sc_config_admin('product_weight')): ?>
                            
                            <?php if($product->kind == SC_PRODUCT_SINGLE || $product->kind == SC_PRODUCT_BUILD): ?>

                                <div class="form-group row <?php echo e($errors->has('weight_class') ? ' text-red' : ''); ?>">
                                    <label for="weight_class"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('product.weight_class')); ?> (<a
                                                href="<?php echo e(sc_route_admin('admin_weight_unit.index')); ?>"><i
                                                    class="fa fa-link" aria-hidden="true"></i></a>)</label>
                                    <div class="col-sm-8">
                                        <select class="form-control weight_class select2" style="width: 100%;"
                                                name="weight_class">
                                            <option value=""><?php echo e(trans('product.select_weight')); ?>

                                            <option>
                                            <?php $__currentLoopData = $listWeight; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($k); ?>"
                                                        <?php echo e((old('weight_class') == $k || (!old() && $product->weight_class ==$k) ) ? 'selected':''); ?>>
                                                    <?php echo e($v); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('weight_class')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('weight_class')); ?>

                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="form-group row <?php echo e($errors->has('weight') ? ' text-red' : ''); ?>">
                                    <label for="weight"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('product.weight')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <input type="number" style="width: 100px;" id="weight" name="weight"
                                                   value="<?php echo old('weight',$product->weight); ?>"
                                                   class="form-control weight"
                                                   placeholder=""/>
                                        </div>
                                        <?php if($errors->has('weight')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('weight')); ?>

                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            <?php endif; ?>
                            
                        <?php endif; ?>


                        <?php if(sc_config_admin('product_length')): ?>
                            
                            <?php if($product->kind == SC_PRODUCT_SINGLE || $product->kind == SC_PRODUCT_BUILD): ?>

                                <div class="form-group row <?php echo e($errors->has('length_class') ? ' text-red' : ''); ?>">
                                    <label for="length_class"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('product.length_class')); ?> (<a
                                                href="<?php echo e(sc_route_admin('admin_length_unit.index')); ?>"><i
                                                    class="fa fa-link" aria-hidden="true"></i></a>)</label>
                                    <div class="col-sm-8">
                                        <select class="form-control length_class select2" style="width: 100%;"
                                                name="length_class">
                                            <option value=""><?php echo e(trans('product.select_length')); ?>

                                            <option>
                                            <?php $__currentLoopData = $listLength; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($k); ?>"
                                                        <?php echo e((old('length_class') == $k || (!old() && $product->length_class ==$k) ) ? 'selected':''); ?>>
                                                    <?php echo e($v); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('length_class')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('length_class')); ?>

                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="form-group row <?php echo e($errors->has('length') ? ' text-red' : ''); ?>">
                                    <label for="length"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('product.length')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <input type="number" style="width: 100px;" id="length" name="length"
                                                   value="<?php echo old('length',$product->length); ?>"
                                                   class="form-control length"
                                                   placeholder=""/>
                                        </div>
                                        <?php if($errors->has('length')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('length')); ?>

                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row <?php echo e($errors->has('height') ? ' text-red' : ''); ?>">
                                    <label for="height"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('product.height')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <input type="number" style="width: 100px;" id="height" name="height"
                                                   value="<?php echo old('height',$product->height); ?>"
                                                   class="form-control height"
                                                   placeholder=""/>
                                        </div>
                                        <?php if($errors->has('height')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('height')); ?>

                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row <?php echo e($errors->has('width') ? ' text-red' : ''); ?>">
                                    <label for="width"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('product.width')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <input type="number" style="width: 100px;" id="width" name="width"
                                                   value="<?php echo old('width',$product->width); ?>"
                                                   class="form-control width"
                                                   placeholder=""/>
                                        </div>
                                        <?php if($errors->has('width')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('width')); ?>

                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            <?php endif; ?>
                            
                        <?php endif; ?>


                        <?php if(sc_config_admin('product_property')): ?>
                            
                            <?php if($product->kind == SC_PRODUCT_SINGLE): ?>
                                <div class="form-group row kind kind0 kind1  <?php echo e($errors->has('property') ? ' text-red' : ''); ?>">
                                    <label for="property"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('product.property')); ?> (<a
                                                href="<?php echo e(sc_route_admin('admin_product_property.index')); ?>"><i
                                                    class="fa fa-link" aria-hidden="true"></i></a>)</label>
                                    <div class="col-sm-8">
                                        <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="radioPrimary<?php echo e($key); ?>" name="property"
                                                       value="<?php echo e($key); ?>" <?php echo e((old('property',$product->property) == $key)?'checked':''); ?>>
                                                <label for="radioPrimary<?php echo e($key); ?>">
                                                    <?php echo e($property); ?>

                                                </label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($errors->has('property')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('property')); ?>

                                </span>
                                        <?php endif; ?>

                                        <div class="input-group"
                                             style="margin-top: 10px; <?php echo e((old('property', $product->property) != SC_PROPERTY_DOWNLOAD) ? 'display:none':''); ?>"
                                             id="download_path">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-download"></i></span>
                                            </div>
                                            <input type="text" name="download_path"
                                                   value="<?php echo e(old('download_path', $product->downloadPath->path ?? '')); ?>"
                                                   class="form-control input-sm"
                                                   placeholder="<?php echo e(trans('product.properties.download_path')); ?>"/>
                                        </div>

                                    </div>
                                </div>
                            <?php endif; ?>
                            
                        <?php endif; ?>

                        <?php if(sc_config_admin('product_available')): ?>
                            
                            <?php if($product->kind == SC_PRODUCT_SINGLE || $product->kind == SC_PRODUCT_BUILD): ?>
                                <div
                                        class="form-group row kind kind0 kind1  <?php echo e($errors->has('date_available') ? ' text-red' : ''); ?>">
                                    <label for="date_available"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('product.date_available')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="fa fa-calendar fa-fw"></i></span>
                                            </div>
                                            <input type="text" style="width: 100px;" id="date_available"
                                                   name="date_available"
                                                   value="<?php echo old('date_available',$product->date_available); ?>"
                                                   class="form-control date_available date_time"
                                                   placeholder="yyyy-mm-dd"/>
                                        </div>
                                        <?php if($errors->has('date_available')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('date_available')); ?>

                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                        <?php endif; ?>


                        <?php if(($product->kind == SC_PRODUCT_SINGLE || $product->kind == SC_PRODUCT_BUILD)): ?>

                            
                            <div class="form-group row kind kind0 kind1  <?php echo e($errors->has('minimum') ? ' text-red' : ''); ?>">
                                <label for="minimum"
                                       class="col-sm-2 col-form-label"><?php echo e(trans('product.minimum')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="number" style="width: 100px;" id="minimum" name="minimum"
                                               value="<?php echo old('minimum',$product['minimum']); ?>"
                                               class="form-control minimum"
                                               placeholder=""/>
                                    </div>
                                    <?php if($errors->has('minimum')): ?>
                                        <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('minimum')); ?>

                                </span>
                                    <?php else: ?>
                                        <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e(trans('product.minimum_help')); ?>

                                </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                        <?php endif; ?>

                        
                        <div class="form-group row  <?php echo e($errors->has('sort') ? ' text-red' : ''); ?>">
                            <label for="sort" class="col-sm-2 col-form-label"><?php echo e(trans('product.sort')); ?></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                    </div>
                                    <input type="number" style="width: 100px;" id="sort" name="sort"
                                           value="<?php echo old('sort',$product['sort']); ?>" class="form-control sort"
                                           placeholder=""/>
                                </div>
                                <?php if($errors->has('sort')): ?>
                                    <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('sort')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        

                        
                        <div class="form-group row ">
                            <label for="status" class="col-sm-2 col-form-label"><?php echo e(trans('product.status')); ?></label>
                            <div class="col-sm-8">
                                <?php if(old()): ?>
                                    <input class="checkbox" type="checkbox"
                                           name="status" <?php echo e(old('status',$product['status'])?'checked':''); ?>>
                                <?php else: ?>
                                    <input class="checkbox" type="checkbox" name="status" checked>
                                <?php endif; ?>

                            </div>
                        </div>
                        

                        <?php if(sc_config_admin('product_kind')): ?>
                            <?php if($product->kind == SC_PRODUCT_GROUP): ?>
                                
                                <hr>
                                <div class="form-group row <?php echo e($errors->has('productInGroup') ? ' text-red' : ''); ?>">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <label><?php echo e(trans('product.admin.select_product_in_group')); ?></label>
                                    </div>
                                </div>
                                <div class="form-group row <?php echo e($errors->has('productInGroup') ? ' text-red' : ''); ?>">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-8">
                                        <?php
                                            $listgroups= [];
                                            $groups = old('productInGroup',$product->groups->pluck('product_id')->toArray());
                                            if(is_array($groups)){
                                            foreach($groups as $value){
                                            $listgroups[] = (int)$value;
                                            }
                                            }
                                        ?>
                                        <?php if($listgroups): ?>
                                            <?php $__currentLoopData = $listgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pID): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if((int)$pID): ?>
                                                    <?php
                                                        $newHtml = str_replace('value="'.(int)$pID.'"', 'value="'.(int)$pID.'" selected',
                                                        $htmlSelectGroup);
                                                    ?>
                                                    <?php echo $newHtml; ?>

                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <div id="position_group_flag"></div>
                                        <?php if($errors->has('productInGroup')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('productInGroup')); ?>

                                </span>
                                        <?php endif; ?>
                                        <button type="button" id="add_product_in_group"
                                                class="btn btn-flat btn-success">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            <?php echo e(trans('product.admin.add_product')); ?>

                                        </button>
                                        <?php if($errors->has('productInGroup')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('productInGroup')); ?>

                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                            <?php endif; ?>



                            <?php if($product->kind == SC_PRODUCT_BUILD): ?>
                                <hr>
                                
                                <div class="form-group row <?php echo e($errors->has('productBuild') ? ' text-red' : ''); ?>">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <label><?php echo e(trans('product.admin.select_product_in_build')); ?></label>
                                    </div>
                                </div>

                                <div class="form-group row <?php echo e($errors->has('productBuild') ? ' text-red' : ''); ?>">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row"></div>

                                        <?php
                                            $listBuilds= [];
                                            $groups = old('productBuild',$product->builds->pluck('product_id')->toArray());
                                            $groupsQty = old('productBuildQty',$product->builds->pluck('quantity')->toArray());
                                            if(is_array($groups)){
                                            foreach($groups as $key => $value){
                                            $listBuilds[] = (int)$value;
                                            $listBuildsQty[] = (int)$groupsQty[$key];
                                            }
                                            }
                                        ?>

                                        <?php if($listBuilds): ?>
                                            <?php $__currentLoopData = $listBuilds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pID): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if((int)$pID && $listBuildsQty[$key]): ?>
                                                    <?php
                                                        $newHtml = str_replace('value="'.(int)$pID.'"', 'value="'.(int)$pID.'" selected',
                                                        $htmlSelectBuild);
                                                        $newHtml = str_replace('name="productBuildQty[]" value="1" min=1',
                                                        'name="productBuildQty[]" value="'.$listBuildsQty[$key].'"', $newHtml);
                                                    ?>
                                                    <?php echo $newHtml; ?>

                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <div id="position_build_flag"></div>
                                        <?php if($errors->has('productBuild')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('productBuild')); ?>

                                </span>
                                        <?php endif; ?>
                                        <button type="button" id="add_product_in_build"
                                                class="btn btn-flat btn-success">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            <?php echo e(trans('product.admin.add_product')); ?>

                                        </button>
                                        <?php if($errors->has('productBuild') || $errors->has('productBuildQty')): ?>
                                            <span class="form-text">
                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('productBuild')); ?>

                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                            <?php endif; ?>
                        <?php endif; ?>


                        <?php if(sc_config_admin('product_attribute')): ?>
                            <?php if($product->kind == SC_PRODUCT_SINGLE): ?>
                                
                                <hr>
                                <?php if(!empty($attributeGroup)): ?>
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <label><?php echo e(trans('product.attribute')); ?> (<a
                                                        href="<?php echo e(sc_route_admin('admin_attribute_group.index')); ?>"><i
                                                            class="fa fa-link" aria-hidden="true"></i></a>)</label>
                                        </div>
                                        <div class="col-sm-8">

                                            <?php
                                                $getDataAtt = $product->attributes->groupBy('attribute_group_id')->toArray();
                                                $arrAtt = [];
                                                foreach ($getDataAtt as $groupId => $row) {
                                                    foreach ($row as $key => $value) {
                                                        $arrAtt[$groupId]['name'][] = $value['name'];
                                                        $arrAtt[$groupId]['add_price'][] = $value['add_price'];
                                                    }
                                                }
                                                $dataAtt = old('attribute', $arrAtt);
                                            ?>

                                            <?php $__currentLoopData = $attributeGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attGroupId => $attName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <table width="100%">
                                                    <tr>
                                                        <td colspan="3"><p><b><?php echo e($attName); ?>:</b></p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('product.admin.add_attribute_place')); ?></td>
                                                        <td><?php echo e(trans('product.admin.add_price_place')); ?></td>
                                                    </tr>
                                                    <?php if(!empty($dataAtt[$attGroupId]['name'])): ?>
                                                        <?php $__currentLoopData = $dataAtt[$attGroupId]['name']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $newHtml = str_replace('attribute_group', $attGroupId, $htmlProductAtrribute);
                                                                $newHtml = str_replace('attribute_value', $attValue, $newHtml);
                                                                $newHtml = str_replace('add_price_value', $dataAtt[$attGroupId]['add_price'][$key], $newHtml);
                                                            ?>
                                                            <?php echo $newHtml; ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                    <tr>
                                                        <td colspan="3"><br>
                                                            <button type="button"
                                                                    class="btn btn-flat btn-success add_attribute"
                                                                    data-id="<?php echo e($attGroupId); ?>">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                                <?php echo e(trans('product.admin.add_attribute')); ?>

                                                            </button>
                                                            <br><br></td>
                                                    </tr>
                                                </table>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                            <?php endif; ?>
                        <?php endif; ?>



                        
                        <?php if(isset($customFields) && $customFields): ?>
                            <?php
                                $fields = $product->getCustomFields()
                            ?>
                            <hr class="kind ">
                            <label><?php echo e(trans('custom_field.admin.title')); ?> (<a target=_new
                                                                               href="<?php echo e(sc_route_admin('admin_custom_field.index')); ?>"><i
                                            class="fa fa-link" aria-hidden="true"></i></a>)</label>
                            <?php $__currentLoopData = $customFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyField => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $default  = json_decode($field->default, true)
                                ?>
                                <div class="form-group row kind   <?php echo e($errors->has('fields.'.$field->code) ? ' text-red' : ''); ?>">
                                    <label for="<?php echo e($field->code); ?>"
                                           class="col-sm-2 col-form-label"><?php echo e(sc_language_render($field->name)); ?></label>

                                    <div class="col-sm-8">
                                        <?php if($field->option == 'radio'): ?>
                                            <?php if($default): ?>
                                                <?php $__currentLoopData = $default; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="<?php echo e($keyField.'__'.$key); ?>"
                                                               name="fields[<?php echo e($field->code); ?>]"
                                                               value="<?php echo e($key); ?>" <?php echo e((old('fields.'.$field->code, ($fields[$field->code]['text'] ?? '')) == $key)?'checked':''); ?>>
                                                        <label for="<?php echo e($keyField.'__'.$key); ?>">
                                                            <?php echo e($name); ?>

                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php elseif($field->option == 'select'): ?>
                                            <?php if($default): ?>
                                                <select class="form-control input-sm <?php echo e($field->code); ?>"
                                                        style="width: 100%;"
                                                        name="fields[<?php echo e($field->code); ?>]">
                                                    <option value=""></option>
                                                    <?php $__currentLoopData = $default; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($key); ?>" <?php echo e((old('fields.'.$field->code, ($fields[$field->code]['text'] ?? '')) == $key) ? 'selected':''); ?>><?php echo e($name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <textarea id="field_<?php echo e($field->code); ?>" name="fields[<?php echo e($field->code); ?>]"
                                                      class="form-control <?php echo e($field->code); ?>"
                                                      placeholder=""><?php echo e(old('fields.'.$field->code, ($fields[$field->code]['text'] ?? ''))); ?></textarea>
                                        <?php endif; ?>

                                        <?php if($errors->has('fields.'.$field->code)): ?>
                                            <span class="form-text">
                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('fields.'.$field->code)); ?>

                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        


                    </div>


                    <!-- /.card-body -->

                    <div class="card-footer kind kind0  kind1 kind2 row" id="card-footer">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-2">
                        </div>

                        <div class="col-md-8">
                            <div class="btn-group float-right">
                                <button type="submit" class="btn btn-primary"><?php echo e(trans('admin.submit')); ?></button>
                            </div>

                            <div class="btn-group float-left">
                                <button type="reset" class="btn btn-warning"><?php echo e(trans('admin.reset')); ?></button>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>

    
    

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make($templatePathAdmin.'component.ckeditor_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    





    <script type="text/javascript">

        $("[name='property']").change(function () {
            if ($(this).val() == '<?php echo e(SC_PROPERTY_DOWNLOAD); ?>') {
                $('#download_path').show();
            } else {
                $('#download_path').hide();
            }
        });

        // Promotion
        $('#add_product_promotion').click(function (event) {
            $(this).before(
                '<div class="price_promotion">'
                + '<div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-pencil-alt"></i></span></div>'
                + '  <input type="number"  id="price_promotion" name="price_promotion" value="0" class="form-control input-sm price" placeholder="" />'
                + '  <span title="Remove" class="btn btn-flat btn-danger removePromotion"><i class="fa fa-times"></i></span>'
                + '</div>'
                + '<div class="form-group">'
                + '      <label><?php echo e(trans('product.price_promotion_start')); ?></label>'
                + '      <div class="input-group">'
                + '          <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar fa-fw"></i></span></div>'
                + '          <input type="text" style="width: 150px;"  id="price_promotion_start" name="price_promotion_start" value="" class="form-control input-sm price_promotion_start date_time" placeholder="yyyy-mm-dd" />'
                + '      </div>'
                + '      <label><?php echo e(trans('product.price_promotion_end')); ?></label>'
                + '      <div class="input-group">'
                + '          <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar fa-fw"></i></span></div>'
                + '          <input type="text" style="width: 150px;"  id="price_promotion_end" name="price_promotion_end" value="" class="form-control input-sm price_promotion_end date_time" placeholder="yyyy-mm-dd" />'
                + '      </div>'
                + '  </div>'
                + '</div>');
            $(this).hide();
            $('.removePromotion').click(function (event) {
                $(this).closest('.price_promotion').remove();
                $('#add_product_promotion').show();
            });
            $(function () {
                $(".date_time").datepicker({
                    dateFormat: "yy-mm-dd"
                });
            });
        });
        $('.removePromotion').click(function (event) {
            $('#add_product_promotion').show();
            $(this).closest('.price_promotion').remove();
        });
        //End promotion

        // Add sub images
        var id_sub_image = <?php echo e(old('sub_image')?count(old('sub_image')):0); ?>;
        $('#add_sub_image').click(function (event) {
            id_sub_image += 1;
            $(this).before(
                '<div class="group-image">'
                + '<div class="input-group">'
                + '  <input type="text" id="sub_image_' + id_sub_image + '" name="sub_image[]" value="" class="form-control sub_image" placeholder=""  />'
                + '  <div class="input-group-append">'
                + '  <span data-input="sub_image_' + id_sub_image + '" data-preview="preview_sub_image_' + id_sub_image + '" data-type="product" class="btn btn-flat btn-primary lfm">'
                + '      <i class="fa fa-image"></i> <?php echo e(trans('product.admin.choose_image')); ?>'
                + '  </span>'
                + ' </div>'
                + '<span title="Remove" class="btn btn-flat btn-danger removeImage"><i class="fa fa-times"></i></span>'
                + '</div>'
                + '<div id="preview_sub_image_' + id_sub_image + '" class="img_holder"></div>'
                + '</div>');
            $('.removeImage').click(function (event) {
                $(this).closest('div').remove();
            });
            $('.lfm').filemanager();
        });
        $('.removeImage').click(function (event) {
            $(this).closest('.group-image').remove();
        });
        //end sub images

        // Select product in group
        $('#add_product_in_group').click(function (event) {
            var htmlSelectGroup = '<?php echo $htmlSelectGroup; ?>';
            $(this).before(htmlSelectGroup);
            $('.select2').select2();
            $('.removeproductInGroup').click(function (event) {
                $(this).closest('table').remove();
            });
        });
        $('.removeproductInGroup').click(function (event) {
            $(this).closest('table').remove();
        });
        //end select in group

        // Select product in build
        $('#add_product_in_build').click(function (event) {
            var htmlSelectBuild = '<?php echo $htmlSelectBuild; ?>';
            $(this).before(htmlSelectBuild);
            $('.select2').select2();
            $('.removeproductBuild').click(function (event) {
                $(this).closest('table').remove();
            });
        });
        $('.removeproductBuild').click(function (event) {
            $(this).closest('table').remove();
        });
        //end select in build


        // Select product attributes
        $('.add_attribute').click(function (event) {
            var htmlProductAtrribute = '<?php echo $htmlProductAtrribute ?? ''; ?>';
            var attGroup = $(this).attr("data-id");
            htmlProductAtrribute = htmlProductAtrribute.replace(/attribute_group/gi, attGroup);
            htmlProductAtrribute = htmlProductAtrribute.replace("attribute_value", "");
            htmlProductAtrribute = htmlProductAtrribute.replace("add_price_value", "0");
            $(this).closest('tr').before(htmlProductAtrribute);
            $('.removeAttribute').click(function (event) {
                $(this).closest('tr').remove();
            });
        });
        $('.removeAttribute').click(function (event) {
            $(this).closest('tr').remove();
        });
        //end select attributes

        $('textarea.editor').ckeditor(
            {
                filebrowserImageBrowseUrl: '<?php echo e(sc_route_admin('admin.home').'/'.config('lfm.url_prefix')); ?>?type=product',
                filebrowserImageUploadUrl: '<?php echo e(sc_route_admin('admin.home').'/'.config('lfm.url_prefix')); ?>/upload?type=product&_token=<?php echo e(csrf_token()); ?>',
                filebrowserBrowseUrl: '<?php echo e(sc_route_admin('admin.home').'/'.config('lfm.url_prefix')); ?>?type=Files',
                filebrowserUploadUrl: '<?php echo e(sc_route_admin('admin.home').'/'.config('lfm.url_prefix')); ?>/upload?type=file&_token=<?php echo e(csrf_token()); ?>',
                filebrowserWindowWidth: '900',
                filebrowserWindowHeight: '500'
            }
        );
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make($templatePathAdmin.'layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/screen/product_edit.blade.php ENDPATH**/ ?>