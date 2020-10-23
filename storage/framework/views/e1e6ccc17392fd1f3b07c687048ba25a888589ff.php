<?php $__env->startSection('title'); ?>
<?php echo e(__('messages.site_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(count($bestoffer)!=0): ?>
<div class="container">
   <div id="demo" class="carousel slide off-slide" data-ride="carousel" style="background: <?= Session::get('site_color') ?> !important">
      <ul class="carousel-indicators">
         <?php $i=0;?>
         <?php $__currentLoopData = $bestoffer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php if($i==0): ?>
         <?php $class="active";?>
         <?php else: ?>
         <?php $class="";?>
         <?php endif; ?>
         <li data-target="#demo" data-slide-to="<?php echo e($i); ?>" class="<?php echo e($class); ?>"></li>
         <?php $i++;?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <div class="carousel-inner">
         <?php $i=0;?>
         <?php $__currentLoopData = $bestoffer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php 
            $active="";
            if($i==0){
               $active="active";
            }
            $i++;
            ?>
         <?php if($fd->offer_type==1): ?>
         <div class="carousel-item <?php echo e($active); ?>">
            <div class="offer-img" style="background-image:url('<?php echo e(asset('public/upload/offer/image').'/'.$fd->banner); ?>')">
               <div class="off-text">
                     <div class="real-text">
                        <h1 style="color: <?= Session::get('site_color') ?> !important"><?php echo e($fd->title); ?></h1>
                        <h2><?php echo e($fd->main_title); ?></h2>
                        <?php if($fd->is_product=='1'): ?>
                        <p><?php echo e(__('messages.home_note_1')); ?> <?php echo e($fd->fixed); ?>% <?php echo e(__('messages.home_note_2')); ?></p>
                        <?php endif; ?>
                        <?php if($fd->is_product=='2'): ?>
                        <p><?php echo e(__('messages.home_note_3')); ?><?php echo e($currency); ?><?php echo e($fd->new_price); ?></p>
                        <?php endif; ?>
                        <?php if($fd->is_product=='1'): ?>
                        <a href="<?php echo e(url('productslist').'/'.$fd->category_id.'/0/0'.'/'.$fd->fixed); ?>" style="background: <?= Session::get('site_color') ?> !important">
                        <?php echo e(__('messages.shop_now')); ?>

                        </a>
                        <?php endif; ?>
                        <?php if($fd->is_product=='2'): ?>
                        <a href="<?php echo e(url('viewproduct').'/'.$fd->product_id); ?>" style="background: <?= Session::get('site_color') ?> !important">
                        <?php echo e(__('messages.shop_now')); ?>

                        </a>
                        <?php endif; ?>
                     </div>
               </div>
            </div>
         </div>
         <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
      </a>
   </div>
</div>
<?php endif; ?>
<div class="container">
   <div class="row nor-b">
      <?php $__currentLoopData = $offerdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($fd->offer_type==2): ?>
      <?php $img_url=asset('public/upload/offer/image').'/'.$fd->offer->banner;?>
      <div class="col-md-4 col-12">
         <div class="normal1 text-off" style="background-image:url('<?php echo e($img_url); ?>')">
            <div class="ban-text">
            <h1 style="color: <?= Session::get('site_color') ?> !important"><?php echo e($fd->offer->title); ?></h1>
            <?php if($fd->offer->is_product=='2'): ?>
            <p><?php echo e(__('messages.home_note_3')); ?><?php echo e($currency); ?><?php echo e($fd->offer->new_price); ?></p>
            <?php endif; ?>
            <?php if($fd->offer->is_product=='1'): ?>
            <p><?php echo e(__('messages.home_note_1')); ?> <?php echo e($fd->offer->fixed); ?>% <?php echo e(__('messages.home_note_2')); ?></p>
            <?php endif; ?>
            <?php if($fd->offer->is_product=='2'): ?>
            <a href="<?php echo e(url('viewproduct').'/'.$fd->offer->product_id); ?>" style="background: <?= Session::get('site_color') ?> !important">
            Shop Now
            </a>
            <?php endif; ?>
            <?php if($fd->offer->is_product=='1'): ?>
            <a href="<?php echo e(url('productslist').'/0/'.$fd->offer->category_id.'/0'.'/'.$fd->offer->fixed); ?>" style="background: <?= Session::get('site_color') ?> !important">
            <?php echo e(__('messages.shop_now')); ?>

            </a>
            <?php endif; ?>
         </div>
         </div>
      </div>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </div>
</div>
<div class="container">
   <div class="services-main">
      <div class="row">
         <div class="col-md-3 col-6 services">
            <div class="ser-img" style="background: <?= Session::get('site_color') ?> !important"></div>
            <h1><?php echo e(__('messages.free_delivery')); ?></h1>
            <p><?php echo e(__('messages.home_note_4')); ?></p>
         </div>
         <div class="col-md-3 col-6 services">
            <div class="ser-img-1" style="background: <?= Session::get('site_color') ?> !important"></div>
            <h1><?php echo e(__('messages.home_note_5')); ?></h1>
            <p><?php echo e(__('messages.Feedbacks')); ?></p>
         </div>
         <div class="col-md-3 col-6 services">
            <div class="ser-img-2" style="background: <?= Session::get('site_color') ?> !important"></div>
            <h1><?php echo e(__('messages.Payment')); ?></h1>
            <p><?php echo e(__('messages.secured_sys')); ?></p>
         </div>
         <div class="col-md-3 col-6 services">
            <div class="ser-img-3" style="background: <?= Session::get('site_color') ?> !important"></div>
            <h1><?php echo e(__('messages.support')); ?></h1>
            <p><?php echo e(__('messages.helpline')); ?> -<?php echo e($setting->helpline); ?></p>
         </div>
      </div>
   </div>
</div>
<div class="container">
   <div class="sale-banner">
      <div class="row">
         <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ba): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php if($ba->id==1): ?>
         <div class="col-md-6">
            <div class="sale-banner-1">
               <a href="<?php echo e(url('productslist').'/0/'.$ba->subcategory.'/0/0'); ?>"> <img src="<?php echo e(asset('public/upload/banner/image').'/'.$ba->Image); ?>" class="img-responsive"></a>
               <div class="sale-b-text">
                  <h1><?php echo e($ba->title); ?></h1>
                  <p><?php echo e($ba->subtitle); ?></p>
                  <a href="<?php echo e(url('productslist').'/0/'.$ba->subcategory.'/0/0'); ?>" style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.shop_now')); ?></a>
               </div>
            </div>
         </div>
         <?php endif; ?>   
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <div class="col-md-6">
            <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ba): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($ba->id!=1&&$ba->id!=3): ?>
            <div class="sale-banner-2 col-md-12 p-0">
               <a href="<?php echo e(url('productslist').'/0/'.$ba->subcategory.'/0/0'); ?>"> <img src="<?php echo e(asset('public/upload/banner/image').'/'.$ba->Image); ?>" class="img-responsive"></a>
               <div class="sale-b-text">
                  <h1><?php echo e($ba->title); ?></h1>
                  <p><?php echo e($ba->subtitle); ?></p>
                  <a href="<?php echo e(url('productslist').'/0/'.$ba->subcategory.'/0/0'); ?>" style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.shop_now')); ?></a>
               </div>
            </div>
            <?php endif; ?>   
            <?php if($ba->id!=1&&$ba->id!=2): ?>
            <div class="sale-banner-3 col-md-12 p-0">
               <a href="<?php echo e(url('productslist').'/0/'.$ba->subcategory.'/0/0'); ?>"> <img src="<?php echo e(asset('public/upload/banner/image').'/'.$ba->Image); ?>" class="img-responsive"></a>
               <div class="sale-b-text">
                  <h1><?php echo e($ba->title); ?></h1>
                  <p><?php echo e($ba->subtitle); ?></p>
                  <a href="<?php echo e(url('productslist').'/0/'.$ba->subcategory.'/0/0'); ?>" style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.shop_now')); ?></a>
               </div>
            </div>
            <?php endif; ?>   
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
         </div>
      </div>
   </div>
