 <?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
    <div class="col-sm-4 float-right-1">
      <div class="page-header float-left float-right-1">
            <div class="page-title">
                <h1><?php echo e(__('messages.offers')); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8 float-left-1">
      <div class="page-header float-right float-left-1">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><?php echo e(__('messages.offers')); ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    
        <div class="col-12">
            <div class="card">
                <div class="card-body"><?php if(Session::has('message')): ?>
                    <div class="col-sm-12">
                        <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div><?php endif; ?>
                    <button onclick="addoffer(2)" class="btn btn-primary btn-flat m-b-30 m-t-30"><?php echo e(__('messages.add')); ?> <?php echo e(__('messages.normal_offer')); ?></button>
                    <div id="graphicalview " class="mrgtop30">
                        <div class="container">
                            <div class="slider-section">
                                <div class="col-md-12">
                                <div class="row">
                                       <?php if(isset($data[0])): ?>
                                        <div class="col-md-4 banner-1 mrg30">
                                            <img src="<?php echo e(asset('public/upload/offer/image').'/'.$data[0]); ?>" alt="" class="img-responsive">
                                            <div class="banner-text"></div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(isset($data[1])): ?>
                                        <div class=" col-md-4 banner-2 mrg30">
                                            <img src="<?php echo e(asset('public/upload/offer/image').'/'.$data[1]); ?>" alt="" class="img-responsive" >
                                            <div class="banner-text"></div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(isset($data[2])): ?>
                                        <div class=" col-md-4 banner-2 mrg30">
                                            <img src="<?php echo e(asset('public/upload/offer/image').'/'.$data[2]); ?>" alt="" class="img-responsive">
                                            <div class="banner-text"></div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive dtdiv">
                        <table id="normalofferTable" class="table table-striped table-bordered dttablewidth">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('messages.id')); ?></th>
                                    <th><?php echo e(__('messages.banner')); ?></th>
                                    <th><?php echo e(__('messages.title')); ?></th>
                                    <th><?php echo e(__('messages.date')); ?></th>
                                    <th><?php echo e(__('messages.offer_on')); ?></th>
                                    <th><?php echo e(__('messages.name')); ?></th>
                                    <th><?php echo e(__('messages.offer_price')); ?></th>
                                    <th><?php echo e(__('messages.action')); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views\admin\offer\normaloffer.blade.php ENDPATH**/ ?>