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
                            <a href="<?php echo e(sc_route_admin('admin_banner.index')); ?>" class="btn  btn-flat btn-default"
                               title="List"><i class="fa fa-list"></i><span
                                        class="hidden-xs"> <?php echo e(trans('admin.back_list')); ?></span></a>

                        </div>
                    </div>
                </div>


                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo e($url_action); ?>" method="post" accept-charset="UTF-8" class="form-horizontal"
                      id="form-main" enctype="multipart/form-data">


                    <div class="card-body">
                        <div class="fields-group">

                            <div class="form-group  row <?php echo e($errors->has('image') ? ' text-red' : ''); ?>">
                                <label for="image" class="col-sm-2 col-form-label"><?php echo e(trans('banner.image')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" id="image" name="image"
                                               value="<?php echo e(old('image',$banner['image']??'')); ?>"
                                               class="form-control image" placeholder=""/>
                                        <div class="input-group-append">
                                            <a data-input="image" data-preview="preview_image" data-type="banner"
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
                                        <?php if(old('image',$banner['image']??'')): ?>
                                            <img src="<?php echo e(sc_file(old('image',$banner['image']??''))); ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group  row <?php echo e($errors->has('url') ? ' text-red' : ''); ?>">
                                <label for="url" class="col-sm-2 col-form-label"><?php echo e(trans('banner.url')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                        </div>
                                        <input type="text" id="url" name="url"
                                               value="<?php echo e(old()?old('url'):$banner['url']??''); ?>" class="form-control"
                                               placeholder=""/>
                                    </div>
                                    <?php if($errors->has('url')): ?>
                                        <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('url')); ?>

                                            </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group  row <?php echo e($errors->has('title') ? ' text-red' : ''); ?>">
                                <label for="title" class="col-sm-2 col-form-label"><?php echo e(trans('banner.title')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                        </div>
                                        <input type="text" id="title" name="title"
                                               value="<?php echo e(old()?old('title'):$banner['title']??''); ?>"
                                               class="form-control" placeholder=""/>
                                    </div>
                                    <?php if($errors->has('title')): ?>
                                        <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('title')); ?>

                                            </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group row <?php echo e($errors->has('target') ? ' text-red' : ''); ?>">
                                <label for="target"
                                       class="col-sm-2 col-form-label"><?php echo e(trans('banner.admin.select_target')); ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control target select2" style="width: 100%;" name="target">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $arrTarget; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>" <?php echo e((old('target',$banner['target']??'') ==$k) ? 'selected':''); ?>><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('target')): ?>
                                        <span class="form-text">
                                                    <i class="fa fa-info-circle"></i> <?php echo e($errors->first('target')); ?>

                                                </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row <?php echo e($errors->has('html') ? ' text-red' : ''); ?>">
                                <label for="html"
                                       class="col-sm-2 col-form-label"><?php echo e(trans('email_template.html')); ?></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="10" id="html"
                                              name="html"><?php echo e(old('html',$banner['html']??'')); ?></textarea>
                                    <?php if($errors->has('html')): ?>
                                        <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('html')); ?>

                                            </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php if(!empty($dataType)): ?>
                                <div class="form-group row <?php echo e($errors->has('type') ? ' text-red' : ''); ?>">
                                    <label class="col-sm-2 col-form-label"><?php echo e(trans('banner.type')); ?></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="type">
                                            <?php $__currentLoopData = $dataType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e((old('type', $banner['type']??'') ==  $key)?'selected':''); ?> value="<?php echo e($key); ?>"><?php echo e($name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('type')): ?>
                                            <span class="form-text">
                                    <?php echo e($errors->first('type')); ?>

                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>


                            <div class="form-group  row <?php echo e($errors->has('sort') ? ' text-red' : ''); ?>">
                                <label for="sort" class="col-sm-2 col-form-label"><?php echo e(trans('banner.sort')); ?></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="number" style="width: 100px;" min=0 id="sort" name="sort"
                                               value="<?php echo e(old()?old('sort'):$banner['sort']??0); ?>"
                                               class="form-control sort" placeholder=""/>
                                    </div>
                                    <?php if($errors->has('sort')): ?>
                                        <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('sort')); ?>

                                            </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="status" class="col-sm-2 col-form-label"><?php echo e(trans('banner.status')); ?></label>
                                <div class="col-sm-8">
                                    <input class="checkbox" type="checkbox"
                                           name="status" <?php echo e(old('status',(empty($banner['status'])?0:1))?'checked':''); ?>>
                                </div>
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer row">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-2">
                                </div>

                                <div class="col-md-8">
                                    <div class="btn-group float-right">
                                        <button type="submit"
                                                class="btn btn-primary"><?php echo e(trans('admin.submit')); ?></button>
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
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(sc_file('admin/plugin/mirror/doc/docs.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(sc_file('admin/plugin/mirror/lib/codemirror.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(sc_file('admin/plugin/mirror/lib/codemirror.js')); ?>"></script>
    <script src="<?php echo e(sc_file('admin/plugin/mirror/mode/javascript/javascript.js')); ?>"></script>
    <script src="<?php echo e(sc_file('admin/plugin/mirror/mode/css/css.js')); ?>"></script>
    <script src="<?php echo e(sc_file('admin/plugin/mirror/mode/htmlmixed/htmlmixed.js')); ?>"></script>
    <script>
        window.onload = function () {
            editor = CodeMirror(document.getElementById("html"), {
                mode: "text/html",
                value: document.documentElement.innerHTML
            });
        };
        var myModeSpec = {
            name: "htmlmixed",
            tags: {
                style: [["type", /^text\/(x-)?scss$/, "text/x-scss"],
                    [null, null, "css"]],
                custom: [[null, null, "customMode"]]
            }
        }
        var editor = CodeMirror.fromTextArea(document.getElementById("html"), {
            lineNumbers: true,
            styleActiveLine: true,
            matchBrackets: true
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make($templatePathAdmin.'layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/screen/banner.blade.php ENDPATH**/ ?>