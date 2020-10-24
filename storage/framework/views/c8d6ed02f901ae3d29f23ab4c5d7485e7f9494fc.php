 <?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<div class="breadcrumbs">
    <div class="col-sm-4 float-right-1">
        <div class="page-header float-left float-right-1">
            <div class="page-title">
                <h1><?php echo e(__('messages.banner')); ?>

            </h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8 float-left-1">
        <div class="page-header float-right float-left-1">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><?php echo e(__('messages.banner')); ?>

                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-6 ban col-md-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 banner1 b2">
                            <?php 
                        if(empty($img1)){ ?>
                                <img id="thumbImg1" src="<?php echo e(asset('demo.jpg')); ?>" class=" z-depth-1-half thumb-pic" alt="">
                                <?php  }else{?>
                                    <img id="thumbImg1" src="<?php echo e(asset('public/upload/banner/image').'/'.$img1); ?>" class=" z-depth-1-half thumb-pic" alt="">
                                    <?php }  ?>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="banner2">
                                <?php 
                           if(empty($img1)){ ?>
                                    <img id="thumbImg2" src="<?php echo e(asset('demo-1.jpg')); ?>" class=" z-depth-1-half thumb-pic" alt="">
                                    <?php  }else{?>
                                        <img id="thumbImg2" src="<?php echo e(asset('public/upload/banner/image').'/'.$img2); ?>" class=" z-depth-1-half thumb-pic" alt="">
                                        <?php }  ?>
                            </div>
                            <div class="banner3 b2">
                                <?php
                           if(empty($img1)){ ?>
                                    <img id="thumbImg3" src="<?php echo e(asset('demo-1.jpg')); ?>" class=" z-depth-1-half thumb-pic" alt="">
                                    <?php  }else{?>
                                        <img id="thumbImg3" src="<?php echo e(asset('public/upload/banner/image').'/'.$img3); ?>" class=" z-depth-1-half thumb-pic" alt="">
                                        <?php }  ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?php echo e(__('messages.ban_upload_sec')); ?>

                        </div>
                        <form id="imageUploadForm" action="<?php echo e(url('admin/updatebanner')); ?>" enctype="multipart/form-data" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="file-input" class=" form-control-label"><?php echo e(__('messages.Banner_1')); ?>:-
                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="file-input" class=" form-control-label"><?php echo e(__('messages.title')); ?>

                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="text" name="title1" id="title1" class="form-control" value="<?=isset($bannerdata[0]->title)?$bannerdata[0]->title:'0'; ?>" required placeholder="DESIGNER BAGS">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="file-input" class=" form-control-label"><?php echo e(__('messages.sub_title')); ?>

                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="text" name="subtitle1" id="subtitle1" class="form-control" required value="<?=isset($bannerdata[0]->subtitle)?$bannerdata[0]->title:'0'; ?>" placeholder="Be the first to get what’s new">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="file-input" class=" form-control-label"><?php echo e(__('messages.subcategory')); ?>

                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <select class="form-control" name="subcategory1" id="subcategory1" required>
                                            <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $su): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($su->id); ?>" <?=isset($bannerdata[0]->subcategory)&&$bannerdata[0]->subcategory ==$su->id? ' selected="selected"' : '';?>> <?php echo e($su->name); ?>

                                            </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="file-input" class=" form-control-label"><?php echo e(__('messages.banner')); ?> (542X708)
                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="file" name="photo1" id="upload_image1" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="file-input" class=" form-control-label"><?php echo e(__('messages.Banner_2')); ?>:-
                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="file-input" class=" form-control-label"><?php echo e(__('messages.title')); ?>

                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="text" required name="title2" id="title2" class="form-control" placeholder="DESIGNER BAGS" value="<?=isset($bannerdata[1]->title)?$bannerdata[1]->title:'0'; ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="file-input" class=" form-control-label"><?php echo e(__('messages.sub_title')); ?>

                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="text" required name="subtitle2" id="subtitle2" class="form-control" value="<?=isset($bannerdata[1]->subtitle)?$bannerdata[1]->title:'0'; ?>" placeholder="Be the first to get what’s new">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="file-input" class=" form-control-label"><?php echo e(__('messages.subcategory')); ?>

                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <select class="form-control" required name="subcategory2" id="subcategory2">
                                            <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $su): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($su->id); ?>" <?=isset($bannerdata[1]->subcategory)&&$bannerdata[1]->subcategory ==$su->id? ' selected="selected"' : '';?>> <?php echo e($su->name); ?>

                                            </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="file-input" class=" form-control-label"><?php echo e(__('messages.banner')); ?> (542X708)
                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="file" name="photo2" id="upload_image2" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="file-input" class=" form-control-label"><?php echo e(__('messages.Banner_3')); ?>:-
                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="file-input" class=" form-control-label"><?php echo e(__('messages.title')); ?>

                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="text" required name="title3" id="title3" class="form-control" placeholder="DESIGNER BAGS" value="<?=isset($bannerdata[2]->title)?$bannerdata[2]->title:'0'; ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="file-input" class=" form-control-label"><?php echo e(__('messages.sub_title')); ?>

                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="text" required name="subtitle3" id="subtitle3" class="form-control" value="<?=isset($bannerdata[2]->subtitle)?$bannerdata[2]->title:'0'; ?>" placeholder="Be the first to get what’s new">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="file-input" class=" form-control-label"><?php echo e(__('messages.subcategory')); ?>

                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <select class="form-control" required name="subcategory3" id="subcategory3">
                                            <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $su): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($su->id); ?>" <?=isset($bannerdata[2]->subcategory)&&$bannerdata[2]->subcategory ==$su->id ? ' selected="selected"' : '';?>> <?php echo e($su->name); ?>

                                            </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label for="file-input" class=" form-control-label"><?php echo e(__('messages.banner')); ?> (542X708)
                                        </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="file" name="photo3" id="upload_image3" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group btncenter">

                                <?php if(Session::get("is_demo")=='1'): ?>
                                 <button type="button" onclick="return alert('This function is currently disable as it is only a demo website, in your admin it will work perfect')" class="btn btn-secondary d-flex justify-content-center mt-3 righttag">
                                    <?php echo e(__('messages.save')); ?>

                                </button>
                                <?php else: ?>
                                  <button type="submit" class="btn btn-secondary d-flex justify-content-center mt-3 righttag">
                                    <?php echo e(__('messages.save')); ?>

                                </button>
                                <?php endif; ?>
                              
                                <button type="button" class="btn btn-secondary d-flex justify-content-center mt-3">
                                    <?php echo e(__('messages.cancel')); ?>

                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views\admin\banner\default.blade.php ENDPATH**/ ?>