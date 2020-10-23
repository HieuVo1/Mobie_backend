 <?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4 float-right-1">
      <div class="page-header float-left float-right-1">
         <div class="page-title">
            <h1><?php echo e(__('messages.add_tax')); ?></h1>
         </div>
      </div>
   </div>
 <div class="col-sm-8 float-left-1">
      <div class="page-header float-right float-left-1">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.add_tax')); ?></li>
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
               <strong class="card-title"><?php echo e(__('messages.add_tax')); ?></strong>
            </div>
            <div class="card-body">
               <form action="<?php echo e(url('admin/storetaxes')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

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
                           <div class="row form-group">
                              <div class="col col-md-3">
                                 <label for="text-input" class=" form-control-label"><?php echo e(__('messages.tax_name')); ?><span class="reqfield">*</span></label>
                              </div>
                              <div class="col-12 col-md-9">
                                 <input type="text" id="tax_class" placeholder="<?php echo e(__('messages.tax_name')); ?>" class="form-control" name="tax_class" required>
                              </div>
                           </div>
                           <div class="row form-group">
                              <div class="col col-md-3">
                                 <label for="text-input" class=" form-control-label"><?php echo e(__('messages.based_on')); ?><span class="reqfield">*</span></label>
                              </div>
                              <div class="col-12 col-md-9">
                                 <select name="based_on" id="based_on" class="form-control">
                                    <option value="1">
                                       <?php echo e(__('messages.billing_address')); ?>

                                    </option>
                                    <option value="2">
                                       <?php echo e(__('messages.shipping_address')); ?>

                                    </option>
                                 </select>
                              </div>
                           </div>
                           <div class="row form-group">
                              <div class="col col-md-3">
                                 <label for="text-input" class=" form-control-label"><?php echo e(__('messages.rate')); ?>(%)<span class="reqfield">*</span></label>
                              </div>
                              <div class="col-12 col-md-9">
                                 <input type="text" id="rate" placeholder="<?php echo e(__('messages.rate')); ?>" class="form-control" name="rate" required>
                              </div>
                           </div>
                           <div>
                              <button class="btn btn-primary florig" type="submit"><?php echo e(__('messages.submit')); ?></button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\UploadingContentV1.0\PHPScript\PHPScript\resources\views/admin/localization/addtaxes.blade.php ENDPATH**/ ?>