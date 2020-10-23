<?php $__env->startSection('title'); ?>
<?php echo e(__('messages.view_order')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
   <div class="cart-heading pro-heading">
      <h1><?php echo e(__('messages.order_detail')); ?></h1>
      <span><a href="<?php echo e(url('/')); ?>"><?php echo e(__('messages.home')); ?> </a>/<a href="<?php echo e(url('myaccount')); ?>"><?php echo e(__('messages.my_account')); ?></a>/ <?php echo e(__('messages.order_detail')); ?></span>
   </div>
   <?php if(Session::has('message')): ?>
   <div class="col-sm-12">
      <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
   </div>
   <?php endif; ?>
   <div class="order-process">
      <div class="progress">
         <?php $width="0.00%";
            if($order->pending_datetime!=0){
            	 $width="33.33%";
            }
                  if($order->onhold_datetime!=0)
               {
               	 $width='66.66%';
               }
                  if($order->completed_datetime!=0){
                  	$width='99.99%';
                  }
            ?>
         <div class="progress-bar" role="progressbar" aria-valuenow="70"
            aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $width;?>;background-color:<?= Session::get('site_color') ?> !important">
            <span class="sr-only">100% <?php echo e(__('messages.completed')); ?></span>
         </div>
      </div>
      <div class="main-process">
         <div class="process-pos">
            <div class="process-1">
               <div class="process-1-circle" style="border-color: <?= Session::get('site_color') ?> !important" ></div>
               <div class="pro-text">
                  <h1><?php echo e(__('messages.orders')); ?> <?php echo e(__("messages.processing")); ?></h1>
                  <p style="color: <?= Session::get('site_color') ?> !important"><?php echo e(date("h:i  F d,Y ",strtotime($order->orderdate))); ?></p>
               </div>
            </div>
            <div class="process-1">
               <div class="process-1-circle" style="border-color: <?= Session::get('site_color') ?> !important"></div>
               <div class="pro-text">
                  <h1><?php echo e(__('messages.orders')); ?> <?php echo e(__("messages.pending")); ?></h1>
                  <p style="color: <?= Session::get('site_color') ?> !important"><?php if($order->pending_datetime!=0): ?><?php echo e(date("h:i  F d,Y ",strtotime($order->pending_datetime))); ?><?php endif; ?></p>
               </div>
            </div>
            <div class="process-1">
               <div class="process-1-circle" style="border-color: <?= Session::get('site_color') ?> !important"></div>
               <div class="pro-text">
                  <h1><?php echo e(__('messages.orders')); ?> <?php echo e(__("messages.on_hold")); ?></h1>
                  <p style="color: <?= Session::get('site_color') ?> !important"><?php if($order->onhold_datetime!=0): ?><?php echo e(date("h:i  F d,Y ",strtotime($order->onhold_datetime))); ?><?php endif; ?></p>
               </div>
            </div>
            <div class="process-1">
               <div class="process-1-circle" style="border-color: <?= Session::get('site_color') ?> !important"></div>
               <div class="pro-text">
                  <h1><?php echo e(__('messages.orders')); ?> <?php echo e(__('messages.Delivered')); ?></h1>
                  <p style="color: <?= Session::get('site_color') ?> !important"><?php if($order->completed_datetime!=0): ?><?php echo e(date("h:i  F d,Y ",strtotime($order->completed_datetime))); ?><?php endif; ?></p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="process-info" >
      <li>
         <div class="info-text">
            <h1><?php echo e(__('messages.order_id')); ?> :</h1>
            <p>#<?php echo e($order->id); ?></p>
         </div>
      </li>
      <li>
         <div class="info-text">
            <h1><?php echo e(__('messages.date')); ?> :</h1>
            <p><?php echo e(date("F d,Y",strtotime($order->orderdate))); ?></p>
         </div>
      </li>
      <li>
         <div class="info-text">
            <h1><?php echo e(__('messages.email')); ?> :</h1>
            <p><?php echo e($order->email); ?></p>
         </div>
      </li>
      <li>
         <div class="info-text">
            <h1><?php echo e(__('messages.total')); ?> :</h1>
            <p><?php echo e(Session::get('currency').$order->total); ?></p>
         </div>
      </li>
      <li>
         <div class="info-text">
            <h1><?php echo e(__('messages.payment_method')); ?> :</h1>
            <p><?php if($order->payment_method==1): ?>
               <?php echo e(__('messages.paypal')); ?>

               <?php elseif($order->payment_method==2): ?>
               <?php echo e(__('messages.stripe')); ?>

               <?php else: ?>
               <?php echo e(__('messages.case_on_delivery')); ?>

               <?php endif; ?>
            </p>
         </div>
      </li>
   </div>
   <div class="cart-detail">
      <h4><?php echo e(__('messages.orders')); ?></h4>
      <table>
         <tr class="pro-heading" style="background-color: <?= Session::get('site_color') ?> !important">
            <th><?php echo e(__('messages.order_id')); ?></th>
            <th><?php echo e(__('messages.images')); ?></th>
            <th><?php echo e(__('messages.product')); ?></th>
            <th><?php echo e(__('messages.Quanitity')); ?></th>
            <th><?php echo e(__('messages.price')); ?></th>
         </tr>
         <?php $i=1;?>
         <?php $__currentLoopData = $orderdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $od): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td class="order-num">
               <?php echo e($i); ?>.
               <span><?php echo e(__('messages.order_id')); ?></span>
            </td>
            <td class="cart-img">
               <img src="<?php echo e(asset('public/upload/product').'/'.$od->productdata->basic_image); ?>">
               <span><?php echo e(__('messages.images')); ?> :</span>
            </td>
            <td class="place-text">
               <div class="text-a">
                  <span><?php echo e(__('messages.product')); ?> :</span>
                  <h1><?php echo e($od->productdata->name); ?></h1>
                  <?php $option=explode(",",$od->option_name);
                     $label=explode(",",$od->label);
                     ?>
                  <?php for($i=0;$i<count($option);$i++){?>
                  <p><b><?php echo e($option[$i]); ?></b> <?php echo e($label[$i]); ?> </p>
                  <?php } ?>
               </div>
            </td>
            <td class="Quanitity">
               <div class="qut-box">
                  <button>
                  <i class="minus" aria-hidden="true">-</i>
                  </button>
                  <input type="text" readonly name="text" placeholder="2" value="<?php echo e($od->quantity); ?>">
                  <button>
                  <i class="plus" aria-hidden="true">+</i>
                  </button>
               </div>
               <span><?php echo e(__('messages.Quanitity')); ?> :</span>
            </td>
            <td class="price">
               <?php echo e(Session::get('currency').number_format((float)$od->price, 2, '.', '')); ?>

               <span><?php echo e(__('messages.price')); ?> :</span>
            </td>
         </tr>
         <?php $i++;?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </table>
   </div>
   <div class="other-detail" >
      <div class="row">
         <div class="col-md-6">
            <div class="coupon">
               <h1 style="background-color: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.billing_address')); ?></h1>
               <div class="address-info">
                  <p><?php echo e($order->billing_first_name); ?></p>
                  <p><?php echo e($order->billing_address); ?></p>
                  <p><?php echo e($order->billing_city." ".$order->billing_pincode); ?></p>
               </div>
            </div>
            <div class="col-md-12 p-0 bill">
               <div class="coupon">
                  <h1 style="background-color: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.shipping_address')); ?></h1>
                  <div class="address-info">
                     <?php if($order->to_ship=='0'): ?>
                     <p><?php echo e(__('messages.same_ship')); ?></p>
                     <?php endif; ?>
                     <?php if($order->to_ship=='1'): ?>
                     <p><?php echo e($order->shipping_first_name); ?></p>
                     <p><?php echo e($order->shipping_address); ?></p>
                     <p><?php echo e($order->shipping_city." ".$order->shipping_pincode); ?></p>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="coupon">
               <h1 style="background-color: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.cart_total')); ?></h1>
            </div>
            <div class="cart-mt">
               <div class="subt-box">
                  <h1><?php echo e(__('messages.subtotal')); ?></h1>
                  <span><?php echo e(Session::get('currency').number_format((float)$order->subtotal, 2, '.', '')); ?></span>
                  <?php if($order->coupon_code!=""): ?>
                  <h1><?php echo e(__('messages.coupon')); ?> (<?php echo e($order->coupon_code); ?>)</h1>
                  <span>-<?php echo e(Session::get('currency').number_format((float)$order->coupon_price, 2, '.', '')); ?></span>
                  <?php endif; ?>
                  <h1><?php echo e(__('messages.taxes')); ?></h1>
                  <span><?php echo e(Session::get('currency').number_format((float)$order->taxes_charge, 2, '.', '')); ?></span>
                  <h1><?php echo e(__('messages.shipping')); ?>(<?php if($order->shipping_method==1): ?> <?php echo e(__("messages.home_delivery")); ?> <?php else: ?> <?php echo e(__("messages.local_pickup")); ?> <?php endif; ?>)</h1>
                  <?php if($order->is_freeshipping=='1'): ?>
                  <span><?php echo e(Session::get('currency')); ?>0.00</span>
                  <?php else: ?>
                  <span><?php echo e(Session::get('currency').number_format((float)$order->shipping_charge, 2, '.', '')); ?></span>
                  <?php endif; ?>
                  <?php if($order->is_freeshipping=='1'): ?>
                  <h1 class="free-d"><?php echo e(__('messages.free_delivery')); ?></h1>
                  <?php endif; ?>
               </div>
               <div class="cart-totals">
                  <h1><?php echo e(__('messages.total')); ?></h1>
                  <span><?php echo e(Session::get('currency').$order->total); ?></span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freaktemplate/public_html/ecommerce/resources/views/user/account/vieworder.blade.php ENDPATH**/ ?>