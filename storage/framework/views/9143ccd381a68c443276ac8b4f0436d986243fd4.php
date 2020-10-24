<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
    <div class="col-sm-4 float-right-1">
      <div class="page-header float-left float-right-1">
        <div class="page-title">
            <h1><?php echo e(__('messages.option')); ?></h1>
        </div>
    </div>
</div>
<div class="col-sm-8 float-left-1">
  <div class="page-header float-right float-left-1">
    <div class="page-title">
        <ol class="breadcrumb text-right">
            <li><a href="#"><?php echo e(__('messages.product')); ?></a></li>
            <li><a href="<?php echo e(url('admin/options')); ?>"><?php echo e(__('messages.option')); ?></a></li>
            <li class="active"><?php echo e(__('messages.add')); ?> <?php echo e(__('messages.option')); ?></li>
        </ol>
    </div>
</div>
</div>
</div>

<div class="content mt-3">
    <div class="rowset">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4><?php echo e(__('messages.add')); ?> <?php echo e(__('messages.option')); ?></h4>
                </div>
                <div class="card-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo e(__('messages.general')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" aria-controls="profile" aria-selected="false"><?php echo e(__('messages.values')); ?></a>
                        </li>

                    </ul>
                    <div class="tab-content pl-3 p-1" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="cmr1">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label"><?php echo e(__('messages.name')); ?><span class="reqfield">*</span></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" required id="name" name="name" placeholder="<?php echo e(__('messages.name')); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label"><?php echo e(__('messages.type')); ?><span class="reqfield">*</span></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="type" required id="type" class="form-control">
                                            <option value=""><?php echo e(__('messages.select')); ?> <?php echo e(__('messages.type')); ?></option>
                                            <option value="1"><?php echo e(__('messages.dropdown')); ?></option>
                                            <option value="2"><?php echo e(__('messages.checkbox')); ?></option>
                                            <option value="3"><?php echo e(__('messages.radiobutton')); ?></option>
                                            <option value="4"><?php echo e(__('messages.multiple_select')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label"><?php echo e(__('messages.required')); ?></label>
                                    </div>
                                    <div class="col col-md-9">
                                        <div class="form-check">
                                            <div class="checkbox">
                                                <label for="checkbox1" class="form-check-label ">
                                                    <input type="checkbox" id="is_required" name="is_required" value="1" class="form-check-input"><?php echo e(__('messages.req_option_msg')); ?>

                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group rowset">
                                    <button type="button" onclick="saveoptionall()" class="btn btn-primary btn-sm">
                                        <?php echo e(__('messages.save')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form action="<?php echo e(url('admin/saveoption')); ?>" method="post" class="cmr1">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="option_name" id="option_name" />
                                <input type="hidden" name="option_type" id="option_type" />
                                <input type="hidden" name="option_required" id="option_required" />
                                <input type="hidden" name="totalrow" id="totalrow" value='1' />
                                <table class="table table-striped cmr1" id="sortable">
                                    <thead>
                                        <tr class="tdnew">
                                            <td></td>
                                            <td><?php echo e(__('messages.label')); ?></td>
                                            <td><?php echo e(__('messages.price')); ?></td>
                                            <td><?php echo e(__('messages.price_type')); ?></td>
                                            <td></td>
                                        </tr>
                                    </thead>

                                    <tbody id="lstable">
                                        <tr id="row1">
                                            <td><i class="ti-layout-grid4-alt"></i></td>
                                            <td data-id="1">
                                                <input type="text" required id="label_1" name="label[]" placeholder="" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" id="price_1" name="price[]" placeholder="" class="form-control">
                                            </td>
                                            <td>
                                                <select name="price_type[]" required id="price_type_1" class="form-control">
                                                    <option value="1"><?php echo e(__('messages.Fixed')); ?></option>
                                                    <option value="2"><?php echo e(__('messages.percentage')); ?></option>
                                                </select>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" onclick="removerow(1)"><i class="fa fa-trash f-s-25"></i></button>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-outline-secondary fleft" onclick="addoptionrow()"><?php echo e(__('messages.add_new_row')); ?></button>
                                    <button type="submit" class="btn btn-primary florig"><?php echo e(__('messages.submit')); ?></button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="fixed" value='<?php echo e(__("messages.Fixed")); ?>'>
<input type="hidden" id="percentage" value="<?php echo e(__('messages.percentage')); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views\admin\product\addoptionvalues.blade.php ENDPATH**/ ?>