 <?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1><?php echo e(__('messages.option')); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                   <li><a href="#"><?php echo e(__('messages.product')); ?></a></li>
                    <li><a href="<?php echo e(url('admin/options')); ?>"><?php echo e(__('messages.option')); ?></a></li>
                    <li class="active"><?php echo e(__('messages.edit')); ?> <?php echo e(__('messages.option')); ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="row rowset">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4><?php echo e(__('messages.edit')); ?> <?php echo e(__('messages.option')); ?></h4>
                </div>
                <div class="card-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo e(__('messages.general')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><?php echo e(__('messages.values')); ?></a>                            
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
                                        <input type="text" required id="name" name="name" placeholder="<?php echo e(__('messages.name')); ?>" class="form-control" value="<?php echo e($option->name); ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label"><?php echo e(__('messages.type')); ?><span class="reqfield">*</span></label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="type" required id="type" class="form-control">
                                            <option value=""><?php echo e(__('messages.select')); ?> <?php echo e(__('messages.type')); ?></option>
                                            <option value="1" <?=$option->type ==1 ? ' selected="selected"' : '';?>><?php echo e(__('messages.dropdown')); ?></option>
                                            <option value="2" <?=$option->type ==2 ? ' selected="selected"' : '';?>><?php echo e(__('messages.checkbox')); ?></option>
                                            <option value="3" <?=$option->type ==3 ? ' selected="selected"' : '';?>><?php echo e(__('messages.radiobutton')); ?></option>
                                            <option value="4" <?=$option->type ==4 ? ' selected="selected"' : '';?>><?php echo e(__('messages.multiple_select')); ?></option>
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
                                                    <input type="checkbox" id="is_required" name="is_required" value="1" class="form-check-input" <?=$option->is_required ==1 ? ' checked="checked"' : '';?>><?php echo e(__('messages.req_option_msg')); ?>

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
                             <form action="<?php echo e(url('admin/updateoption')); ?>" method="post" class="cmr1">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="option_id" value="<?php echo e($option->id); ?>" />
                                <input type="hidden" name="option_name" id="option_name" value="<?php echo e($option->name); ?>"/>
                                <input type="hidden" name="option_type" id="option_type" value="<?php echo e($option->type); ?>"/>
                                <input type="hidden" name="option_required" id="option_required" value="<?php echo e($option->is_required); ?>"/>
                              
                                <table  id="sortable" class="table table-striped cmr1">
                                    <thead>
                                        <tr>
                                            <td></td>
                                            <td><?php echo e(__('messages.label')); ?></td>
                                            <td><?php echo e(__('messages.price')); ?></td>
                                            <td><?php echo e(__('messages.price_type')); ?></td>
                                            <td></td>
                                        </tr>
                                    </thead>

                                    <tbody id="lstable">
                                        <?php $i=1;?>
                                     <?php $__currentLoopData = $optionvalue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $op): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="row<?php echo e($i); ?>">
                                            <td><i class="ti-layout-grid4-alt"></i></td>
                                            <td data-id="<?php echo e($i); ?>">
                                                <input type="text" required id="label_<?php echo e($i); ?>" name="label[]" placeholder="" class="form-control" value="<?php echo e($op->label); ?>">
                                            </td>
                                            <td>
                                                <input type="text"  id="price_<?php echo e($i); ?>" name="price[]" placeholder="" class="form-control" value="<?php echo e($op->price); ?>">
                                            </td>
                                            <td>
                                                <select name="price_type[]" required id="price_type_<?php echo e($i); ?>" class="form-control">
                                                    <option value="1" <?=$op->price_type ==1 ? ' selected="selected"' : '';?>><?php echo e(__('messages.Fixed')); ?></option>
                                                    <option value="2" <?=$op->price_type ==2 ? ' selected="selected"' : '';?>><?php echo e(__('messages.percentage')); ?></option>
                                                </select>
                                            </td>
                                            <td><button class="btn btn-danger" onclick="removerow('<?php echo e($i); ?>')"><i class="fa fa-trash f-s-25"></i></button>
                                            </td>
                                        </tr>
                                        <?php $i++;?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>

                                </table>
                                 <input type="hidden" name="totalrow" id="totalrow" value='<?php echo e($i); ?>'/>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-outline-secondary fleft" onclick="addoptionrow()" ><?php echo e(__('messages.add_new_row')); ?></button>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views/admin/product/editoption.blade.php ENDPATH**/ ?>