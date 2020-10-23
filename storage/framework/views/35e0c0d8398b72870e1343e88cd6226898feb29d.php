<?php $__env->startSection('title'); ?>
<?php echo e(__('messages.my_account')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
   <div class="cart-heading wish">
      <h1><?php echo e(__('messages.my_account')); ?></h1>
   </div>
   <div class="myaccount">
      <div class="row">
         <div class="col-md-12 col-lg-4">
            <div class="profile">
               <div class="profile-img">
                  <?php $external_link = asset('public/upload/profile'.'/'.Session::get("profile_pic"));
                     if (Session::get("profile_pic")!="") {
                           $image = $external_link;
                     } else {
                              $image = asset('public/Ecommerce/images/profile.png');
                     }?>
                  <img src="<?php echo e($image); ?>">
               </div>
               <h1><?php echo e($userdata->first_name); ?></h1>
               <p><?php echo e($userdata->email); ?></p>
            </div>
            <div class="profile-tab">
               <ul class="tabs">
                  <li onclick="changetab('tab-1',1)" id="litab1" class="tab-link current" style="background: <?= Session::get('site_color') ?> !important" data-tab="tab-1"><?php echo e(__('messages.my_order')); ?><span><i class="fa fa-chevron-down" aria-hidden="true"></i></span></li>
                  <li onclick="changetab('tab-2',2)" id="litab2" class="tab-link" data-tab="tab-2"><?php echo e(__('messages.personal_detail')); ?><span><i class="fa fa-chevron-down" aria-hidden="true"></i></span></li>
                  <li onclick="changetab('tab-3',3)" id="litab3" class="tab-link" data-tab="tab-3"><?php echo e(__('messages.address')); ?><span><i class="fa fa-chevron-down" aria-hidden="true"></i></span></li>
                  <li onclick="changetab('tab-4',4)" id="litab4" class="tab-link" data-tab="tab-4"><?php echo e(__('messages.change_pwd')); ?><span><i class="fa fa-chevron-down" aria-hidden="true"></i></span></li>
                  <li onclick="changetab('tab-5',5)" id="litab5" class="tab-link" data-tab="tab-4"  data-toggle="modal" data-target="#myModal1"><?php echo e(__('messages.logout')); ?><span><i class="fa fa-chevron-down" aria-hidden="true"></i></span></li>
               </ul>
            </div>
         </div>
         <div class="col-md-12 col-lg-8 side">
            <div id="tab-1" class="tab-content current account">
               <?php if(count($myorder)!=0): ?>
               <div class="tab-heading">
                  <h1><?php echo e(__('messages.my_order')); ?></h1>
               </div>
               <table>
                  <tr class="account-h">
                     <th><?php echo e(__('messages.order_id')); ?>.</th>
                     <th><?php echo e(__('messages.date')); ?></th>
                     <th><?php echo e(__('messages.status')); ?></th>
                     <th><?php echo e(__('messages.total')); ?></th>
                     <th><?php echo e(__('messages.action')); ?></th>
                  </tr>
                  <?php $i=1;?>
                  <?php $__currentLoopData = $myorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $my): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr class="account-detail" data-aos="zoom-in">
                     <td>
                        <span><?php echo e(__('messages.order_id')); ?>. :</span>
                        <?php echo e($i); ?>

                     </td>
                     <td>
                        <span><?php echo e(__('messages.date')); ?> :</span>
                        <?php echo e(date('F d,Y', strtotime($my->orderdate))); ?>

                     </td>
                     <td>
                        <span><?php echo e(__('messages.status')); ?> :</span>
                        <?php if($my->order_status=='1'): ?>
                        <?php echo e(__("messages.processing")); ?>

                        <?php endif; ?>
                        <?php if($my->order_status=='2'): ?>
                        <?php echo e(__("messages.on_hold")); ?>

                        <?php endif; ?>
                        <?php if($my->order_status=='3'): ?>
                        <?php echo e(__("messages.pending")); ?>

                        <?php endif; ?>
                        <?php if($my->order_status=='5'): ?>
                        <?php echo e(__("messages.completed")); ?>

                        <?php endif; ?>
                        <?php if($my->order_status=='6'): ?>
                        <?php echo e(__("messages.canceled")); ?>

                        <?php endif; ?>
                        <?php if($my->order_status=='7'): ?>
                        <?php echo e(__("messages.refunded")); ?>

                        <?php endif; ?>
                        <?php if($my->order_status=='4'): ?>
                        <?php echo e(__("messages.out_of_delivery")); ?>

                        <?php endif; ?>
                     </td>
                     <td>
                        <span><?php echo e(__('messages.total')); ?> :</span>
                        <?php echo e(Session::get('currency')); ?><?php echo e($my->total); ?> for <?php echo e($my->total_item); ?> item
                     </td>
                     <td class="View">
                        <span><?php echo e(__('messages.action')); ?> :</span>
                        <a href="<?php echo e(url('vieworder').'/'.$my->id); ?>" style="border-color: <?= Session::get('site_color') ?> !important" class="myordera" id="myordera<?php echo e($i); ?>"><?php echo e(__('messages.view')); ?></a>
                     </td>
                  </tr>
                  <?php $i++;?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </table>
               <?php endif; ?>
               <?php if(count($myorder)==0): ?>
               <div class="order-em">
                  <img src="<?php echo e(asset('public/Ecommerce/images/empty.png')); ?>">
                  <h1><?php echo e(__('messages.no_order')); ?></h1>
               </div>
               <?php endif; ?>
            </div>
            <div id="tab-2" class="tab-content">
               <div class="tab-heading">
                  <h1><?php echo e(__('messages.personal_detail')); ?></h1>
               </div>
               <div class="per-detail">
                  <form action="<?php echo e(url('updateuserprofile')); ?>" method="post" enctype="multipart/form-data">
                     <?php echo e(csrf_field()); ?>

                     <div class="personal-form">
                        <?php $external_link = asset('public/upload/profile'.'/'.Session::get("profile_pic"));
                           if (Session::get("profile_pic")!="") {
                                 $image = $external_link;
                           } else {
                                    $image = asset('public/Ecommerce/images/profile.png');
                           }?>
                        <img src="<?php echo e($image); ?>">
                        <label class="per-text"><?php echo e(__('messages.profile_picture')); ?>

                        <span>*</span>
                        </label>
                        <input type="file" name="file" >
                        <label class="per-text"><?php echo e(__('messages.name')); ?>

                        <span>*</span>
                        </label>
                        <input type="text" name="edit_first_name" id="edit_first_name" value="<?php echo e($userdata->first_name); ?>">
                        <label class="per-text" required=""><?php echo e(__('messages.email')); ?>

                        <span>*</span>
                        </label>
                        <input type="text" name="edit_email" id="edit_email" readonly value="<?php echo e($userdata->email); ?>" required="">
                        <label class="per-text"><?php echo e(__('messages.phone')); ?>

                        <span>*</span>
                        </label>
                        <input type="text" name="edit_phone" id="edit_phone" value="<?php echo e($userdata->phone); ?>" required="">
                        <label class="per-text"><?php echo e(__('messages.address')); ?>

                        </label>
                        <textarea name="edit_address" id="edit_address"><?php echo e($userdata->address); ?></textarea>   
                     </div>
                     <div class="personal-btn">
                        <button class="update" type="submit" name="btnsubmit" style="background-color: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.update')); ?></button>
                     </div>
                  </form>
               </div>
            </div>
            <div id="tab-3" class="tab-content">
               <div class="tab-heading">
                  <h1><?php echo e(__('messages.address')); ?></h1>
               </div>
               <div class="per-detail">
                  <div class="addre">
                     <span><i onclick="editbilling()" style="color: <?= Session::get('site_color') ?> !important" class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                     <h1><?php echo e(__('messages.billing_address')); ?></h1>
                     <p id="billing_address"><?php echo e($userdata->billing_address); ?></p>
                     <div id="textbilling">
                        <form>
                           <textarea class="form-control"  id="bill"><?php echo e($userdata->billing_address); ?></textarea>
                           <input value="Save" type="button" onclick="SaveAddress('bill')" style="background-color: <?= Session::get('site_color') ?> !important">
                           <button onclick="closebill()" type="button" style="background-color: <?= Session::get('site_color') ?> !important">Cancel</button>
                        </form>
                     </div>
                  </div>
                  <div class="addre">
                     <span><i onclick="editshipping()" style="color: <?= Session::get('site_color') ?> !important" class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                     <h1><?php echo e(__('messages.shipping_address')); ?></h1>
                     <p id="shipping_address"><?php echo e($userdata->shipping_address); ?></p>
                     <div id="textshipping">
                        <form>
                           <textarea class="form-control"  id="ship"><?php echo e($userdata->billing_address); ?></textarea>
                           <input value="Save" type="button" name="" onclick="SaveAddress('ship')" style="background-color: <?= Session::get('site_color') ?> !important">
                           <button onclick="closeship()" type="button" style="background-color: <?= Session::get('site_color') ?> !important">Cancel</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <div id="tab-4" class="tab-content">
               <div class="tab-heading">
                  <h1><?php echo e(__('messages.change_pwd')); ?></h1>
               </div>
               <div class="per-detail">
                  <div class="personal-form">
                     <p id="msgres"></p>
                     <?php if(Auth::user()->password!=""): ?>
                     <label class="per-text"><?php echo e(__('messages.ent_current_pwd')); ?><span>*</span></label>
                     <input type="password" name="cpwd" id="cpwd" placeholder="<?php echo e(__('messages.ent_current_pwd')); ?>" onchange="checkcurrentpwd(this.value)">
                     <input type="hidden" name="cur_pwd" id="cur_pwd" value="1">
                     <?php else: ?>
                     <input type="hidden" name="cur_pwd" id="cur_pwd" value="0">
                     <?php endif; ?>
                     <label class="per-text"><?php echo e(__('messages.ent_new_pwd')); ?><span>*</span></label>
                     <input type="password" placeholder="<?php echo e(__('messages.ent_new_pwd')); ?>" name="npwd" id="npwd">
                     <label class="per-text"><?php echo e(__('messages.re_enter_pwd_en')); ?><span>*</span></label>
                     <input type="password" name="rpwd" placeholder="<?php echo e(__('messages.re_enter_pwd_en')); ?>" id="rpwd" onchange="checkboth(this.value)">
                  </div>
                  <div class="personal-btn">
                     <button class="cancel" onclick="cancelpwd()"><?php echo e(__('messages.cancel')); ?></button>
                     <button class="update" onclick="changepassword()" style="background-color: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.update')); ?></button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<input type="hidden" value="<?php echo e(__('passwords.pwd_same')); ?>" id="match_error">
<input type="hidden" id="error_current_pwd" value="<?php echo e(__('passwords.error_cur_pwd')); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project\shop\resources\views/user/account/myaccount.blade.php ENDPATH**/ ?>