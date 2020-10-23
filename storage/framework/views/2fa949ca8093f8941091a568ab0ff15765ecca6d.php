<?php $__env->startSection('title'); ?>
<?php echo e(__('messages.My_Cart')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
   <div class="cart-heading">
      <h1><?php echo e(__('messages.My_Cart')); ?></h1>
      <span><?php echo e(__('messages.home')); ?> / <?php echo e(__('messages.My_Cart')); ?></span>
   </div>
   <div class="cart-detail">
      <table id="mycart">
         <tr class="pro-heading" style="background: <?= Session::get('site_color') ?> !important">
            <th><?php echo e(__('messages.del')); ?></th>
            <th><?php echo e(__('messages.images')); ?></th>
            <th><?php echo e(__('messages.product')); ?></th>
            <th><?php echo e(__('messages.price')); ?></th>
            <th><?php echo e(__('messages.Quanitity')); ?></th>
            <th><?php echo e(__('messages.total')); ?></th>
         </tr>
         <?php $cartCollection = Cart::getContent();$i=0;?>
         <?php if($cartCollection->count()!=0): ?>
         <?php $__currentLoopData = $cartCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td class="Delete-icon">
               <a href="javascript:deletecartitem('<?php echo e($item->id); ?>')"><i class="fa fa-trash-o" aria-hidden="true"></i>   
               <span><?php echo e(__('messages.del')); ?> :</span></a>
            </td>
            <td class="cart-img">
               <?php $__currentLoopData = $productdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php if($hs->id==$item->id): ?>
               <img src="<?php echo e(asset('public/upload/product').'/'.$hs->basic_image); ?>" width="75" height="auto">
               <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <span><?php echo e(__('messages.images')); ?> :</span>
            </td>
            <td class="cartpro-text">
               <span><?php echo e(__('messages.product')); ?> :</span>
               <?php echo e($item->name); ?>

            </td>
            <td class="price">
               <p><?php echo e(Session::get('currency')); ?></p>
               <circle id="pricecart<?php echo e($i); ?>"><?php echo e(number_format((float)$item->price, 2, '.', '')); ?></circle>
               <span><?php echo e(__('messages.price')); ?> :</span>
            </td>
            <td class="Quanitity">
               <div class="qut-box">
                  <button>
                  <i class="minus" aria-hidden="true" onclick="usqty('<?php echo e($i); ?>',0,'<?php echo e($item->id); ?>')">-</i>
                  </button>
                  <input type="text" name="text" id="quantity<?php echo e($i); ?>" placeholder="1" value="<?php echo e($item->quantity); ?>">
                  <button>
                  <i class="plus" aria-hidden="true" onclick="usqty('<?php echo e($i); ?>',1,'<?php echo e($item->id); ?>')">+</i>
                  </button>
               </div>
               <span><?php echo e(__('messages.Quanitity')); ?> :</span>
            </td>
            <?php $total=$item->price*$item->quantity;?>
            <td class="total">
               <?php echo e(Session::get('currency')); ?>

               <circle id="totalprice<?php echo e($i); ?>"><?php echo e(number_format((float)$total, 2, '.', '')); ?></circle>
               <span><?php echo e(__('messages.total')); ?> :</span>
            </td>
         </tr>
         <?php $i++;?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php else: ?>
              <tr><td colspan="6" class="emptywish"><?php echo e(__('messages.cart_empty')); ?></td></tr>
         <?php endif; ?>
      </table>
      <input type="hidden" name="coupon_discount_type" id="coupon_discount_type" value="0" />
      <input type="hidden" name="coupon_discount_value" id="coupon_discount_value" value="0" />
      <input type="hidden" name="coupon_min_value" id="coupon_min_value" value="" />
      <input type="hidden" name="coupon_max_value" id="coupon_max_value" value="" />
      <div class="continue">
         <a href="<?php echo e(url('/')); ?>" style="color: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.continue_shopping')); ?>

         <i class="fa fa-long-arrow-right" aria-hidden="true" style="color: <?= Session::get('site_color') ?> !important"></i>
         </a>
      </div>
   </div>
   <?php
         if($cartCollection->count()==0){
             $class="is-hide";
         }
         else{
             $class="";
         }
   ?>
   
   <div class="other-detail <?php echo e($class); ?>" id="coupon_section">
      <div class="row">
         <div class="col-md-6">
            <div class="coupon">
               <h1 style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.coupon')); ?></h1>
            </div>
            <div class="coupon-detail">
               <p><?php echo e(__('messages.coupon_note')); ?></p>
               <form class="contact1-form validate-form">
                  <input type="text" name="couponcode" id="couponcode" placeholder="Coupon code">
                  <button value="submit" type="button" onclick="addcoupon()" style="background: <?= Session::get('site_color') ?> !important">
                  <?php echo e(__('messages.apply_coupon')); ?>

                  </button>
               </form>
            </div>
         </div>
         <div class="col-md-6" id="totalsection">
            <div class="coupon">
               <h1 style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.cart_details')); ?></h1>
            </div>
            <div class="cart-mt">
               <form action="<?php echo e(url('checkout')); ?>" method="post">
                  <div class="subt-box">
                     <h1><?php echo e(__('messages.subtotal')); ?></h1>
                     <span id="subtotal"><?php echo e(Cart::getTotal()); ?></span><span><?php echo e(Session::get('currency')); ?></span>
                     <h1 class="ship"><?php echo e(__('messages.shipping')); ?></h1>
                     <div class="main-d">
                        <?php $i=0;$cost=0;?>
                        <?php $__currentLoopData = $shipping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($i==0): ?>
                        <?php $cost=$sh->cost;?>
                        <?php endif; ?>
                        <div class="Delivery-opation">
                           <input type="radio" value="<?php echo e($sh->id); ?>#<?php echo e($sh->cost); ?>" name="delivery[]" required="" id="delivery" onchange="Changeradio(this.value)">
                           <h1><?php echo e($sh->label); ?></h1>
                           <span><?php echo e(Session::get('currency')); ?><?php echo e(number_format((float)$sh->cost, 2, '.', '')); ?></span>
                        </div>
                        <?php $i++;?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                     <div id="coupon_total">
                        <h1><?php echo e(__('messages.coupon')); ?></h1>
                        <span id="couponval"></span><span>-</span>
                        <div class="coupon-apply">
                           <h1 id="couponname"></h1>
                           <p><?php echo e(__('messages.offer_on_bill')); ?></p>
                        </div>
                     </div>
                     <div class=""  id="free-delivery">
                        <h1><?php echo e(__('messages.free_delivery')); ?></h1>
                     </div>
                  </div>
                  <div class="cart-totals">
                     <h1><?php echo e(__('messages.total')); ?></h1>
                     <span id="totalamount"><?php echo e(Cart::getTotal()); ?></span><span>$</span>
                  </div>
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="check_delivery" id="checkout_delivery" />
                  <input type="hidden" name="check_discount_type" id="checkout_discount_type" />
                  <input type="hidden" name="check_discount_value" id="checkout_discount_value" />
                  <input type="hidden" name="check_free_shipping" id="checkout_free_shipping" />
                  <input type="hidden" name="check_coupon_value" id="checkout_coupon_value" />
                  <input type="hidden" name="check_couponcode" id="checkout_couponcode" />
                  <button value="submit" type="submit" onclick="Checkout()" style="background: <?= Session::get('site_color') ?> !important">
                  <?php echo e(__('messages.proceed_to_checkout')); ?>

                  </button>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>
<input type="hidden" name="freedelivery" id="freedelivery" value="0" />
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freaktemplate/public_html/ecommerce/resources/views/user/product/mycart.blade.php ENDPATH**/ ?>