</div>
<div class="container">
   <div class="product-heading">
      <h1><?php echo e(__('messages.best_selling')); ?></h1>
   </div>
   <div class="product-slider">
      <div id="demo">
         <div class="row pos">
            <div class="customNavigation"> 
               <a class="btn prev" onclick="prevowl()"><i class="fa fa-angle-left" aria-hidden="true"></i></a> 
               <a class="btn next" onclick="nextowl()"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
            <div id="owl-demo" class="owl-carousel">
               <?php $k=1;?>
               <?php $__currentLoopData = $bestselling; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="item col-md-12">
                  <div class="home-bg">
                  <div class="img-background" >
                     <a href="<?php echo e(url('viewproduct/').'/'.$bt['id']); ?>"><img src="<?php echo e(asset('public/upload/product').'/'.$bt['basic_image']); ?>" class="img-responsive" ></a>
                     <div class="img-text">
                        <label class="fancy-checkbox">
                           <?php if(Auth::id()!=""): ?>
                            <input type="checkbox" id="checkdata<?php echo e($k); ?>" name="checkdata" onclick="changewishlist('<?php echo $bt['id'];?>','checkdata<?php echo e($k); ?>')" <?=$bt['wish']==1? ' checked="checked"' : '';?>/>
                           <?php else: ?>
                            <input type="checkbox" id="checkdata<?php echo e($k); ?>" name="checkdata"  data-toggle="modal" data-target="#myModal"/>
                           <?php endif; ?>
                       
                        <big></big>
                        </label>
                        <?php if($bt['discount']!=0): ?>
                        <span><?php echo e($bt['discount']); ?>%</span>
                        <?php endif; ?>
                     </div>
                  </div>
                  <div class="product-text">
                     <h1><?php echo e($bt['name']); ?></h1>
                     <div class="price">
                        <h2><?php echo e($currency.$bt['price']); ?>  
                           <?php if($bt['discount']!=0): ?>
                           <span class="span-mrp"> <?php echo e($currency.$bt['MRP']); ?></span>
                           <?php endif; ?>
                        </h2>
                        <span class="rating">
                        <?php for($i=0;$i<$bt['ratting'];$i++){ ?>
                        <i class="fa fa-star" aria-hidden="true" style="color: <?= Session::get('site_color') ?> !important"></i>
                        <?php }?>
                        <?php for($i=0;$i<(5-$bt['ratting']);$i++){ ?>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <?php }?>
                        </span>
                     </div>
                     <a href="<?php echo e(url('viewproduct/').'/'.$bt['id']); ?>" style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.shop_now')); ?></a>
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
<?php if($sen_offer): ?>
<?php $coll_img=asset('public/upload/offer/image').'/'.$sen_offer->banner;?>
<div class="summer-banner" style="background-image: url('<?php echo e($coll_img); ?>')">
   <div class="container sum-box">
      <div class="summer-text">
         <h1><?php echo e(__('messages.up_to')); ?> <?php echo e($sen_offer->fixed_to); ?>% <?php echo e(__('messages.home_note_2')); ?></h1>
         <p><?php echo e($sen_offer->title); ?></p>
         <a href="<?php echo e(url('productslist').'/'.$sen_offer->category.'/0/0'.'/'.$sen_offer->fixed_to); ?>" style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.shop_now')); ?></a>
      </div>
   </div>
