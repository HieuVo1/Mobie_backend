<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
         	<?php if($id==1): ?>
            <h1><?php echo e(__('messages.Android Server Key')); ?></h1>
            <?php endif; ?>
            <?php if($id==2): ?>
            <h1><?php echo e(__('messages.Iphone Server Key')); ?></h1>
            <?php endif; ?>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
            	<?php if($id==1): ?>
		            <li class="active"><?php echo e(__('messages.Android Server Key')); ?></li>
		        <?php endif; ?>
		        <?php if($id==2): ?>
		            <li class="active"><?php echo e(__('messages.Iphone Server Key')); ?></li>
		        <?php endif; ?>             
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
   <div class="rowset">
      <div class="col-md-9">
         <div class="card">
            <div class="card-header">
            	<?php if($id==1): ?>
		            <strong class="card-title"><?php echo e(__('messages.Android Server Key')); ?></strong>
		        <?php endif; ?>
		        <?php if($id==2): ?>
		            <strong class="card-title"><?php echo e(__('messages.Iphone Server Key')); ?></strong>
		        <?php endif; ?> 
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
                     <form action="<?php echo e(url('admin/updatekey')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                       
                        <input type="hidden" id="id" name="id" value="<?php echo e($id); ?>">
                        <div class="form-group">
                           <label for="name" class=" form-control-label">
                             <?php if($id==1): ?>
					                 <?php echo e(__('messages.Android Server Key')); ?>

      					        <?php endif; ?>
      					        <?php if($id==2): ?>
      					            <?php echo e(__('messages.Iphone Server Key')); ?>

      					        <?php endif; ?> 
                           <span class="reqfield">*</span>
                           </label>
                           <textarea class="form-control" name="serverkey" id="serverkey" placeholder="" required=""><?php echo e($serverkey); ?></textarea>
                        </div>
                        <div>
                           <button class="btn btn-primary florig" type="submit"> <?php echo e(__('messages.update')); ?></button>
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
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views/admin/setting/serverkey.blade.php ENDPATH**/ ?>