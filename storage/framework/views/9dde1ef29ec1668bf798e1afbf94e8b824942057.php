<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4 float-right-1">
      <div class="page-header float-left float-right-1">
         <div class="page-title">
            <h1><?php echo e(__('messages.quesans')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8 float-left-1">
      <div class="page-header float-right float-left-1">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <?php if($support==1): ?>
               <li><a href="<?php echo e(url('admin/support/1')); ?>"><?php echo e(__('messages.helpsupport')); ?></a></li>
               <?php endif; ?>
               <?php if($support==2): ?>
               <li><a href="<?php echo e(url('admin/support/2')); ?>"><?php echo e(__('messages.termscon')); ?></a></li>
               <?php endif; ?>
               <li class="active"><?php echo e(__('messages.quesans')); ?></li>
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
               <button  data-toggle="modal" data-target="#adduser" class="btn btn-primary btn-flat m-b-30 m-t-30" ><?php echo e(__('messages.add')); ?> <?php echo e(__('messages.quesans')); ?></button>
               <div class="table-responsive dtdiv">
                  <table id="quesdatatable" class="table table-striped table-bordered dttablewidth">
                     <thead>
                        <tr>
                           <th><?php echo e(__('messages.id')); ?></th>
                           <th><?php echo e(__('messages.ques')); ?></th>
                           <th><?php echo e(__('messages.ans')); ?></th>
                           <th><?php echo e(__('messages.action')); ?></th>
                        </tr>
                     </thead>
                  </table>
               </div>
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
         <form action="<?php echo e(url('admin/addquesans')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="support_id" id="support_id" value="<?php echo e($support); ?>"/>
            <input type="hidden" name="topic_id" id="topic_id" value="<?php echo e($topic); ?>"/>
            <div class="modal-body">
               <div class="form-group col-md-12 paddiv">
                  <label for="cc-payment" class="control-label mb-1"><?php echo e(__('messages.ques')); ?>

                  <span class="reqfield">*</span>
                  </label>
                  <textarea id="ques" name="ques" class="form-control h150" required  placeholder="<?php echo e(__('messages.ques')); ?>"></textarea>
               </div>
               <div class="form-group col-md-12 paddiv">
                  <label for="cc-payment" class="control-label mb-1"><?php echo e(__('messages.ans')); ?>

                  <span class="reqfield">*</span>
                  </label>
                  <textarea id="ans" name="ans"  class="form-control h150" required  placeholder="<?php echo e(__('messages.ans')); ?>"></textarea>
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
<div class="modal fade" id="editques" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
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
         <form action="<?php echo e(url('admin/updatequestion')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="id" id="edit_id" />
            <div class="modal-body">
               <div class="form-group col-md-12 paddiv">
                  <label for="cc-payment" class="control-label mb-1"><?php echo e(__('messages.ques')); ?>

                  <span class="reqfield">*</span>
                  </label>
                  <textarea id="edit_ques" name="ques" class="form-control h150" required  placeholder="<?php echo e(__('messages.ques')); ?>"></textarea>
               </div>
               <div class="form-group col-md-12 paddiv">
                  <label for="cc-payment" class="control-label mb-1"><?php echo e(__('messages.ans')); ?>

                  <span class="reqfield">*</span>
                  </label>
                  <textarea id="edit_ans" name="ans"  class="form-control h150" required  placeholder="<?php echo e(__('messages.ans')); ?>"></textarea>
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
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views\admin\support\question.blade.php ENDPATH**/ ?>