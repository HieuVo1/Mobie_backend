<script src="<?php echo e(asset('admin/uikit/tests/js/test.js')); ?>"></script>
<form>
   <div class="row">
      <div class="col-md-12">
         <div class="categories-accordion mrg30" uk-accordion="targets: > div > .category-wrap">
            <div class="categories-sort-wrap uk-sortable uk-margin-top" uk-sortable="handle: .sort-categories" id="optionlist">
               <div class="category-wrap" data-id="1" id="mainoption1">
                  <h3 class="uk-accordion-title uk-background-secondary uk-light uk-padding-small">
                     <div class="uk-sortable-handle sort-categories uk-display-inline-block ti-layout-grid4-alt" ></div>
                     <?php echo e(__('messages.new_option')); ?>

                  </h3>
                  <div class="uk-accordion-content categories-content ">
                       <div class="edit-p-list-u">
                     <ul class="ulinine">
                        <li class="ulliinine">
                           <label for="name" class="control-label mb-1"><?php echo e(__('messages.name')); ?></label>
                           <input id="option_name_1" name="optionname[]" type="text" class="form-control" aria-required="true" aria-invalid="false">
                        </li>
                        <li class="ulliinine">
                           <label for="name" class="control-label mb-1"><?php echo e(__('messages.type')); ?></label>
                           <select name="optiontype[]" required id="option_type_1" class="form-control" onchange="addoptionvalue(1)">
                              <option value=""><?php echo e(__('messages.select')); ?> <?php echo e(__('messages.type')); ?></option>
                              <option value="1"><?php echo e(__('messages.dropdown')); ?></option>
                              <option value="2"><?php echo e(__('messages.checkbox')); ?></option>
                              <option value="3"><?php echo e(__('messages.radiobutton')); ?></option>
                              <option value="4"><?php echo e(__('messages.multiple_select')); ?></option>
                           </select>
                        </li>
                        <li class="ulliinine3">
                           <input type="checkbox" id="is_required_1" name="optionrequired[]" value="1" class="form-check-input"><?php echo e(__('messages.required')); ?>

                        </li>
                        <li class="ulliinine3">
                           <button type="button" class="btn btn-danger" onclick="removeoption(1)"><i class="fa fa-trash f-s-25"></i>
                           </button>
                        </li>
                     </ul>
                  </div>
                     <div id="valuesection1"></div>
                  </div>
               </div>
            </div>
         </div>
         <input type="hidden" name="totaloption" id="totaloption" value="1" />
          <div class="edit-p-blc">
         <div class="col-md-12 p-0 orderdiv">
            <div class="row">
               <div class="col-md-5 fleft" >
                  <button type="button" class="btn btn-outline-secondary fleft" onclick="addoption()" ><?php echo e(__('messages.add_new_option')); ?></button>
               </div>
               <div class="col-md-7 florig">
                  <select name="globaloptiontype" id="globaloptiontype" class="form-control col-md-6 fleft">
                     <option value=""><?php echo e(__('messages.select')); ?> <?php echo e(__('messages.option')); ?></option>
                     <?php $__currentLoopData = $optionvalues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($opval->id); ?>"><?php echo e($opval->name); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <button type="button" class="btn btn-primary col-md-6 fleft"  onclick="addglobaloption()"><?php echo e(__('messages.add_global_option')); ?></button>
               </div>
            </div>
         </div>
      </div>
         <button type="button" class="btn btn-primary fleft" onclick="saveoptions()"><?php echo e(__('messages.save')); ?></button>
      </div>
   </div>
</form>
<input type="hidden" id="fixed" value='<?php echo e(__("messages.Fixed")); ?>'>
<input type="hidden" id="percentage" value="<?php echo e(__('messages.percentage')); ?>">
<input type="hidden" id="label" value='<?php echo e(__("messages.label")); ?>'>
<input type="hidden" id="pricemsg" value='<?php echo e(__("messages.price")); ?>'>
<input type="hidden" id="price_type" value='<?php echo e(__("messages.price_type")); ?>'>
<input type="hidden" id="add_new_row" value='<?php echo e(__("messages.add_new_row")); ?>'>
<input type="hidden" id="new_option" value='<?php echo e(__("messages.new_option")); ?>'>
<input type="hidden" id="namedis" value='<?php echo e(__("messages.name")); ?>'>
<input type="hidden" id="select_type" value='<?php echo e(__("messages.select")); ?> <?php echo e(__("messages.type")); ?>'>
<input type="hidden" id="dropdown" value='<?php echo e(__("messages.dropdown")); ?>'>
<input type="hidden" id="checkbox" value='<?php echo e(__("messages.checkbox")); ?>'>
<input type="hidden" id="radiobutton" value='<?php echo e(__("messages.radiobutton")); ?>'>
<input type="hidden" id="multiple_select" value='<?php echo e(__("messages.multiple_select")); ?>'>
<input type="hidden" id="requireddis" value='<?php echo e(__("messages.required")); ?>'>
<input type="hidden" id="ple_sel_option" value="<?php echo e(__('messages_error_success.ple_sel_option')); ?>"><?php /**PATH /home/hieuvo/Desktop/PHPScript/resources/views/admin/product/optionadd.blade.php ENDPATH**/ ?>