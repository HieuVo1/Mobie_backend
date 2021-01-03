 <?php $__env->startSection('content'); ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>
                     <?php if($data->offer_type=='1'): ?>
                         <?php echo e(__('messages.edit')); ?> <?php echo e(__('messages.big_offer')); ?>

                    <?php endif; ?>
                    <?php if($data->offer_type=='2'): ?>
                         <?php echo e(__('messages.edit')); ?> <?php echo e(__('messages.normal_offer')); ?>

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
                        <?php if($data->offer_type=='1'): ?> <?php echo e(__('messages.edit')); ?> <?php echo e(__('messages.big_offer')); ?> <?php endif; ?> <?php if($data->offer_type=='2'): ?> <?php echo e(__('messages.edit')); ?> <?php echo e(__('messages.normal_offer')); ?> <?php endif; ?>
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
                    <strong class="card-title">  <?php if($data->offer_type=='1'): ?>
                        <?php echo e(__('messages.edit')); ?> <?php echo e(__('messages.big_offer')); ?>

                    <?php endif; ?>
                    <?php if($data->offer_type=='2'): ?>
                         <?php echo e(__('messages.edit')); ?> <?php echo e(__('messages.normal_offer')); ?>

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
                            <form action="<?php echo e(url('admin/updateofferdata')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" id="id" value="<?php echo e($data->id); ?>" />
                                <input type="hidden" name="real_image" id="real_image" value="<?php echo e($data->banner); ?>" />
                                <input type="hidden" name="offer_type" id="offer_type" value="<?php echo e($data->offer_type); ?>" />

                                <input type="hidden" name="offer_on" id="offer_on" value="<?php echo e($data->is_product); ?>" />
                                <div class="row form-group">

                                    <div class="col col-md-6">
                                        <label class=" form-control-label"><?php echo e(__('messages.offer_on')); ?>:-</label>
                                        <div class="form-check-inline form-check">
                                            <?php if($data->is_product=='1'): ?> <?php echo e(__('messages.cate_gory')); ?> <?php endif; ?> <?php if($data->is_product=='2'): ?> <?php echo e(__('messages.product')); ?> <?php endif; ?> <?php if($data->is_product=='3'): ?> <?php echo e(__('messages.coupon')); ?> <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                                <?php if($data->is_product=='1'): ?>
                                <div id="categorydiv">
                                    <div class="form-group col-md-12 paddiv">
                                        <div class="col-md-6 pl0">
                                            <label for="name" class=" form-control-label">
                                                <?php echo e(__('messages.cate_gory')); ?>

                                                <span class="reqfield">*</span>
                                            </label>
                                            <select name="category_id" id="category_id" class="form-control" required>
                                                <option value="">
                                                    <?php echo e(__('messages.select_category')); ?>

                                                </option>
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($ca->id); ?>" <?=$data->category_id ==$ca->id ? ' selected="selected"' : '';?>><?php echo e($ca->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 pl0">
                                            <div class="form-group">
                                                <label for="name" class=" form-control-label">
                                                    <?php echo e(__('messages.fixed_up_to')); ?>(%)
                                                    <span class="reqfield">*</span>
                                                </label>
                                                <input type="text" id="fixed" placeholder="50" class="form-control" name="fixed" value="<?php echo e($data->fixed); ?>" required onchange="checkfixed(this.value)">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?> <?php if($data->is_product=='2'): ?>
                                <div id="productdiv">
                                    <div class="form-group col-md-12 paddiv">
                                        <div class="col-md-9 pl0">
                                            <label for="name" class=" form-control-label">
                                                <?php echo e(__('messages.product')); ?>

                                                <span class="reqfield">*</span>
                                            </label>
                                            <select name="product_id" id="product_id" class="form-control" onchange="getproductprice(this.value)">
                                                <option value=""><?php echo e(__('messages.select')); ?> <?php echo e(__('messages.product')); ?></option>
                                                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($pro->id); ?>" <?=$data->product_id ==$pro->id ? ' selected="selected"' : '';?>><?php echo e($pro->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 paddiv">
                                        <div class="col-md-4 pl0">
                                            <label for="name" class=" form-control-label">
                                                <?php echo e(__('messages.MRP')); ?>

                                            </label>
                                            <input type="text" id="mrp" class="form-control" name="mrp" readonly value="<?php echo e($mrp); ?>">
                                        </div>
                                        <div class="col-md-4 pl0">
                                            <label for="name" class=" form-control-label">
                                                <?php echo e(__('messages.selling_price')); ?>

                                            </label>
                                            <input type="text" id="selling_price" class="form-control" name="selling_price" readonly value="<?php echo e($price); ?>">
                                        </div>
                                        <div class="col-md-4 pl0">
                                            <label for="name" class=" form-control-label">
                                                <?php echo e(__('messages.offer_price')); ?><span class="reqfield">*</span>
                                            </label>
                                            <input type="text" id="offer_price" class="form-control" name="offer_price" onchange="checkofferprice(this.value)" value="<?php echo e($data->new_price); ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if($data->is_product=='3'): ?>
                                 <div id="coupondiv">
                                     <div class="form-group col-md-12 paddiv">
                                        <div class="col-md-9 pl0">
                                            <label for="name" class=" form-control-label">
                                                <?php echo e(__('messages.coupon')); ?>

                                                <span class="reqfield">*</span>
                                            </label>
                                            <select name="coupon_id" id="coupon_id" class="form-control" onchange="getcoupondata(this.value)">
                                                <option value=""><?php echo e(__('messages.select')); ?></option>
                                                <?php $__currentLoopData = $coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($pro->id); ?>" <?=$data->coupon_id ==$pro->id ? ' selected="selected"' : '';?>><?php echo e($pro->name); ?>(<?php echo e($pro->code); ?>)</option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-md-4 pl0">
                                            <label for="name" class=" form-control-label">
                                                <?php echo e(__('messages.value')); ?>

                                            </label>
                                            <?php if(isset($coupondata)&&$coupondata->discount_type=='1'){
                                                        $coupondata->value=$coupondata->value."%";
                                                  }

                                            ?>
       
                                            <input type="text" readonly id="coupon_discount_value" class="form-control" name="coupon_discount_value" value="<?=isset($coupondata->name)?$coupondata->name:''; ?>">
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="form-group col-md-12 paddiv">
                                    <div class="col-md-6 pl0">
                                        <label for="name" class=" form-control-label">
                                            <?php echo e(__('messages.offers')); ?><?php echo e(__('messages.start_date')); ?>

                                            <span class="reqfield">*</span>
                                        </label>
                                        <input type="text" id="start_date" class="form-control" name="start_date" required value="<?php echo e($data->start_date); ?>">
                                    </div>
                                    <div class="col-md-6 pr0">
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">
                                                <?php echo e(__('messages.offers')); ?><?php echo e(__('messages.end_date')); ?>

                                                <span class="reqfield">*</span>
                                            </label>
                                            <input type="text" id="end_date" class="form-control" name="end_date" required value="<?php echo e($data->end_date); ?>">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group col-md-12 paddiv">
                                    <label for="name" class=" form-control-label">
                                        <?php echo e(__('messages.title')); ?>

                                        <span class="reqfield">*</span>
                                    </label>
                                    <input type="text" id="title" placeholder="<?php echo e(__('messages.title')); ?>" class="form-control" name="title" required value="<?php echo e($data->title); ?>">
                                </div>

                                <div class="form-group col-md-12 paddiv">
                                    <label for="name" class=" form-control-label">
                                        <?php echo e(__('messages.main_title')); ?>

                                        <span class="reqfield">*</span>
                                    </label>
                                    <input type="text" id="main_title" placeholder="Enter Main Title" class="form-control" name="main_title" required value="<?php echo e($data->main_title); ?>">
                                </div>

                                <div class="form-group col-md-12 paddiv">
                                    <label for="name" class=" form-control-label">
                                        <?php echo e(__('messages.banner')); ?> <?php if($data->offer_type=='1'): ?> (1110X424) <?php endif; ?> <?php if($data->offer_type=='2'): ?> (445X170) <?php endif; ?>
                                        <span class="reqfield">*</span>
                                    </label>
                                    <img src="<?php echo e(asset('upload/offer/image').'/'.$data->banner); ?>" class="imgsize" />
                                    <input type="file" id="banner" class="form-control" name="banner">
                                </div>
                                  <?php if($data->offer_type==1): ?>
                                         <div class="form-group col-md-12 paddiv">
                                             <label for="name" class=" form-control-label">
                                                 <?php echo e(__('messages.mobile_banner')); ?> 
                                           <span class="reqfield">*</span>
                                    </label>
                                    <img src="<?php echo e(asset('upload/offer/image').'/'.$data->mobile_banner); ?>" class="imgsize" />
                                    <input type="file" id="mobile_banner" class="form-control" name="mobile_banner" >
                                    <input type="hidden" name="real_mobile_image" id="real_mobile_image" value="<?php echo e($data->mobile_banner); ?>">
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
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hieuvo/Desktop/PHPScript/resources/views/admin/offer/editoffer.blade.php ENDPATH**/ ?>