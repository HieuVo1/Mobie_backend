<?php $__env->startSection('title'); ?>
<?php echo e(__('messages.about')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
   <div class="about-heading">
      <h2><?php echo e(__('messages.about')); ?></h2>
      <p><?php echo e(__('messages.a1')); ?></p>
   </div>
   <div class="about-history-1">
      <div class="row">
         <div class="col-lg-8 col-md-8">
            <div class="about-history">
               <h2 style="color: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.this_history')); ?></h2>
            </div>
            <div class="about-content-1">
               <p><?php echo e(__('messages.the')); ?> <span style="color: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.history_of_web')); ?></span><?php echo e(__('messages.a2')); ?></p>
            </div>
            <div class="about-content-1">
               <p><?php echo e(__('messages.a3')); ?></p>
            </div>
         </div>
         <div class="col-lg-4 col-md-4">
            <img src="<?php echo e(asset('public/Ecommerce/images/bag-about.png')); ?>" class="about-image-1">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-4 col-md-4">
         <img src="<?php echo e(asset('public/Ecommerce/images/download.jpg')); ?>" width="100%">
      </div>
      <div class="col-lg-8 col-md-8">
         <div class="about-content-1">
             <p><?php echo e(__('messages.the')); ?> <span style="color: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.history_of_web')); ?></span><?php echo e(__('messages.a2')); ?></p>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freaktemplate/public_html/ecommerce/resources/views/user/aboutus.blade.php ENDPATH**/ ?>