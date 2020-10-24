 <?php $__env->startSection('content'); ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>
                    <?php if($offer_type==1): ?>
                         <?php echo e(__('messages.add')); ?> <?php echo e(__('messages.big_offer')); ?>

                    <?php endif; ?>
                    <?php if($offer_type==2): ?>
                        <?php echo e(__('messages.add')); ?> <?php echo e(__('messages.normal_offer')); ?>                         
                    <?php endif; ?>
               </h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">
                        <?php if($offer_type==1): ?> <?php echo e(__('messages.add')); ?> <?php echo e(__('messages.big_offer')); ?> <?php endif; ?> <?php if($offer_type==2): ?> <?php echo e(__('messages.add')); ?> <?php echo e(__('messages.normal_offer')); ?> <?php endif; ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">

    <div class="row rowset">

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title"><?php if($offer_type==1): ?>
                         <?php echo e(__('messages.add')); ?> <?php echo e(__('messages.big_offer')); ?> 
                    <?php endif; ?>
                    <?php if($offer_type==2): ?>
                        <?php echo e(__('messages.add')); ?> <?php echo e(__('messages.normal_offer')); ?> 
                    <?php endif; ?></strong>
                </div>
                <div class="card-body">
                    <div id="pay-invoice">
                        <div class="card-body">
                            <?php if(Session::has('message')): ?>
                            <div class="col-sm-12">
                                <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <?php endif; ?>

                            <form action="<?php echo e(url('admin/storeofferdata')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="offer_type" id="offer_type" value="<?php echo e($offer_type); ?>" />
                                <div class="row form-group">

                                    <div class="col col-md-8">
                                        <label class=" form-control-label"><?php echo e(__('messages.offer_on')); ?>:-</label>
                                        <div class="form-check-inline form-check">

                                            <label for="offer_on1" class="form-check-label offernameshow">
                                                <input type="radio" id="offer_on1" name="offer_on" value="1" class="form-check-input" checked onchange="changeofferdiv(this.value)" checked=""> <?php if($offer_type==1): ?> <?php echo e(__('messages.cate_gory')); ?> <?php else: ?> Subcategory <?php endif; ?>
                                            </label>
                                            <label for="offer_on2" class="form-check-label offernameshow">
                                                <input type="radio" id="offer_on2" name="offer_on" value="2" class="form-check-input" onchange="changeofferdiv(this.value)"><?php echo e(__('messages.product')); ?>

                                            </label>
                                             <?php if($offer_type==2): ?> 
                                              <label for="offer_on2" class="form-check-label offernameshow">
                                                <input type="radio" id="offer_on2" name="offer_on" value="3" class="form-check-input" onchange="changeofferdiv(this.value)"><?php echo e(__('messages.coupon')); ?>

                                            </label>
                                             <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div id="categorydiv">
                                    <div class="form-group col-md-12 paddiv">
                                        <div class="col-md-6 pl0">
                                            <label for="name" class=" form-control-label">
                                                <?php if($offer_type==1): ?> <?php echo e(__('messages.cate_gory')); ?> <?php else: ?> <?php echo e(__('messages.subcategory')); ?> <?php endif; ?>
                                                <span class="reqfield">*</span>
                                            </label>
                                            <select name="category_id" id="category_id" class="form-control" required>
                                                <option value=""> <?php echo e(__('messages.select')); ?></option>
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($ca->id); ?>" ><?php echo e($ca->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 pr0">
                                            <div class="form-group">
                                                <label for="name" class=" form-control-label">
                                                    <?php echo e(__('messages.fixed_up_to')); ?>(%)
                                                    <span class="reqfield">*</span>
                                                </label>
                                                <input type="text" id="fixed" placeholder="50" class="form-control" name="fixed" onchange="checkfixed(this.value)" required="">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div id="productdiv" class="disno">
                                    <div class="form-group col-md-12 paddiv">
                                        <div class="col-md-9 pl0">
                                            <label for="name" class=" form-control-label">
                                                <?php echo e(__('messages.product')); ?>

                                                <span class="reqfield">*</span>
                                            </label>
                                            <select name="product_id" id="product_id" class="form-control" onchange="getproductprice(this.value)">
                                                <option value=""><?php echo e(__('messages.select_product')); ?></option>
                                                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($pro->id); ?>"><?php echo e($pro->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 paddiv">
                                        <div class="col-md-4 pl0">
                                            <label for="name" class=" form-control-label">
                                                <?php echo e(__('messages.MRP')); ?>

                                            </label>
                                            <input type="text" id="mrp" class="form-control" name="mrp" readonly>
                                        </div>
                                        <div class="col-md-4 pl0">
                                            <label for="name" class=" form-control-label">
                                                <?php echo e(__('messages.selling_price')); ?>

                                            </label>
                                            <input type="text" id="selling_price" class="form-control" name="selling_price" readonly>
                                        </div>
                                        <div class="col-md-4 pl0">
                                            <label for="name" class=" form-control-label">
                                                <?php echo e(__('messages.offer_price')); ?><span class="reqfield">*</span>
                                            </label>
                                            <input type="text" id="offer_price" class="form-control" name="offer_price" onchange="checkofferprice(this.value)">
                                        </div>
                                    </div>
                                </div>
                                <div id="coupondiv" class="disno">
                                     <div class="form-group col-md-12 paddiv">
                                        <div class="col-md-9 pl0">
                                            <label for="name" class=" form-control-label">
                                                <?php echo e(__('messages.coupon')); ?>

                                                <span class="reqfield">*</span>
                                            </label>
                                            <select name="coupon_id" id="coupon_id" class="form-control" onchange="getcoupondata(this.value)">
                                                <option value=""><?php echo e(__('messages.select')); ?></option>
                                                <?php $__currentLoopData = $coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($pro->id); ?>"><?php echo e($pro->name); ?>(<?php echo e($pro->code); ?>)</option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-4 pl0">
                                            <label for="name" class=" form-control-label">
                                                <?php echo e(__('messages.value')); ?>

                                            </label>
                                            <input type="text" readonly id="coupon_discount_value" class="form-control" name="coupon_discount_value">
                                    </div>
                                </div>
                                <div class="form-group col-md-12 paddiv">
                                    <div class="col-md-6 pl0">
                                        <label for="name" class=" form-control-label">
                                            <?php echo e(__('messages.offers')); ?><?php echo e(__('messages.start_date')); ?>

                                            <span class="reqfield">*</span>
                                        </label>
                                        <input type="text" id="start_date" class="form-control" name="start_date" required>
                                    </div>
                                    <div class="col-md-6 pr0">
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">
                                                <?php echo e(__('messages.offers')); ?><?php echo e(__('messages.end_date')); ?>

                                                <span class="reqfield">*</span>
                                            </label>
                                            <input type="text" id="end_date" class="form-control" name="end_date" required>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group col-md-12 paddiv">
                                    <label for="name" class=" form-control-label">
                                        <?php echo e(__('messages.title')); ?>

                                        <span class="reqfield">*</span>
                                    </label>
                                    <input type="text" id="title" placeholder="Enter Title" class="form-control" name="title" required>
                                </div>
                                <div class="form-group col-md-12 paddiv">
                                    <label for="name" class=" form-control-label">
                                        <?php echo e(__('messages.main_title')); ?>

                                        <span class="reqfield">*</span>
                                    </label>
                                    <input type="text" id="main_title" placeholder="Enter Main Title" class="form-control" name="main_title" required>
                                </div>

                                <div class="form-group col-md-12 paddiv">
                                    <label for="name" class=" form-control-label">
                                        <?php echo e(__('messages.banner')); ?> <?php if($offer_type==1): ?> (635X370) <?php endif; ?> <?php if($offer_type==2): ?> (445X170) <?php endif; ?>

                                        <span class="reqfield">*</span>
                                    </label>
                                    <input type="file" id="banner" class="form-control" name="banner" required>
                                </div>
                                
                                <?php if($offer_type==1): ?>
                                         <div class="form-group col-md-12 paddiv">
                                             <label for="name" class=" form-control-label">
                                                 <?php echo e(__('messages.mobile_banner')); ?> 
                                           <span class="reqfield">*</span>
                                    </label>
                                    <?php if($offer_type==1): ?>
                                       <input type="file" id="mobile_banner" class="form-control" name="mobile_banner" required>
                                    <?php else: ?>
                                       <input type="file" id="mobile_banner" class="form-control" name="mobile_banner" >
                                    <?php endif; ?>
                                    
                                </div> 
                                <?php endif; ?>

                                <div>
                                    <button class="btn btn-primary florig" type="submit"><?php echo e(__('messages.submit')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views\admin\offer\offeradd.blade.php ENDPATH**/ ?>