 <?php $__env->startSection('content'); ?>

<div class="breadcrumbs">
    <div class="col-sm-4 float-right-1">
      <div class="page-header float-left float-right-1">
            <div class="page-title">
                <h1><?php echo e(__('messages.seasonal_offer')); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8 float-left-1">
      <div class="page-header float-right float-left-1">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li>
                        <a href="<?php echo e(url('admin/sensonal_offer')); ?>">
                         <?php echo e(__('messages.seasonal_offer')); ?>

                        </a>
                    </li>
                    <li class="active">
                        <?php echo e(__('messages.add_sen')); ?>

                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="rowset">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title"><?php echo e(__('messages.add_sen')); ?></strong>
                </div>
                <div class="card-body">
                    <div id="pay-invoice">
                        <div class="card-body">
                            <?php if(Session::has('message')): ?>
                            <div class="col-sm-12">
                                <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <?php endif; ?>
                            <form action="<?php echo e(url('admin/storesensonal')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>


                                <div class="form-group">
                                    <label for="name" class=" form-control-label">
                                        <?php echo e(__('messages.title')); ?>

                                        <span class="reqfield">*</span>
                                    </label>
                                    <input type="text" id="title" placeholder="<?php echo e(__('messages.title')); ?>" class="form-control" name="title" required>
                                </div>
                                <div class="form-group row paddiv">
                                    <div class="col-md-4">
                                        <label for="name" class=" form-control-label ">
                                            <?php echo e(__('messages.cate_gory')); ?>

                                            <span class="reqfield">*</span>
                                        </label>
                                        <select name="category" id="categorydiv" class="form-control" required>
                                            <option value=""><?php echo e(__('messages.select_category')); ?></option>
                                             <option value="0"><?php echo e(__('messages.all')); ?></option>
                                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($ca->id); ?>"><?php echo e($ca->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name" class=" form-control-label">
                                            <?php echo e(__('messages.fixed_from')); ?>

                                            <span class="reqfield">*</span>
                                        </label>
                                        <input type="text" name="fixed_form" id="fixed_form" class="form-control" placeholder="0" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name" class=" form-control-label">
                                            <?php echo e(__('messages.fixed_to')); ?>

                                            <span class="reqfield">*</span>
                                        </label>
                                        <input type="text" name="fixed_to" id="fixed_to" class="form-control" required placeholder="100" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class=" form-control-label">
                                        <?php echo e(__('messages.banner')); ?>

                                        <span class="reqfield">*</span>
                                    </label>
                                    <input type="file" id="banner" class="form-control" name="banner" required>
                                </div>

                                <div>
                                    <button class="btn btn-primary florig" type="submit"> <?php echo e(__('messages.submit')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views/admin/offer/addsensonal.blade.php ENDPATH**/ ?>