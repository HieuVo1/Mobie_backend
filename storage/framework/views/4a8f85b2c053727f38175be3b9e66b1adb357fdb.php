<?php $__env->startSection('content'); ?> 
<div class="breadcrumbs">
   <div class="col-sm-4 float-right-1">
      <div class="page-header float-left float-right-1">
         <div class="page-title">
            <h1><?php echo e(__('messages.edit')); ?> <?php echo e(__('messages.add_sepical_category')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8 float-left-1">
      <div class="page-header float-right float-left-1">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.edit')); ?> <?php echo e(__('messages.add_sepical_category')); ?></li>
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
               <strong class="card-title"><?php echo e(__('messages.edit')); ?> <?php echo e(__('messages.add_sepical_category')); ?></strong>
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
                     <form action="<?php echo e(url('admin/updatesepicalcategory')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id" value="<?php echo e($data->id); ?>" />
                        <input type="hidden" name="real_image" value="<?php echo e($data->image); ?>" />
                        <div class="form-group">
                           <label for="name" class=" form-control-label">
                           <?php echo e(__('messages.title')); ?> 
                           <span class="reqfield">*</span>
                           </label>
                           <input type="text" id="title" placeholder="<?php echo e(__('messages.title')); ?> " class="form-control" name="title" required value="<?php echo e($data->title); ?>">
                        </div>
                        <div class="form-group">
                           <label for="name" class=" form-control-label">
                           <?php echo e(__('messages.description')); ?> 
                           <span class="reqfield">*</span>
                           </label>
                           <textarea class="form-control" name="description" id="description" placeholder="<?php echo e(__('messages.description')); ?>" required><?php echo e($data->description); ?></textarea>
                        </div>
                        <div class="form-group col-md-12 paddiv">
                           <label for="name" class=" form-control-label">
                           <?php echo e(__('messages.cate_gory')); ?>

                           <span class="reqfield">*</span>
                           </label>
                           <select name="category" id="categorylh" class="form-control" required >
                              <option value=""><?php echo e(__('messages.select_category')); ?></option>
                              <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($ca->id); ?>" <?=$data->category_id ==$ca->id ? ' selected="selected"' : '';?>><?php echo e($ca->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="name" class=" form-control-label">
                           <?php echo e(__('messages.image')); ?>(542X370)
                           </label>
                           <img src="<?php echo e(asset('public/upload/category/image').'/'.$data->image); ?>" class="imgsize1" />
                           <input type="file" id="image" class="form-control" name="image" >
                        </div>
                        <div>
                           <button class="btn btn-primary florig" type="submit"><?php echo e(__('messages.update')); ?></button>
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
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views\admin\sepical\edit.blade.php ENDPATH**/ ?>