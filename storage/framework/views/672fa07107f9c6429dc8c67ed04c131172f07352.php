<?php $__env->startSection('main'); ?>
    <div class="col-md-12">
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
                                <a href="<?php echo e(sc_route_admin('admin_currency.index')); ?>" class="btn  btn-flat btn-default"
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

                                <div class="form-group row  <?php echo e($errors->has('name') ? ' text-red' : ''); ?>">
                                    <label for="name"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('currency.name')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <input type="text" id="name" name="name"
                                                   value="<?php echo old()?old('name'):$currency['name']??''; ?>"
                                                   class="form-control" placeholder=""/>
                                        </div>
                                        <?php if($errors->has('name')): ?>
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('name')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row  <?php echo e($errors->has('code') ? ' text-red' : ''); ?>">
                                    <label for="code"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('currency.code')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <?php if(!empty($currency['code']) && in_array($currency['code'], ['VND','USD'])): ?>
                                                <input type="hidden" id="code" name="code"
                                                       value="<?php echo $currency['code']; ?>" placeholder=""/>
                                                <input type="text" disabled="disabled" value="<?php echo $currency['code']; ?>"
                                                       class="form-control" placeholder=""/>
                                            <?php else: ?>
                                                <input type="text" id="code" name="code"
                                                       value="<?php echo old()?old('code'):$currency['code']??''; ?>"
                                                       class="form-control" placeholder=""/>
                                            <?php endif; ?>

                                        </div>
                                        <?php if($errors->has('code')): ?>
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('code')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="form-group row  <?php echo e($errors->has('symbol') ? ' text-red' : ''); ?>">
                                    <label for="symbol"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('currency.symbol')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <input type="text" id="symbol" name="symbol"
                                                   value="<?php echo old()?old('symbol'):$currency['symbol']??''; ?>"
                                                   class="form-control" placeholder=""/>
                                        </div>
                                        <?php if($errors->has('symbol')): ?>
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('symbol')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row  <?php echo e($errors->has('exchange_rate') ? ' text-red' : ''); ?>">
                                    <label for="exchange_rate"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('currency.exchange_rate')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <input type="number" step="0.01" id="exchange_rate" name="exchange_rate"
                                                   value="<?php echo old()?old('exchange_rate'):$currency['exchange_rate']??1; ?>"
                                                   class="form-control" placeholder=""/>
                                        </div>
                                        <?php if($errors->has('exchange_rate')): ?>
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('exchange_rate')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row  <?php echo e($errors->has('precision') ? ' text-red' : ''); ?>">
                                    <label for="precision"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('currency.precision')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <input type="number" id="precision" name="precision" type=""
                                                   value="<?php echo old()?old('precision'):$currency['precision']??0; ?>"
                                                   class="form-control" placeholder="" min=0/>
                                        </div>
                                        <?php if($errors->has('precision')): ?>
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('precision')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row <?php echo e($errors->has('symbol_first') ? ' text-red' : ''); ?>">
                                    <label for="symbol_first"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('currency.symbol_first')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary1" name="symbol_first"
                                                   value="1" <?php echo (old('symbol_first',$currency['symbol_first']??1) =='1')?'checked':''; ?>>
                                            <label for="radioPrimary1">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary0" name="symbol_first"
                                                   value="0" <?php echo (old('symbol_first',$currency['symbol_first']??0) =='0')?'checked':''; ?>>
                                            <label for="radioPrimary0">
                                                No
                                            </label>
                                        </div>
                                        <?php if($errors->has('symbol_first')): ?>
                                            <span class="form-text">
                                            <i class="fa fa-info-circle"></i> <?php echo e($errors->first('symbol_first')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="form-group row  <?php echo e($errors->has('thousands') ? ' text-red' : ''); ?>">
                                    <label for="thousands"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('currency.thousands')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <input type="text" id="thousands" name="thousands" type="text"
                                                   value="<?php echo old('thousands',$currency['thousands']??','); ?>"
                                                   class="form-control" placeholder=""/>
                                        </div>
                                        <?php if($errors->has('thousands')): ?>
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('thousands')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row  <?php echo e($errors->has('sort') ? ' text-red' : ''); ?>">
                                    <label for="sort"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('currency.sort')); ?></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <input type="number" style="width: 100px;" min=0 id="sort" name="sort"
                                                   value="<?php echo old('sort',$currency['sort']??0); ?>"
                                                   class="form-control sort" placeholder=""/>
                                        </div>
                                        <?php if($errors->has('sort')): ?>
                                            <span class="form-text">
                                                <i class="fa fa-info-circle"></i> <?php echo e($errors->first('sort')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="status"
                                           class="col-sm-2 col-form-label"><?php echo e(trans('currency.status')); ?></label>
                                    <div class="col-sm-8">
                                        <input class="checkbox" type="checkbox"
                                               name="status" <?php echo old('status',(empty($currency['status'])?0:1))?'checked':''; ?>>

                                    </div>
                                </div>

                                <!-- /.card-body -->


                                <div class="card-footer row" id="card-footer">
                                    <?php echo csrf_field(); ?>
                                    <div class="col-md-2">
                                    </div>

                                    <div class="col-md-8">
                                        <div class="btn-group float-right">
                                            <button type="submit"
                                                    class="btn btn-primary"><?php echo e(trans('admin.submit')); ?></button>
                                        </div>

                                        <div class="btn-group float-left">
                                            <button type="reset"
                                                    class="btn btn-warning"><?php echo e(trans('admin.reset')); ?></button>
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

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make($templatePathAdmin.'layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/admin/screen/currency.blade.php ENDPATH**/ ?>