<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1><?php echo e(__('messages.edit_profile')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.edit_profile')); ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
   <div class="row rowset">
      <div class="col-lg-6">
         <div class="card">
            <div class="card-header">
               <strong class="card-title"><?php echo e(__('messages.edit_profile')); ?></strong>
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
                     <form action="<?php echo e(url('admin/updateprofile')); ?>" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                           <label for="name" class=" form-control-label">
                           <?php echo e(__('messages.first_name')); ?>

                           <span class="florig">*</span>
                           </label>
                           <input type="text" id="name" placeholder="<?php echo e(__('messages.first_name')); ?>" class="form-control" name="name" value="<?php echo e($data->first_name); ?>">
                        </div>
                        <div class="form-group">
                           <label for="lname" class=" form-control-label">
                           <?php echo e(__('messages.last_name')); ?>

                           <span class="florig">*</span>
                           </label>
                           <input type="text" id="lname" name="lname" placeholder="<?php echo e(__('messages.last_name')); ?>" class="form-control" value="<?php echo e($data->last_name); ?>">
                        </div>
                        <div class="form-group">
                           <label for="email" class=" form-control-label">
                           <?php echo e(__('messages.email')); ?>

                           </label>
                           <input type="text" readonly id="email" name="email" placeholder="<?php echo e(__('messages.email')); ?>" class="form-control" value="<?php echo e($data->email); ?>">
                        </div>
                        <div class="form-group">
                           <label for="file" class=" form-control-label">  
                           <?php echo e(__('messages.profile_picture')); ?>

                           </label>
                           <img src="<?php echo e(asset('upload/profile/'.'/'.$data->profile_pic)); ?>" class="imgsize1" />
                           <div>
                              <input type="file" id="file" name="file" class="form-control-file">
                           </div>
                        </div>
                        <div>
                           <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                           <?php echo e(__('messages.update')); ?>

                           </button>
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
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views\admin\updateprofile.blade.php ENDPATH**/ ?>