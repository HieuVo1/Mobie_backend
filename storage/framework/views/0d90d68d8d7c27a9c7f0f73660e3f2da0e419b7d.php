 <?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
    <div class="col-sm-4 float-right-1">
      <div class="page-header float-left float-right-1">
            <div class="page-title">
                <h1><?php echo e(__('messages.attributeset')); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8 float-left-1">
      <div class="page-header float-right float-left-1">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#"><?php echo e(__('messages.product')); ?></a></li>
                    <li class="active"><?php echo e(__('messages.attributeset')); ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">

        <div class="col-12">
            <div class="card">
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

                    <button class="btn btn-primary btn-flat m-b-30 m-t-30" data-toggle="modal" data-target="#addsubcategorymodal"><?php echo e(__('messages.add')); ?> <?php echo e(__('messages.attributeset')); ?></button>

                    <div class="table-responsive dtdiv">
                        <table id="setTable" class="table table-striped table-bordered dttablewidth">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('messages.id')); ?></th>
                                    <th><?php echo e(__('messages.name')); ?></th>
                                    <th><?php echo e(__('messages.action')); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
 
</div>
<div class="modal fade" id="addsubcategorymodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel"><?php echo e(__('messages.attributeset')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(url('admin/addattrset')); ?>" method="post">

                <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1"><?php echo e(__('messages.name')); ?></label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" placeholder="<?php echo e(__('messages.name')); ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('messages.cancel')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('messages.submit')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editset" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel"><?php echo e(__('messages.attributeset')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(url('admin/updateattrset')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id" id="id" />
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1"> <?php echo e(__('messages.name')); ?></label>
                        <input id="edit_set" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" placeholder="<?php echo e(__('messages.name')); ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('messages.cancel')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('messages.update')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\shop\resources\views/admin/product/attributeset.blade.php ENDPATH**/ ?>