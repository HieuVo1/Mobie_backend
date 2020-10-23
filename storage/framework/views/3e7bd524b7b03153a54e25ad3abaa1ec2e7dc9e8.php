 <?php $__env->startSection('content'); ?>

<div class="breadcrumbs">
    <div class="col-sm-4 float-right-1">
      <div class="page-header float-left float-right-1">
            <div class="page-title">
                <h1><?php echo e(__('messages.current_deals')); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8 float-left-1">
      <div class="page-header float-right float-left-1">
            <div class="page-title">
                <ol class="breadcrumb text-right">

                    <li class="active"><?php echo e(__('messages.current_deals')); ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">

        <div class="col-12">
            <div class="card">
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
                    <div class="col-md-12 mrg30">
                        <input type="hidden" id="currentdiv" value="1" />
                    </div>
                    <div id="tableview">
                        <div id="editdeal" class="disno col-md-12 p-0">

                            <input type="hidden" name="id" id="id">
                            <div class="form-group col-lg-3 col-md-5 col-sm-6 paddiv float-right-1">
                                <label for="name" class=" form-control-label">
                                    <?php echo e(__('messages.offers')); ?>

                                    <span class="reqfield">*</span>
                                </label>
                                <select name="offer_id" id="offer_id" class="form-control">
                                    <option></option>
                                </select>
                            </div>

                            <div class="col-md-3 col-sm-3 all-b float-right-1">
                                <button class="btn btn-primary mrgtop30" type="button" onclick="changedeals()"> <?php echo e(__('messages.submit')); ?></button>
                            </div>

                        </div>
                    </div>
                    <div class="table-responsive dtdiv">
                        <table id="dealsTable" class="table table-striped table-bordered dttablewidth">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('messages.id')); ?></th>
                                    <th><?php echo e(__('messages.banner')); ?></th>
                                    <th><?php echo e(__('messages.title')); ?></th>
                                    <th><?php echo e(__('messages.date')); ?></th>
                                    <th><?php echo e(__('messages.deals')); ?></th>
                                    <th><?php echo e(__('messages.action')); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</div>
<input type="hidden" id="offer_deal_lang" value="<?php echo e(__('messages.offer_deal_lang')); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\UploadingContentV1.0\PHPScript\PHPScript\resources\views/admin/offer/deals.blade.php ENDPATH**/ ?>