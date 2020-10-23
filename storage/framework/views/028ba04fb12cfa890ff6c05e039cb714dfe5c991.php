<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4 float-right-1">
      <div class="page-header float-left float-right-1">
         <div class="page-title">
            <h1><?php echo e(__('messages.role')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8 float-left-1">
      <div class="page-header float-right float-left-1">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"> <?php echo e(__('messages.role')); ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
   <div class="col-12">
      <div class="card">
         <div class="card-body">
            <div class="table-responsive dtdiv">
               <table id="roleTable" class="table table-striped table-bordered dttablewidth">
                  <thead>
                     <tr>
                        <th> <?php echo e(__('messages.id')); ?></th>
                        <th> <?php echo e(__('messages.role')); ?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>2</td>
                        <td> <?php echo e(__('messages.admin')); ?></td>
                     </tr>
                     <tr>
                        <td>1</td>
                        <td> <?php echo e(__('messages.users')); ?></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project\shop\resources\views/admin/user/role.blade.php ENDPATH**/ ?>