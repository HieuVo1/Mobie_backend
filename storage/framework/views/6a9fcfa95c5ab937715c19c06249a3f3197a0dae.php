<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1><?php echo e(__('messages.change_pwd')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.change_pwd')); ?></li>
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
               <strong class="card-title"><?php echo e(__('messages.change_pwd')); ?></strong>
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
                     <form action="<?php echo e(url('admin/updatepassword')); ?>" method="post"  novalidate="novalidate" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>                                           
                        <div class="form-group">
                           <label for="name" class=" form-control-label">
                           <?php echo e(__('messages.ent_current_pwd')); ?>

                           <span class="reqfield">*</span>
                           </label>
                           <input type="password" id="cpwd" placeholder="<?php echo e(__('messages.ent_current_pwd')); ?>" class="form-control" name="cpwd" required="" onchange="checkcurrentpwd(this.value)">
                        </div>
                        <div class="form-group">
                           <label for="name" class=" form-control-label">
                           <?php echo e(__('messages.ent_new_pwd')); ?>

                           <span class="reqfield">*</span>
                           </label>
                           <input type="password" id="npwd" placeholder="<?php echo e(__('messages.ent_new_pwd')); ?>" class="form-control" name="npwd" required="" >
                        </div>
                        <div class="form-group">
                           <label for="name" class=" form-control-label">
                           <?php echo e(__('messages.re_enter_pwd_en')); ?>

                           <span class="reqfield">*</span>
                           </label>
                           <input type="password" id="rpwd" placeholder="<?php echo e(__('messages.re_enter_pwd_en')); ?>" class="form-control" name="rpwd" onchange="changecheckboth(this.value)" required="">
                        </div>
                        <div class="form-group">
                           
                            <?php if(Session::get("is_demo")=='1'): ?>
                                 <button type="button" onclick="return alert('This function is currently disable as it is only a demo website, in your admin it will work perfect')" class="btn btn-lg btn-info btn-block">
                                    <?php echo e(__('messages.update')); ?>

                                </button>
                                <?php else: ?>
                                  <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                           <?php echo e(__('messages.update')); ?>

                           </button>
                                <?php endif; ?>
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
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views/admin/changepassword.blade.php ENDPATH**/ ?>