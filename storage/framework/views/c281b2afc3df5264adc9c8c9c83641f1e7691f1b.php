
<?php $__env->startSection('title'); ?>
<?php echo e(__('messages.termscon')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
   <div class="tc-main-box">
      <div class="tc-main-head">
         <h2><?php echo e(__('messages.termscon')); ?></h2>
         <p><?php echo e(__('messages.home')); ?> / <?php echo e(__('messages.termscon')); ?></p>
      </div>
      <?php $i=1;?>
      <?php $__currentLoopData = $getquestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="tc-topic-box">
         <div class="tc-main-topic">
            <h3><?php echo e($i); ?>. <?php echo e($ge->topic); ?></h3>
         </div>
         <?php $k=1;?>
         <?php $__currentLoopData = $ge->Question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="tc-sub-topic">
            <h4><?php echo e($i); ?>.<?php echo e($k); ?> &nbsp <?php echo e($gq->question); ?></h4>
            <p><?php echo e($gq->answer); ?></p>
         </div>
         <?php $k++;?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
      </div>
      <?php $i++;?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freaktemplate/public_html/ecommerce/resources/views/user/terms.blade.php ENDPATH**/ ?>