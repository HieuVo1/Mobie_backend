 <?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4 float-right-1">
      <div class="page-header float-left float-right-1">
         <div class="page-title">
            <h1><?php echo e(__('messages.taxes')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8 float-left-1">
      <div class="page-header float-right float-left-1">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.taxes')); ?></li>
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
            <button onclick="addtax()" class="btn btn-primary btn-flat m-b-30 m-t-30"><?php echo e(__('messages.add_tax')); ?></button>
            <div class="table-responsive dtdiv">
               <table id="taxTable" class="table table-striped table-bordered dttablewidth">
                  <thead>
                     <tr>
                        <th><?php echo e(__('messages.id')); ?></th>
                        <th><?php echo e(__('messages.tax_name')); ?></th>
                        <th><?php echo e(__('messages.based_on')); ?></th>
                        <th><?php echo e(__('messages.rate')); ?>(%)</th>
                        <th><?php echo e(__('messages.action')); ?></th>
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views/admin/localization/taxes_default.blade.php ENDPATH**/ ?>