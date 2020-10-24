 <?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
    <div class="col-sm-4 float-right-1">
      <div class="page-header float-left float-right-1">
            <div class="page-title">
                <h1><?php echo e(__('messages.edit_deals')); ?></h1>
            </div>
        </div>
    </div>
    <<div class="col-sm-8 float-left-1">
      <div class="page-header float-right float-left-1">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><?php echo e(__('messages.edit_deals')); ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="row rowset">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title"><?php echo e(__('messages.edit_deals')); ?></strong>
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
                            <form action="<?php echo e(url('admin/storeofferdata')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group col-md-12 paddiv">
                                    <label for="name" class=" form-control-label">
                                        <?php echo e(__('messages.offers')); ?>

                                        <span class="reqfield">*</span>
                                    </label>
                                    <input type="text" id="title" placeholder="<?php echo e(__('messages.offers')); ?>" class="form-control" name="title" required>
                                </div>
                                <div>
                                    <button class="btn btn-primary florig" type="submit"><?php echo e(__('messages.submit')); ?></button>
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
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views\admin\offer\editdeal.blade.php ENDPATH**/ ?>