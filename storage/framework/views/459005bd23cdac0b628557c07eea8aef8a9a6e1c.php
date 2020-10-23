<?php $__env->startSection('title'); ?>
<?php echo e(__('messages.product_ls')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
   input.my-checkbox:checked{
      background-color:<?= Session::get('site_color') ?> !important;
   }
</style>
 <div class="loader"  id="loader"></div>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<div class="shop-color">
   <div class="container my-container">
      <div class="row">
         <div class="shop-filter">
            <div class="ep-fillter">
               <input type="hidden" name="code" id="code_search" value="<?=isset($_GET['cd'])?$_GET['cd']:''; ?>" />
               <input type="hidden" name="search" id="search" value="<?=isset($_GET['s'])?$_GET['s']:''; ?>" />
               <div class="brands">
                  <button type="button" class="btn" data-toggle="collapse" data-target="#demo12"><?php echo e(__('messages.subcategory')); ?>

                  <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </button>
                  <div id="demo12" class="collapse show">
                     <?php $i=0;?>
                     <?php $__currentLoopData = $lssub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="brand-check">
                        <div class="check-shop">
                           <input type="radio" class="my-checkbox" value="<?php echo e($sub->id); ?>" id="subcategory<?php echo e($i); ?>" name="subcategory" <?=$subcategory ==$sub->id ? ' checked="checked"' : '';?> onchange="changeproductlist()">
                           <lable><?php echo e($sub->name); ?></lable>
                        </div>
                     </div>
                     <?php $i++;?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
               </div>
               <div class="brands">
                  <button type="button" class="btn" data-toggle="collapse" data-target="#demo"><?php echo e(__('messages.brands')); ?>

                  <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </button>
                  <div id="demo" class="collapse show">
                     <div class="brand-check">
                        <?php $__currentLoopData = $brandls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="check-shop">
                           <input type="radio" class="my-checkbox" value="<?php echo e($brn); ?>" name="brand" id="brand" <?=$brand ==$brn ? ' checked="checked"' : '';?> onchange="changeproductlist()">
                           <lable><?php echo e($brn); ?></lable>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                  </div>
               </div>
               <?php if(!empty($pricels)): ?>
               <div class="brands">
                  <button type="button" class="btn" data-toggle="collapse" data-target="#demo-2"><?php echo e(__('messages.price')); ?>

                  <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </button>
                  <div id="demo-2" class="collapse show">
                     <div class="brand-check">
                        <?php $__currentLoopData = $pricels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="check-shop">
                           <input type="radio" class="my-checkbox" name="pricesel" onchange="changeproductlist()" value="<?php echo e($pls); ?>">
                           <lable>$<?php echo e($pls); ?></lable>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
               <div class="brands">
                  <button type="button" class="btn" data-toggle="collapse" data-target="#demo-3"><?php echo e(__('messages.review')); ?>

                  <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </button>
                  <div id="demo-3" class="collapse show">
                     <div class="brand-check">
                        <div class="check-shop">
                           <input type="radio" class="my-checkbox" value="5" name="ratting" onchange="changeproductlist()">
                           <lable>
                              <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                           </lable>
                        </div>
                        <div class="check-shop">
                           <input type="radio" class="my-checkbox" value="4" name="ratting" onchange="changeproductlist()">
                           <lable>
                              <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important"aria-hidden="true"></i>
                              <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important"aria-hidden="true"></i>
                              <i class="fa fa-star-o" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                           </lable>
                        </div>
                        <div class="check-shop">
                           <input type="radio" class="my-checkbox" value="3" name="ratting" onchange="changeproductlist()">
                           <lable>
                              <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star-o" style="color: <?= Session::get('site_color') ?> !important"aria-hidden="true"></i>
                              <i class="fa fa-star-o" style="color: <?= Session::get('site_color') ?> !important"aria-hidden="true"></i>
                           </lable>
                        </div>
                        <div class="check-shop">
                           <input type="radio" class="my-checkbox" value="2" name="ratting" onchange="changeproductlist()">
                           <lable>
                              <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star-o" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star-o" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star-o" style="color: <?= Session::get('site_color') ?> !important"aria-hidden="true"></i>
                           </lable>
                        </div>
                        <div class="check-shop">
                           <input type="radio" class="my-checkbox" value="1" name="ratting" onchange="changeproductlist()">
                           <lable>
                              <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star-o" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star-o" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star-o" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                              <i class="fa fa-star-o" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                           </lable>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="brands">
                  <button type="button" class="btn" data-toggle="collapse" data-target="#demo-color"><?php echo e(__('messages.color')); ?>

                  <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </button>
                  <div id="demo-color" class="collapse show">
                     <div class="brand-radio">
                        <ul class="colors colorslist-1 checkboxcolor">
                           <?php $i=0;?>
                           <?php $__currentLoopData = $colorarr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coarr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <li id="changeli<?php echo e($i); ?>" onclick="changeactive('<?php echo e($i); ?>')">
                              <input type="radio" id="customcolor<?php echo e($i); ?>" name="colorchk" value="<?php echo e($coarr); ?>"  class="color-1" style="background:<?php echo $coarr;?>" onchange="changeproductlist()">
                           </li>
                           <?php $i++;?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <input type="hidden" name="totalcolor" id="totalcolor" value="<?php echo e($i); ?>">
                     </div>
                  </div>
               </div>
               <?php if(!empty($pricels)): ?>
               <div class="brands">
                  <button type="button" class="btn" data-toggle="collapse" data-target="#demo-size"><?php echo e(__('messages.Size')); ?>

                  <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </button>
                  <div id="demo-size" class="collapse show">
                     <div class="brand-check">
                        <?php $__currentLoopData = $sizearr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="check-shop">
                           <input type="radio" class="my-checkbox" name="sizechk" onchange="changeproductlist()" value="<?php echo e($pls); ?>">
                           <lable><?php echo e($pls); ?></lable>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
            </div>
         </div>
         <div class="product">
            <div class="shop-head">
               <input type="hidden" name="categoryid" id="categoryid" value="<?=isset($categorydata->id)?$categorydata->id:'0'; ?>">
               <input type="hidden" name="discount" id="discount" value="<?php echo e($discount); ?>">
               <h1><a href="<?php echo e(url('/')); ?>" style="color: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.home')); ?> </a>/<?=isset($categorydata->name)?$categorydata->name:''; ?> </h1>
               <p><span id="totalresult"><?php echo e(__('messages.show_note1')); ?> <?php echo e(count($productlist)); ?> <?php echo e(__('messages.pro_of')); ?> <?php echo e(count($productlist)); ?> <?php echo e(__('messages.product')); ?> </span><span id="searchme"><?=isset($_GET['cd'])?"<b>".__('messages.coupon').":</b>".$_GET['cd']:''; ?></span><span id="search"><?=isset($_GET['s'])?"<b>".__('messages.search').":</b>".$_GET['s']:''; ?></span>
               <div class="Sort"></p>
                  <ul>
                     <h1><?php echo e(__('messages.sort_by')); ?> :</h1>
                     <li><a id="sort1" href="javascript:void(0);" class="active-2" onclick="changesort(1)"><?php echo e(__('messages.Popalarity')); ?></a></li>
                     <li><a id="sort2" href="javascript:void(0);" onclick="changesort(2)"><?php echo e(__('messages.PLTH')); ?></a></li>
                     <li><a id="sort3" href="javascript:void(0);" onclick="changesort(3)"><?php echo e(__('messages.PHTL')); ?></a></li>
                     <li><a id="sort4" href="javascript:void(0);" onclick="changesort(4)"><?php echo e(__('messages.newest')); ?></a></li>
                  </ul>
               </div>
            </div>
            <p id="productfiltercompare">
            <div class="shop-product" id="productlistdata">
               <?php $k=1;?>
               <?php $__currentLoopData = $productlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="pro-1" >
                  <div class="product-box">
                    <?php if($p->stock=='0'): ?>
                     <div class="out_of_sb">
                        <span><?php echo e(__('messages.outstock')); ?></span>
                     </div>
                    <?php endif; ?>
                     <div class="pro-img">
                          <figure class="preview-image">
                        <a href="<?php echo e(url('viewproduct/').'/'.$p->id); ?>"> <img src="<?php echo e(asset('public/upload/product').'/'.$p->basic_image); ?>" class="img-responsive"></a>
                        <div class="preview-image-overlay">
                           <button type="button" onclick="quickview('<?php echo e($p->id); ?>')">
                                <?php echo e(__('messages.Quick View')); ?>

                           </button>
                        </div>
                     </figure>
                  
                        <div class="img-text">
                           <label class="fancy-checkbox">
                               <?php if(Auth::id()!=""): ?>
                           <input type="checkbox" id="checkda<?php echo e($k); ?>" name="checkdata" onclick="changewishlist('<?php echo e($p->id); ?>','checkda<?php echo e($k); ?>')" <?=$p->wish==1? ' checked="checked"' : '';?>/>
                           <?php else: ?>
                            <input type="checkbox" id="checkda<?php echo e($k); ?>" name="checkdata"  onclick="removewishselect('checkda<?php echo e($k); ?>')" data-toggle="modal" data-target="#myModal"/>
                           <?php endif; ?>
                          <big id="wishfavor<?php echo e($p->id); ?>"></big>
                           </label>
                           <i class="fa fa-spinner loadlconwish" aria-hidden="true" id="loading<?php echo e($p->id); ?>" ></i>
                           <span><?php echo e($p->disper); ?>%</span>
                        </div>
                     </div>
                     <div class="text-s-box">
                        <h1><?php echo e($p->name); ?></h1>
                        <span class="rating">
                        <?php for($i=0;$i<$p->avgStar;$i++){ ?>
                        <i class="fa fa-star" aria-hidden="true" style="color: <?= Session::get('site_color') ?> !important"></i>
                        <?php }?>
                        <?php for($i=0;$i<(5-$p->avgStar);$i++){ ?>
                        <i class="fa fa-star-o" aria-hidden="true" style="color: <?= Session::get('site_color') ?> !important"></i>
                        <?php }?>
                        </span>
                        <span class="review">
                        (<?php echo e($p->total_review); ?> <?php echo e(__('messages.review')); ?>)
                        </span>
                        <span class="compare_icon"> 
                           <a href="javascript:addcomapre('<?=$p->id?>','productfiltercompare')"><img src="<?php echo e(asset('public/Ecommerce/images/compare.png')); ?>"></a>
                        </span>
                        <div class="price">
                           <h2><?php echo e(Session::get("currency")); ?><?php echo e($p->price); ?></h2>
                           <span ><?php echo e(Session::get("currency")); ?><?php echo e($p->MRP); ?></span>
                             <?php if($p->stock!=='0'): ?>
                               <a href="<?php echo e(url('viewproduct/').'/'.$p->id); ?>" style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.shop_now')); ?></a>
                           <?php endif; ?>
                        </div>
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

<?php echo $__env->make('user.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project\shop\resources\views/user/product/productlist.blade.php ENDPATH**/ ?>