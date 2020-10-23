<?php $__env->startSection('title'); ?>
<?php echo e(__('messages.My_WishList')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<div class="container">
   <div class="cart-heading wish">
      <h1><?php echo e(__('messages.My_WishList')); ?></h1>
      <span><a href="<?php echo e(url('/')); ?>" style="color: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.home')); ?></a> / <?php echo e(__('messages.My_WishList')); ?></span>
   </div>
   <div class="cart-detail">
      <table id="mywish">
         <tr class="pro-heading" style="background: <?= Session::get('site_color') ?> !important">
            <th><?php echo e(__('messages.del')); ?></th>
            <th><?php echo e(__('messages.images')); ?></th>
            <th><?php echo e(__('messages.product')); ?></th>
            <th><?php echo e(__('messages.stock_status')); ?></th>
            <th><?php echo e(__('messages.price')); ?></th>
            <th></th>
         </tr>
           <?php if(count($mywish)!=0): ?>
            <?php $__currentLoopData = $mywish; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td class="Delete-icon">
               <a href="javascript:;" onclick="deletewish('<?php echo e($mw->product_id); ?>')"><i class="fa fa-trash-o" aria-hidden="true"></i>  </a>
               <span><?php echo e(__('messages.del')); ?> :</span>
            </td>
            <td class="cart-img">
               <img src="<?php echo e(asset('public/upload/product').'/'.$mw->productdata->basic_image); ?>">
               <span><?php echo e(__('messages.images')); ?> :</span>
            </td>
            <td class="place-text">
               <div class="text-a">
                  <span><?php echo e(__('messages.product')); ?> :</span>
                  <h1><?php echo e($mw->productdata->name); ?></h1>
               </div>
            </td>
            <td class="Stock-text">
               <?php if($mw->productdata->stock=='0'): ?>
               <?php echo e(__("messages.outstock")); ?>

               <?php endif; ?>
               <?php if($mw->productdata->stock=='1'): ?>
               <?php echo e(__("messages.in_stock")); ?>

               <?php endif; ?>
               <span><?php echo e(__('messages.stock_status')); ?> :</span>
            </td>
            <td class="price">
               <?php echo e(Session::get('currency')); ?> <?php echo e($mw->productdata->price); ?>

               <span><?php echo e(__('messages.price')); ?> :</span>
            </td>
            <td class="add">
               <a onclick="addwishtocart('<?php echo e($mw->product_id); ?>','<?php echo e($mw->productdata->name); ?>','1','<?php echo e($mw->productdata->price); ?>')" style="border-color: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.add_to_cart')); ?></a>
            </td>
         </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php else: ?>
            <tr>
                <td colspan="6" class="emptywish"><?php echo e(__('messages.Your wishlist is currently empty!')); ?></td>
            </tr>
         <?php endif; ?>
        
      </table>
      <div class="continue">
         <a href="<?php echo e(url('/')); ?>" style="color: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.continue_shopping')); ?>

         <i class="fa fa-long-arrow-right" aria-hidden="true" style="color: <?= Session::get('site_color') ?> !important"></i>
         </a>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freaktemplate/public_html/ecommerce/resources/views/user/account/wishlist.blade.php ENDPATH**/ ?>