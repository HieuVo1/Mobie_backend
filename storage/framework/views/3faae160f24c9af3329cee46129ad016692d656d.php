 <?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1><?php echo e(__('messages.EditTax')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.EditTax')); ?></li>
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
      <strong class="card-title"><?php echo e(__('messages.EditTax')); ?></strong>
   </div>
   <div class="card-body">
      <div class="cmr1">
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
               <form action="<?php echo e(url('admin/updatetaxdata')); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" id="id" value="<?php echo e($taxes_data->id); ?>" /> <?php echo e(csrf_field()); ?>

                  <div class="row form-group">
                     <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label"><?php echo e(__('messages.tax_name')); ?><span class="reqfield">*</span></label>
                     </div>
                     <div class="col-12 col-md-9">
                        <input type="text" id="tax_class" placeholder="<?php echo e(__('messages.tax_name')); ?>" class="form-control" name="tax_class" value="<?php echo e($taxes_data->tax_name); ?>" required>
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label"><?php echo e(__('messages.based_on')); ?><span class="reqfield">*</span></label>
                     </div>
                     <div class="col-12 col-md-9">
                        <select name="based_on" id="based_on" class="form-control">
                           <option value="1" <?=$taxes_data->base_on ==1 ? ' selected="selected"' : '';?>><?php echo e(__('messages.billing_address')); ?></option>
                           <option value="2" <?=$taxes_data->base_on ==2 ? ' selected="selected"' : '';?>><?php echo e(__('messages.shipping_address')); ?></option>
                        </select>
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label"><?php echo e(__('messages.rate')); ?>(%)<span class="reqfield">*</span></label>
                     </div>
                     <div class="col-12 col-md-9">
                        <input type="text" id="rate" placeholder="<?php echo e(__('messages.rate')); ?>" class="form-control" name="rate" value="<?php echo e($taxes_data->rate); ?>" required>
                     </div>
                  </div>
                  <div>
                     <button class="btn btn-primary florig" type="submit" ><?php echo e(__('messages.update')); ?></button>
                  </div>
            </div>
         </div>
        </form>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views/admin/localization/edittax.blade.php ENDPATH**/ ?>