<?php $__env->startSection('title'); ?>
<?php echo e(__('messages.site_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    .off-heading h1:before{
         background-color:<?= Session::get('site_color') ?> !important;
    }
    .off-heading h1:after{
        background-color:<?= Session::get('site_color') ?> !important;
    }
</style>
<div class="container">
   <div class="row nor-b">
      <?php $i=0?>
      <?php $__currentLoopData = $normaloffer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-4 col-12">
         <?php $path=asset("public/upload/offer/image/")."/".$no->banner?>
         <div class="normal1 text-off" style="background-image:url('<?php echo e($path); ?>')">
            <div class="off-ban">
            <h1 style="color: <?= Session::get('site_color') ?> !important"><?php echo e($no->title); ?></h1>
            <?php if($no->is_product=='2'): ?>
            <p><?php echo e(__('messages.home_note_3')); ?><?php echo e(Session::get('currency')); ?><?php echo e($no->new_price); ?></p>
            <?php endif; ?>
            <?php if($no->is_product=='1'): ?>
            <p><?php echo e(__('messages.home_note_1')); ?>  <?php echo e($no->fixed); ?>% <?php echo e(__('messages.home_note_2')); ?> </p>
            <?php endif; ?>
              <?php if($no->is_product=='3'): ?>
            <p><?php echo e($no->coupon_code); ?></p>
            <?php endif; ?>
            <?php if($no->is_product=='2'): ?>
            <a href="<?php echo e(url('viewproduct').'/'.$no->product_id); ?>" style="background: <?= Session::get('site_color') ?> !important">
            <?php echo e(__('messages.shop_now')); ?>

            </a>
            <?php endif; ?>
            <?php if($no->is_product=='1'): ?>
            <a href="<?php echo e(url('productslist').'/0/'.$no->category_id.'/0'.'/'.$no->fixed); ?>" style="background: <?= Session::get('site_color') ?> !important">
            <?php echo e(__('messages.shop_now')); ?>

            </a>
            <?php endif; ?>
             <?php if($no->is_product=='3'): ?>

            <a href="<?php echo e(url('productslist').'/0/0/0/0/'.'?cd='.$no->coupon_code); ?>" style="background: <?= Session::get('site_color') ?> !important">
            <?php echo e(__('messages.shop_now')); ?>

            </a>
            <?php endif; ?>

         </div>
         </div>
      </div>
      <?php $i++;?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </div>
</div>
<div class="container">
   <div class="off-heading">
      <h1><?php echo e(__('messages.best_offer')); ?></h1>
   </div>
   <div class="product-slider">
      <div id="demo1">
         <div class="row pos">
            <div class="customNavigation"> 
               <a class="btn prev" onclick="prevdemo2()"><i class="fa fa-angle-left" aria-hidden="true"></i></a> 
               <a class="btn next" onclick="nextdemo2()"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
            <div id="owl-demo2" class="owl-carousel">
               <?php $k=1;?>
               <?php $__currentLoopData = $getoffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="item col-md-12">
                  <div class="home-bg">
                  <div class="img-background" >
                     <a href="<?php echo e(url('viewproduct/').'/'.$fe->id); ?>"> <img src="<?php echo e(asset('public/upload/product').'/'.$fe->basic_image); ?>" class="img-responsive" ></a>
                     <div class="img-text">
                        <label class="fancy-checkbox">
                             <?php if(Auth::id()!=""): ?>
                              <input type="checkbox" id="checkfe<?php echo e($k); ?>" name="checkdata" onclick="changewishlist('<?php echo e($fe->id); ?>','checkfe<?php echo e($k); ?>')" <?=$fe->wish==1? ' checked="checked"' : '';?>/>
                             <?php else: ?>
                              <input type="checkbox" id="checkfe<?php echo e($k); ?>" name="checkdata"  onclick="removewishselect('checkfe<?php echo e($k); ?>')" data-toggle="modal" data-target="#myModal"/>
                             <?php endif; ?> 
                             <big id="wishfavor<?php echo e($fe->id); ?>"></big>
                        </label>
                        <i class="fa fa-spinner loadlconwish" aria-hidden="true" id="loading<?php echo e($fe->id); ?>" ></i>
                        <?php if($fe->discount!=0): ?>
                        <span><?php echo e($fe->discount); ?>%</span>
                        <?php endif; ?>
                     </div>
                  </div>
                  <div class="product-text">
                     <h1><?php echo e($fe->name); ?></h1>
                     <div class="price">
                        <h2><?php echo e(Session::get('currency').$fe->selling_price); ?>

                           <?php if($fe->discount!=0): ?>
                           <span class="span-mrp"> <?php echo e(Session::get('currency').$fe->MRP); ?></span>
                           <?php endif; ?>
                        </h2>
                        <span class="rating">
                        <?php for($i=0;$i<$fe->avgStar;$i++){ ?>
                        <i class="fa fa-star" aria-hidden="true" style="color: <?= Session::get('site_color') ?> !important"></i>
                        <?php }?>
                        <?php for($i=0;$i<(5-$fe->avgStar);$i++){ ?>
                        <i class="fa fa-star-o" aria-hidden="true" style="color: <?= Session::get('site_color') ?> !important"></i>
                        <?php }?>
                        </span>
                     </div>
                     <a href="<?php echo e(url('viewproduct/').'/'.$fe->id); ?>" style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.shop_now')); ?></a>
                  </div>
               </div>
            </div>
               <?php $k++;?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freaktemplate/public_html/ecommerce/resources/views/user/offers.blade.php ENDPATH**/ ?>