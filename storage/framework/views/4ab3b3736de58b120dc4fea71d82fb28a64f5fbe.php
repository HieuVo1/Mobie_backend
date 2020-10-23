<?php $__env->startSection('title'); ?>
<?php echo e(__('messages.Checkout')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    #stripe button{
       background-color:<?= Session::get('site_color') ?> !important;
   }
</style>
<div class="container">
    
   <div class="cart-heading">
      <h1><?php echo e(__('messages.Checkout')); ?></h1>
      <span><a href="<?php echo e(url('/')); ?>"><?php echo e(__('messages.home')); ?></a> /<a href="<?php echo e(url('cartdetail')); ?>"><?php echo e(__('messages.My_Cart')); ?></a> / <?php echo e(__('messages.Checkout')); ?></span>
   </div>
   <div class="checkout-box">
       
      <div class="row">
         <div class="chek-img">
            <div class="check-icon-box" style="background: <?= Session::get('site_color') ?> !important">
               <div class="icon-images"></div>
            </div>
         </div>
         <div class="col-md-10 col-sm-9">
            <?php if(!Auth::id()): ?>
            <h2><?php echo e(__('messages.return_cus')); ?></h2>
            <?php endif; ?>
            <?php if(Auth::id()): ?>
            <h2><?php echo e(Auth::user()->first_name); ?></br>
            <span class="checkemail"><?php echo e(Auth::user()->email); ?></span></h2>
            <?php endif; ?>
         </div>
      </div>
      <?php if(!Auth::id()): ?>
      <div class="check-text">
         <p><?php echo e(__('messages.note1')); ?>

              <?php echo e(__('messages.note2')); ?>

         </p>
         <span id="check_error_msg"></span>
         <div class="form">
            <div class="row">
               <div class="col-md-6 name">
                  <h1><?php echo e(__('messages.email')); ?><span class="reqfield">*</span></h1>
                  <input type="text" name="check_email">
               </div>
               <div class="col-md-6 name">
                  <h1><?php echo e(__('messages.password')); ?><span class="reqfield">*</span></h1>
                  <input type="Password" name="check_password">
               </div>
            </div>
            <div class="login">
               <button type="button" onclick="loginuser('check_')" style="background-color: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.sign_in')); ?></button>
               <span>
               <button type="button" onclick="openregsiter()"  data-toggle="modal" data-target="#myModal" style="background-color: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.sign_up')); ?></button>
               </span>
            </div>
         </div>
         <div class="checkbox-container">
            <input type="checkbox" name="check_remember">
            <h1><?php echo e(__('messages.rem_me')); ?></h1>
         </div>
      </div>
      <?php endif; ?>
   </div>
   <div class="check-section">
      <div class="row">
         <div class="col-md-6">
            <div class="Billing-box">
               <div class="billing-head">
                  <h1><?php echo e(__('messages.billing_detail')); ?></h1>
               </div>
               <div class="col-md-12 p-0">
                  <form class="frm">
                     <div class="row">
                        <div class="col-md-12">
                           <label class="frm-name"><?php echo e(__('messages.name')); ?> :<span class="reqfield">*</span></label>
                           <input type="text" name="order_firstname" id="order_firstname" value="<?=isset(Auth::user()->first_name)?Auth::user()->first_name:''; ?>">
                        </div>
                      
                     </div>
                     <label class="frm-name"><?php echo e(__('messages.address')); ?> :<span class="reqfield">*</span></label>
                     <textarea name="order_billing_address" id="order_billing_address"><?=isset(Auth::user()->billing_address)?Auth::user()->billing_address:''; ?></textarea>
                     <div class="row">
                        <div class="col-md-6">
                           <label class="frm-name"><?php echo e(__('messages.Town_City')); ?>:<span class="reqfield">*</span></label>
                           <input type="text" name="order_billing_city" id="order_billing_city">
                        </div>
                        <div class="col-md-6">
                           <label class="frm-name"><?php echo e(__('messages.Postcode_Zip')); ?> :<span class="reqfield">*</span></label>
                           <input type="text" name="order_billing_pincode" id="order_billing_pincode">
                        </div>
                     </div>
                     <label class="frm-name"><?php echo e(__('messages.phone')); ?> :<span class="reqfield">*</span></label>
                     <input type="text" name="order_phone" id="order_phone" value="<?=isset(Auth::user()->phone)?Auth::user()->phone:''; ?>">	
                     <label class="frm-name"><?php echo e(__('messages.email')); ?> :<span class="reqfield">*</span></label>
                     <input type="text" name="order_email" id="order_email" value="<?=isset(Auth::user()->email)?Auth::user()->email:''; ?>">	
                     <div class="checkbox-container-1">
                        <input type="checkbox" name="to_ship" value="1" id="to_ship" onclick="changeship()">
                        <h1><?php echo e(__('messages.ship_different')); ?></h1>
                     </div>
                     <div id="shipping_address" class="toshop">
                        <div class="row">
                           <div class="col-md-12">
                              <label class="frm-name"><?php echo e(__('messages.name')); ?> :<span class="reqfield">*</span></label>
                              <input type="text" name="order_ship_firstname" id="order_ship_firstname">
                           </div>
                          
                        </div>
                        <label class="frm-name"><?php echo e(__('messages.address')); ?> :<span class="reqfield">*</span></label>
                        <input type="text" name="order_shipping_address" id="order_shipping_address" value="<?=isset(Auth::user()->shipping_address)?Auth::user()->shipping_address:''; ?>">
                        <div class="row">
                           <div class="col-md-6">
                              <label class="frm-name"><?php echo e(__('messages.Town_City')); ?> :<span class="reqfield">*</span></label>
                              <input type="text" name="order_shipping_city" id="order_shipping_city">
                           </div>
                           <div class="col-md-6">
                              <label class="frm-name"><?php echo e(__('messages.Postcode_Zip')); ?> :<span class="reqfield">*</span></label>
                              <input type="text" name="order_shipping_pincode" id="order_shipping_pincode">
                           </div>
                        </div>
                     </div>
                     <label class="frm-name"><?php echo e(__('messages.notes_op')); ?> :</label>
                     <textarea type="text" name="order_notes" id="order_notes"></textarea>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="check-order">
               <div class="check-order-h">
                  <h1><?php echo e(__('messages.your_order')); ?></h1>
               </div>
               <table>
                  <tr>
                     <th style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.Detail')); ?></th>
                     <th style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.total')); ?></th>
                  </tr>
                  <tr class="check-ord-text">
                     <td>
                        <?php echo e(__('messages.subtotal')); ?>

                     </td>
                     <td><?php echo e(Session::get('currency').number_format((float)Cart::gettotal(), 2, '.', '')); ?></td>
                  </tr>
                  <?php if($check_couponcode!=""): ?>
                  <tr class="check-ord-text">
                     <td>
                        <?php echo e(__('messages.coupon')); ?>(<?php echo e($check_couponcode); ?>)
                     </td>
                     <td>-<?php echo e($check_coupon_value); ?></td>
                     <input type="hidden" id="couponcode"  value="<?php echo e($check_couponcode); ?>" />
                     <input type="hidden" id="couponval" value="<?php echo e($check_coupon_value); ?>" />
                  </tr>
                  <?php endif; ?>
                  <?php $__currentLoopData = $product_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr class="check-ord-text">
                     <td>
                        <?php echo e($pt["name"]); ?>

                     </td>
                     <td><?php echo e(Session::get('currency').number_format((float)$pt["total"], 2, '.', '')); ?></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php if($check_free_shipping==0): ?>
                  <tr class="check-ord-text">
                     <td>
                        <?php echo e(__('messages.shipping')); ?>

                     </td>
                     <td><?php if($delivery_type==1): ?> <?php echo e(__("messages.home_delivery")); ?> <?php else: ?> <?php echo e(__("messages.local_pickup")); ?> <?php endif; ?>: <?php echo e(Session::get('currency').number_format((float)$delivery_charge, 2, '.', '')); ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if($check_free_shipping==1): ?>
                  <tr class="check-ord-text">
                     <td>
                        <?php echo e(__('messages.shipping')); ?>

                     </td>
                     <td><?php echo e(__('messages.free_delivery')); ?></td>
                  </tr>
                  <?php endif; ?>
                  <input type="hidden" id="freeshipping" value="<?php echo e($check_free_shipping); ?>">
                  <input type="hidden" id="shipping_type" value="<?php echo e($delivery_type); ?>">
                  <input type="hidden" id="shipping_charges" value="<?php echo e($delivery_charge); ?>">
                  <tr class="check-ord-total">
                     <td>
                        <?php echo e(__('messages.total')); ?>

                     </td>
                     <?php 
                        $total=0;
                        foreach($product_tax as $pt){
                        	$total=$total+$pt['total'];
                        }?>
                     <input type="hidden" id="total_tax" value="<?php echo e($total); ?>">
                     <?php
                        if($check_free_shipping==1){
                        $delivery=0;
                        }
                        else{
                        	$dt=explode("#",$check_delivery);
                        	if(!empty($dt[1])){
                        		$delivery=$dt[1];
                        	}
                        	else{
                        		$delivery=0;
                        	}
                        }
                        $total=(float)$total+(((float)Cart::gettotal()+(float)$delivery)-((float)$check_coupon_value));
                        ?>
                     <input type="hidden" id="total_order_price" value="<?php echo e($total); ?>">
                     <td><?php echo e(Session::get('currency').$total); ?></td>
                  </tr>
               </table>
            </div>
            <div class="payment-box">
               <?php if($payment_method[0]->status=='1'): ?>
               <div class="check-payment">
                  <div class="c-box">
                     <input type="radio" name="payment_method" id="payment_method_1" value="1" onclick="orderpayment(this.value)">
                  </div>
                  <div class="payment-text">
                     <div class="pay">
                        <a href="#"><img src="<?php echo e(asset('public/Ecommerce/images/pay-1.jpg')); ?>"></a>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
               <?php if($payment_method[1]->status=='1'): ?>
               <div class="check-payment">
                  <div class="c-box">
                     <input type="radio" name="payment_method" id="payment_method_2" value="2" onclick="orderpayment(this.value)">
                  </div>
                  <div class="payment-text">
                     <div class="pay">
                        <a href="#"><img src="<?php echo e(asset('public/Ecommerce/images/pay-2.jpg')); ?>"></a>
                        <a href="#"><img src="<?php echo e(asset('public/Ecommerce/images/pay-3.jpg')); ?>"></a>
                        <a href="#"><img src="<?php echo e(asset('public/Ecommerce/images/pay-4.jpg')); ?>"></a>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
               <?php if($payment_method[2]->status=='1'): ?>
               <div class="check-payment">
                  <div class="c-box">
                     <input type="radio" name="payment_method" id="payment_method_3" value="3" onclick="orderpayment(this.value)">
                  </div>
                  <div class="payment-text">
                     <h1><?php echo e(__('messages.case_on_delivery')); ?></h1>
                  </div>
               </div>
               <?php endif; ?>
            </div>
            <div class="place-btn" id="paypal">
               <form action="<?php echo e(url('paywithpaypal')); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="order_firstname" id="pay_order_firstname">
                  <input type="hidden" name="order_billing_address" id="pay_order_billing_address">
                  <input type="hidden" name="order_billing_city" id="pay_order_billing_city">
                  <input type="hidden" name="order_billing_pincode" id="pay_order_billing_pincode">
                  <input type="hidden" name="order_phone" id="pay_order_phone">
                  <input type="hidden" name="order_email" id="pay_order_email">
                  <input type="hidden" name="to_ship" id="pay_order_to_ship">
                  <input type="hidden" name="order_ship_firstname" id="pay_order_ship_firstname">
                  <input type="hidden" name="order_shipping_address" id="pay_order_shipping_address">
                  <input type="hidden" name="order_shipping_city" id="pay_order_shipping_city">
                  <input type="hidden" name="order_shipping_pincode" id="pay_order_shipping_pincode">
                  <input type="hidden" name="order_notes" id="pay_order_notes">
                  <input type="hidden" name="couponcode" id="pay_couponcode">
                  <input type="hidden" name="freeshipping" id="pay_freeshipping">
                  <input type="hidden" name="couponval" id="pay_couponval">
                  <input type="hidden" name="shipping_type" id="pay_shipping_type">
                  <input type="hidden" name="shipping_charges" id="pay_shipping_charges">
                  <input type="hidden" name="total_order_price" id="pay_total_order_price">
                  <input type="hidden" name="payment_method" id="pay_payment_method">
                  <input type="hidden" name="total_taxes" id="pay_total_taxes">
                  <button type="submit" style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.place_order')); ?></button>
               </form>
            </div>
            <div class="place-btn" id="stripe">
               <form action="<?php echo e(url('cashorder')); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="order_firstname" id="stri_order_firstname">
                  <input type="hidden" name="order_billing_address" id="stri_order_billing_address">
                  <input type="hidden" name="order_billing_city" id="stri_order_billing_city">
                  <input type="hidden" name="order_billing_pincode" id="stri_order_billing_pincode">
                  <input type="hidden" name="order_phone" id="stri_order_phone">
                  <input type="hidden" name="order_email" id="stri_order_email">
                  <input type="hidden" name="to_ship" id="stri_order_to_ship">
                  <input type="hidden" name="order_ship_firstname" id="stri_order_ship_firstname">
                  <input type="hidden" name="order_shipping_address" id="stri_order_shipping_address">
                  <input type="hidden" name="order_shipping_city" id="stri_order_shipping_city">
                  <input type="hidden" name="order_shipping_pincode" id="stri_order_shipping_pincode">
                  <input type="hidden" name="order_notes" id="stri_order_notes">
                  <input type="hidden" name="couponcode" id="stri_couponcode">
                  <input type="hidden" name="freeshipping" id="stri_freeshipping">
                  <input type="hidden" name="couponval" id="stri_couponval">
                  <input type="hidden" name="shipping_type" id="stri_shipping_type">
                  <input type="hidden" name="shipping_charges" id="stri_shipping_charges">
                  <input type="hidden" name="total_order_price" id="stri_total_order_price">
                  <input type="hidden" name="payment_method" id="stri_payment_method">
                  <input type="hidden" name="total_taxes" id="stri_total_taxes">
                  <script
                     src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                     data-key="<?php echo e(Session::get('stripe_key')); ?>"
                     data-amount=""
                     data-id="stripid"
                     data-name="<?php echo e(__('messages.site_name')); ?>"
                     data-label="<?php echo e(__('messages.place_order')); ?>"
                     data-description=""
                     data-image="<?php echo e(asset('public/Ecommerce/images/logo.png')); ?>"
                     data-locale="auto"></script>
               </form>
            </div>
            <div class="place-btn" id="cod">
               <form action="<?php echo e(url('cashorder')); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="order_firstname" id="cod_order_firstname">
                  <input type="hidden" name="order_billing_address" id="cod_order_billing_address">
                  <input type="hidden" name="order_billing_city" id="cod_order_billing_city">
                  <input type="hidden" name="order_billing_pincode" id="cod_order_billing_pincode">
                  <input type="hidden" name="order_phone" id="cod_order_phone">
                  <input type="hidden" name="order_email" id="cod_order_email">
                  <input type="hidden" name="to_ship" id="cod_order_to_ship">
                  <input type="hidden" name="order_ship_firstname" id="cod_order_ship_firstname">
                  <input type="hidden" name="order_shipping_address" id="cod_order_shipping_address">
                  <input type="hidden" name="order_shipping_city" id="cod_order_shipping_city">
                  <input type="hidden" name="order_shipping_pincode" id="cod_order_shipping_pincode">
                  <input type="hidden" name="order_notes" id="cod_order_notes">
                  <input type="hidden" name="couponcode" id="cod_couponcode">
                  <input type="hidden" name="freeshipping" id="cod_freeshipping">
                  <input type="hidden" name="couponval" id="cod_couponval">
                  <input type="hidden" name="shipping_type" id="cod_shipping_type">
                  <input type="hidden" name="shipping_charges" id="cod_shipping_charges">
                  <input type="hidden" name="total_order_price" id="cod_total_order_price">
                  <input type="hidden" name="payment_method" id="cod_payment_method">
                  <input type="hidden" name="total_taxes" id="cod_total_taxes">
                  <button type="submit" style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.place_order')); ?></button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freaktemplate/public_html/ecommerce/resources/views/user/product/checkout.blade.php ENDPATH**/ ?>