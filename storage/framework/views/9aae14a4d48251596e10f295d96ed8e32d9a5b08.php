 <?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
    <div class="col-sm-4 float-right-1">
      <div class="page-header float-left float-right-1">
            <div class="page-title">
                <h1><?php echo e(__('messages.feature_product')); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8 float-left-1">
      <div class="page-header float-right float-left-1">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><?php echo e(__('messages.feature_product')); ?></li>
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
                    <div class="row mrg30">
                        <form action="<?php echo e(url('admin/addfeatureproduct')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="col-md-6 col-sm-6 col-12 float-right-1">
                                <select class="form-control" name="product_id" id="product_id" required>
                                    <option value=""><?php echo e(__('messages.select_product')); ?></option>
                                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($pro->id); ?>"><?php echo e($pro->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <button type="submit" name="btnsubmit" class="btn btn-primary fea"><?php echo e(__('messages.add_fetureproduct')); ?></button>
                            </div>
                        </form>
                    </div>
                    <div id="tableview">
                        <div class="table-responsive dtdiv">
                            <table id="featuretable" class="table table-striped table-bordered dttablewidth">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('messages.id')); ?></th>
                                        <th><?php echo e(__('messages.image')); ?></th>
                                        <th><?php echo e(__('messages.product')); ?></th>
                                        <th><?php echo e(__('messages.action')); ?></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project\shop\resources\views/admin/feature/default.blade.php ENDPATH**/ ?>