<?php $__env->startSection('title'); ?>
<?php echo e(__('messages.helpsupport')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
      .help-tab-box .card-header{
      background: <?= Session::get('site_color') ?>;
   }
</style>
<div class="container">
<div class="help-searchbar">
   <h3><?php echo e(__('messages.helpnote')); ?></h3>
   <form>
      <div class="help-searchbar-part">
         <i class="fa fa-search" aria-hidden="true"></i>
         <input type="text" name="helpsearch" placeholder="Search for topics or questions" id="help-search-bar" onkeypress="return runScript(event)">
      </div>
   </form>
</div>
<div class="myaccount">
   <div class="row">
      <div class="col-md-12 col-lg-4">
         <div class="help-tab">
            <ul class="tabs tabs-2">
               <h1><?php echo e(__('messages.help_topic')); ?></h1>
               <?php $i=0;?>
               <?php $__currentLoopData = $getquestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php if($i==0): ?>
               <li onclick="changehelp('tab-<?php echo e($ge->id); ?>','<?php echo e($i); ?>')" class="tab-link current" style="background: <?= Session::get('site_color') ?> !important" data-tab="tab-<?php echo e($ge->id); ?>" id="<?php echo e($i); ?>">
                  <?php else: ?>
               <li class="tab-link" onclick="changehelp('tab-<?php echo e($ge->id); ?>','<?php echo e($i); ?>')" data-tab="tab-<?php echo e($ge->id); ?>" id="<?php echo e($i); ?>">
                  <?php endif; ?>
                  <?php echo e($ge->topic); ?>

                  <span>
                  <i class="fa fa-chevron-down" aria-hidden="true"></i>
                  </span>
               </li>
               <?php $i++;?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
         </div>
      </div>
      <input type="hidden" id="total-tab" value="<?php echo e($i); ?>" />
      <div class="col-md-12 col-lg-8 side">
         <?php $i=0;?>
         <?php $__currentLoopData = $getquestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php if($i==0): ?>
         <div id="tab-<?php echo e($ge->id); ?>" class="tab-content current account">
            <?php else: ?>
            <div id="tab-<?php echo e($ge->id); ?>" class="tab-content">
               <?php endif; ?>
               <div class="help-tab-box">
                  <div class="help-tab-head">
                     <h2><?php echo e($ge->topic); ?></h2>
                  </div>
                  <div class="accordion indicator-plus-before round-indicator" id="accordionH" aria-multiselectable="true">
                     <div class="card m-b-0">
                        <?php $__currentLoopData = $ge->Question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card-header collapsed" role="tab" id="heading<?php echo e($ge->id.$qu->id); ?>" href="#collapse<?php echo e($ge->id.$qu->id); ?>" data-toggle="collapse" data-parent="#accordion<?php echo e($ge->id.$qu->id); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($ge->id.$qu->id); ?>">
                           <a href="#" class="card-title"><?php echo e($qu->question); ?></a>
                        </div>
                        <div class="collapse" id="collapse<?php echo e($ge->id.$qu->id); ?>" role="tabpanel" aria-labelledby="heading<?php echo e($ge->id.$qu->id); ?>">
                           <div class="card-body">
                              <ul>
                                 <li><?php echo e($qu->answer); ?></li>
                              </ul>
                           </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                  </div>
               </div>
            </div>
            <?php $i++;?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freaktemplate/public_html/ecommerce/resources/views/user/help.blade.php ENDPATH**/ ?>