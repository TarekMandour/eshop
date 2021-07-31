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
                            <a href="<?php echo e(sc_route_admin('admin_store_block.index')); ?>" class="btn  btn-flat btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs"> <?php echo e(trans('admin.back_list')); ?></span></a>

                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo e($url_action); ?>" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main"  enctype="multipart/form-data">


                    <div class="card-body">
                            <div class="form-group row  <?php echo e($errors->has('name') ? ' text-red' : ''); ?>">
                                <label for="name" class="col-sm-2 col-form-label"><?php echo e(trans('store_block.name')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="text" id="name" name="name" value="<?php echo old('name',$layout['name']??''); ?>" class="form-control" placeholder="" />
                                    </div>
                                        <?php if($errors->has('name')): ?>
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('name')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row <?php echo e($errors->has('position') ? ' text-red' : ''); ?>">
                                <label for="position" class="col-sm-2 col-form-label"><?php echo e(trans('store_block.admin.select_position')); ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control position select2" style="width: 100%;" name="position" >
                                        <option value=""></option>
                                        <?php $__currentLoopData = $layoutPosition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>" <?php echo e((old('position',$layout['position']??'') ==$k) ? 'selected':''); ?>><?php echo e(sc_language_render($v)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                        <?php if($errors->has('position')): ?>
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('position')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row <?php echo e($errors->has('page') ? ' text-red' : ''); ?>">
                                <label for="page" class="col-sm-2 col-form-label"><?php echo e(trans('store_block.admin.select_page')); ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control page select2" multiple="multiple" style="width: 100%;" name="page[]" >
                                        <option value=""></option>
                                        <?php
                                            $layoutPage = ['*'=> trans('layout.page_position.all')] + $layoutPage;
                                            $arrPage = explode(',', $layout['page']??'');
                                        ?>
                                        <?php $__currentLoopData = $layoutPage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>" <?php echo e(in_array($k,old('page',$arrPage)) ? 'selected':''); ?>><?php echo e(sc_language_render($v)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                        <?php if($errors->has('page')): ?>
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('page')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row <?php echo e($errors->has('type') ? ' text-red' : ''); ?>">
                                <label for="type" class="col-sm-2 col-form-label"><?php echo e(trans('store_block.type')); ?></label>
                                <div class="col-sm-8">
                            <?php if($layout): ?>
                                <label class="radio-inline"><input type="radio" name="type" value="<?php echo $layout['type']; ?>" checked><?php echo e($layoutType[$layout['type']]); ?></label>
                            <?php else: ?>
                                <?php $__currentLoopData = $layoutType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="radio-inline"><input type="radio" name="type" value="<?php echo $key; ?>"  <?php echo e((old('type',$layout['type']??'') == $key)?'checked':''); ?>><?php echo e($type); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                        <?php if($errors->has('type')): ?>
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('type')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row <?php echo e($errors->has('text') ? ' text-red' : ''); ?>">
                                <label for="text" class="col-sm-2 col-form-label"><?php echo e(trans('store_block.text')); ?></label>
                                <div class="col-sm-8">
                                    <?php
                                        $dataType = old('type',$layout['type']??'')
                                    ?>
                                    <?php if($dataType =='html'): ?>
                                        <textarea name="text" class="form-control text" rows="5" placeholder="Layout text">
                                            <?php echo e(old('text',$layout['text']??'')); ?>

                                        </textarea>
                                    <span class="form-text"><i class="fa fa-info-circle"></i> <?php echo e(trans('store_block.admin.helper_html')); ?></span>
                                    <?php elseif($dataType =='view'): ?>
                                        <select name="text" class="form-control text">
                                            <?php $__currentLoopData = $listViewBlock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo $view; ?>" <?php echo e((old('text',$layout['text']??'') == $view)?'selected':''); ?> ><?php echo e($view); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span class="form-text"><i class="fa fa-info-circle"></i> <?php echo e(trans('store_block.admin.helper_view',['template' => sc_store('template', session('adminStoreId'))])); ?></span>
                                    <?php else: ?>
                                        <textarea name="text" class="form-control text" rows="5" placeholder="Layout text">
                                            <?php echo old('text',$layout['text']??''); ?>

                                        </textarea>
                                    <?php endif; ?>


                                    <?php if($errors->has('text')): ?>
                                        <span class="form-text">
                                            <?php echo e($errors->first('text')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <?php
                                $dataTypeText = old('text',$layout['text']??'')
                            ?>
                            <?php if($dataTypeText =='products_category'): ?>
                            <div class="form-group row <?php echo e($errors->has('text') ? ' text-red' : ''); ?>">
                                <label for="text" class="col-sm-2 col-form-label"><?php echo e(trans('store_block.text')); ?></label>
                                <div class="col-sm-8">
                                    <textarea name="products_category" class="form-control text" rows="5" placeholder="Layout text">
                                        <?php echo old('products_category',$layout['products_category']??''); ?>

                                    </textarea>
                                </div>
                            </div>
                            <?php endif; ?>


                            <div class="form-group row  <?php echo e($errors->has('sort') ? ' text-red' : ''); ?>">
                                <label for="sort" class="col-sm-2 col-form-label"><?php echo e(trans('store_block.sort')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="number" style="width: 100px;"  id="sort" name="sort" value="<?php echo old()?old('sort'):$layout['sort']??0; ?>" class="form-control sort" placeholder="" />
                                    </div>
                                        <?php if($errors->has('sort')): ?>
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('sort')); ?>

                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group row ">
                                <label for="status" class="col-sm-2 col-form-label"><?php echo e(trans('store_block.status')); ?></label>
                                <div class="col-sm-8">
                                <input class="checkbox" type="checkbox" name="status"  <?php echo old('status',(empty($layout['status'])?0:1))?'checked':''; ?>>

                                </div>
                            </div>
                    </div>



                    <!-- /.card-body -->

                    <div class="card-footer row">
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



<script type="text/javascript">
$(function () {
    $('[name="type"]').change(function(){
    var type = $(this).val();
    var obj = $('[name="text"]');
    obj.next('.form-text').remove();
    if(type =='html'){
       obj.before('<textarea name="text" class="form-control text" rows="5" placeholder="Layout text"></textarea><span class="form-text"><i class="fa fa-info-circle"></i> <?php echo e(trans('store_block.admin.helper_html')); ?>.</span>');
       obj.remove();
    }else if(type =='view'){
       obj.before('<select name="text" class="form-control text"><?php $__currentLoopData = $listViewBlock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($view); ?>"><?php echo e($view); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select><span class="form-text"><i class="fa fa-info-circle"></i> <?php echo e(trans('store_block.admin.helper_view',['template' => sc_store('template', session('adminStoreId'))])); ?></span>');
       obj.remove();
    }
    });
});
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make($templatePathAdmin.'layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/screen/store_block.blade.php ENDPATH**/ ?>