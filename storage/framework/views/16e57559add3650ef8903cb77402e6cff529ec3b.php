<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4 float-right-1">
      <div class="page-header float-left float-right-1">
         <div class="page-title">
            <?php if($page_id==1): ?>
            <h1><?php echo e(__('messages.helpsupport')); ?></h1>
            <?php endif; ?>
            <?php if($page_id==2): ?>
            <h1><?php echo e(__('messages.termscon')); ?></h1>
            <?php endif; ?>
         </div>
      </div>
   </div>
   <div class="col-sm-8 float-left-1">
      <div class="page-header float-right float-left-1">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <?php if($page_id==1): ?>
               <li class="active"><?php echo e(__('messages.helpsupport')); ?></li>
               <?php endif; ?>
               <?php if($page_id==2): ?>
               <li class="active"><?php echo e(__('messages.termscon')); ?></li>
               <?php endif; ?>
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
            <button  data-toggle="modal" data-target="#adduser" class="btn btn-primary btn-flat m-b-30 m-t-30" ><?php echo e(__('messages.add')); ?> <?php echo e(__('messages.topic')); ?></button>
            <div class="table-responsive dtdiv">
               <table id="QuestionTable" class="table table-striped table-bordered dttablewidth">
                  <thead>
                     <tr>
                        <th><?php echo e(__('messages.id')); ?></th>
                        <th><?php echo e(__('messages.topic')); ?></th>
                        <th><?php echo e(__('messages.action')); ?></th>
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
</div>
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
   <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="smallmodalLabel"><?php echo e(__('messages.add')); ?> <?php echo e(__('messages.topic')); ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?php echo e(url('admin/addsupporttopic')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="page_id" id="page_id" value="<?php echo e($page_id); ?>"/>
            <div class="modal-body">
               <div class="form-group col-md-12 paddiv" >
                  <label for="cc-payment" class="control-label mb-1"><?php echo e(__('messages.topicname')); ?><span class="reqfield">*</span></label>
                  <input id="topicname" name="topicname" type="text" class="form-control" required  placeholder="<?php echo e(__('messages.topicname')); ?>">
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
<div class="modal fade" id="editsupport" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
   <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="smallmodalLabel">
               <?php echo e(__('messages.edit')); ?> <?php echo e(__('messages.topic')); ?>

            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?php echo e(url('admin/updatetopic')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="id" id="edit_id" />
            <div class="modal-body">
               <div class="form-group col-md-12 paddiv">
                  <label for="cc-payment" class="control-label mb-1"><?php echo e(__('messages.topicname')); ?><span class="reqfield">*</span></label>
                  <input id="edit_topicname" name="topicname" type="text" class="form-control" required  placeholder="<?php echo e(__('messages.topicname')); ?>">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views\admin\support\help.blade.php ENDPATH**/ ?>