</div>
<?php endif; ?>
<?php if($sepical_cat): ?>
<div class="container">
   <div class="one-product-slider">
      <div class="row">
         <div class="col-md-6">
            <div id="demo1" class="carousel slide slides" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <a href="<?php echo e(url('productslist').'/'.$sepical_cat->category_id.'/0/0/0'); ?>"> <img src="<?php echo e(asset('public/upload/category/image/').'/'.$sepical_cat->image); ?>" alt="Los Angeles" class="img-responsive"></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="one-product-text">
               <h1><?php echo e($sepical_cat->title); ?></h1>
               <p><?php echo e($sepical_cat->description); ?>

               </p>
               <a href="<?php echo e(url('productslist').'/'.$sepical_cat->category_id.'/0/0/0'); ?>" style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.shop_now')); ?></a>
            </div>
         </div>
      </div>
   </div>
</div>
<?php endif; ?>
<div class="container">
   <div class="product-heading">
      <h1><?php echo e(__('messages.feature_product')); ?></h1>
   </div>
   <div class="product-slider">
      <div id="demo1">
         <div class="row pos">
            <div class="customNavigation"> 
               <a class="btn prev" onclick="prevdemo1()"><i class="fa fa-angle-left" aria-hidden="true"></i></a> 
               <a class="btn next" onclick="nextdemo1()"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
            <div id="owl-demo1" class="owl-carousel">
               <?php $k=1;?>
               <?php $__currentLoopData = $featurepro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="item col-md-12">
                  <div class="home-bg">
                  <div class="img-background" >
                     <a href="<?php echo e(url('viewproduct/').'/'.$fe->productdata->id); ?>"> <img src="<?php echo e(asset('public/upload/product').'/'.$fe->productdata->basic_image); ?>" class="img-responsive" ></a>
                     <div class="img-text">
                        <label class="fancy-checkbox">
                             <?php if(Auth::id()!=""): ?>
                              <input type="checkbox" id="checkfe<?php echo e($k); ?>" name="checkdata" onclick="changewishlist('<?php echo e($fe->productdata->id); ?>','checkfe<?php echo e($k); ?>')" <?=$fe->wish==1? ' checked="checked"' : '';?>/>
                             <?php else: ?>
                              <input type="checkbox" id="checkfe<?php echo e($k); ?>" name="checkdata"  <?=$fe->wish==1? ' checked="checked"' : '';?> data-toggle="modal" data-target="#myModal"/>
                             <?php endif; ?>
                       
                        <big></big>
                        </label>
                        <?php if($fe->productdata->discount!=0): ?>
                        <span><?php echo e($fe->productdata->discount); ?>%</span>
                        <?php endif; ?>
                     </div>
                  </div>
                  <div class="product-text">
                     <h1><?php echo e($fe->productdata->name); ?></h1>
                     <div class="price">
                        <h2><?php echo e($currency.$fe->productdata->selling_price); ?>

                           <?php if($fe->productdata->discount!=0): ?>
                           <span class="span-mrp"> <?php echo e($currency.$fe->productdata->MRP); ?></span>
                           <?php endif; ?>
                        </h2>
                        <span class="rating">
                        <?php for($i=0;$i<$fe->avgStar;$i++){ ?>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <?php }?>
                        <?php for($i=0;$i<(5-$fe->avgStar);$i++){ ?>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <?php }?>
                        </span>
                     </div>
                     <a href="<?php echo e(url('viewproduct/').'/'.$fe->productdata->id); ?>" style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.shop_now')); ?></a>
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
<?php echo $__env->make('user.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\client\laravel\shop\resources\views/user/home.blade.php ENDPATH**/ ?>