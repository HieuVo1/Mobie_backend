 <?php $__env->startSection('content'); ?>

<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1><?php echo e(__('messages.catalog')); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#"><?php echo e(__('messages.product')); ?></a>
                    </li>
                    <li><a href="<?php echo e(url('admin/product')); ?>"><?php echo e(__('messages.catalog')); ?></a>
                    </li>
                    <li class="active"><?php echo e(__('messages.edit')); ?> <?php echo e(__('messages.catalog')); ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="rowset">
        <div class="col-lg-10 orderdiv">
            <div class="card">
                <div class="card-header">
                    <h4><?php echo e(__('messages.edit')); ?> <?php echo e(__('messages.catalog')); ?></h4>
                </div>
                <div class="card-body">
                    <input type="hidden" name="product_id" id="product_id" value="<?php echo e($product->id); ?>" />
                  
                    <div class="tab-content pl-3 p-1" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="cmr1">
                                <div class="col-lg-12">
                                    <div class="custom-tab">
                                        <nav class="col-md-12 tabcatlog">
                                            <div class="nav nav-tabs tabdiv" id="nav-tab" role="tablist"> <a class="nav-item nav-link active" id="custom-nav-general-tab" data-toggle="tab" href="#custom-nav-general" role="tab" aria-controls="custom-nav-general" aria-selected="true"><?php echo e(__('messages.general')); ?></a>
                                                <a class="nav-item nav-link tabdiv" id="custom-nav-price-tab" data-toggle="tab" href="#custom-nav-price" role="tab" aria-controls="custom-nav-price" aria-selected="false"><?php echo e(__('messages.price')); ?></a>
                                                <a class="nav-item nav-link tabdiv" id="custom-nav-inventory-tab" data-toggle="tab" href="#custom-nav-inventory" role="tab" aria-controls="custom-nav-inventory" aria-selected="false"><?php echo e(__('messages.inventory')); ?></a>
                                                <a class="nav-item nav-link tabdiv" id="custom-nav-imgls-tab" data-toggle="tab" href="#custom-nav-imgls" role="tab" aria-controls="custom-nav-imgls" aria-selected="false"><?php echo e(__('messages.images')); ?></a>
                                                <a class="nav-item nav-link  tabdiv" id="custom-nav-attribute-tab" data-toggle="tab" href="#custom-nav-attribute" role="tab" aria-controls="custom-nav-attribute" aria-selected="true"><?php echo e(__('messages.attribute')); ?></a>
                                                <a class="nav-item nav-link tabdiv" id="custom-nav-option-tab" data-toggle="tab" href="#custom-nav-option" role="tab" aria-controls="custom-nav-option" aria-selected="false"><?php echo e(__('messages.option')); ?></a>
                                                <a class="nav-item nav-link tabdiv" id="custom-nav-rel_pro-tab" data-toggle="tab" href="#custom-nav-rel_pro" role="tab" aria-controls="custom-nav-rel_pro" aria-selected="false"><?php echo e(__('messages.realted_product')); ?></a>
                                            </div>
                                        </nav>
                                        <div class="tab-content col-md-12" id="nav-tabContent">
                                            <div class="tab-pane fade show active pd10" id="custom-nav-general" role="tabpanel" aria-labelledby="custom-nav-general-tab">
                                                <h3><?php echo e(__('messages.general')); ?></h3>
                                                <div class="tabdivcatlog"></div>
                                                <form>
                                                    <div class="form-group">
                                                        <label for="name" class="control-label mb-1"><?php echo e(__('messages.name')); ?><span class="reqfield">*</span>
                                                        </label>
                                                        <input id="pro_name" name="pro_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="<?php echo e(__('messages.name')); ?>" value="<?php echo e($product->name); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description" class="control-label mb-1"><?php echo e(__('messages.description')); ?><span class="reqfield">*</span>
                                                        </label>
                                                        <textarea name="description" id="description" class="editor"><?php echo e($product->description); ?></textarea>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="category" class="control-label mb-1"><?php echo e(__('messages.cate_gory')); ?><span class="reqfield">*</span>
                                                            </label>
                                                            <select name="category" required id="catelogcategory" class="form-control" onchange="getsubcategory(this.value)">
                                                                <option value=""><?php echo e(__('messages.select')); ?> <?php echo e(__('messages.cate_gory')); ?></option><?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($ca->id); ?>" <?=$product->category ==$ca->id ? ' selected="selected"' : '';?>><?php echo e($ca->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="subcategory" class="control-label mb-1"><?php echo e(__('messages.sub_cat')); ?><span class="reqfield">*</span>
                                                            </label>
                                                            <select name="subcategory" required id="subcategory" class="form-control" onchange="getbrand(this.value)">
                                                                <option value=""><?php echo e(__('messages.select')); ?> <?php echo e(__('messages.sub_cat')); ?></option>
                                                                <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($sc->id); ?>" <?=$product->subcategory ==$sc->id ? ' selected="selected"' : '';?>><?php echo e($sc->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group  col-md-4">
                                                            <label for="brand" class="control-label mb-1"><?php echo e(__('messages.brands')); ?><span class="reqfield">*</span>
                                                            </label>
                                                            <select name="brand" required id="brand" class="form-control">
                                                                <option value=""><?php echo e(__('messages.select')); ?> <?php echo e(__('messages.brands')); ?></option>
                                                                <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($br->id); ?>" <?=$product->brand ==$br->id ? ' selected="selected"' : '';?>><?php echo e($br->brand_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="brand" class="control-label mb-1"><?php echo e(__('messages.tax_name')); ?><span class="reqfield">*</span>
                                                            </label>
                                                            <select name="texable" required id="texable" class="form-control">
                                                                <option value=""><?php echo e(__('messages.select')); ?> <?php echo e(__('messages.tax_name')); ?></option>
                                                                <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($tz->id); ?>" <?=$product->tax_class ==$tz->id ? ' selected="selected"' : '';?>> <?php echo e($tz->tax_name); ?>

                                                                </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 cmr1">
                                                            <div class="col col-md-3">
                                                                <label class=" form-control-label"><?php echo e(__('messages.status')); ?></label>
                                                            </div>
                                                            <div class="col col-md-9">
                                                                <div class="form-check">
                                                                    <div class="status">
                                                                        <label for="checkbox1" class="form-check-label ">
                                                                            <input type="checkbox" id="status" name="status" value="1" class="form-check-input" <?=$product->status ==1 ? ' checked="checked"' : '';?>><?php echo e(__('messages.pro_status')); ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="brand" class="control-label mb-1"><?php echo e(__('messages.product_color')); ?><span class="reqfield">*</span>
                                                            </label>
                                                            <input type="color" name="colorpro" id="colorpro" value="<?php echo e($product->product_color); ?>" class=" form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="brand" class="control-label mb-1"><?php echo e(__('messages.color_name')); ?><span class="reqfield">*</span>
                                                            </label>
                                                            <input type="text" name="colorname" id="colorname" value="<?php echo e($product->color_name); ?>" class=" form-control">
                                                        </div>
                                                          <div class="form-group col-md-12">
                                                    <label for="name" class="control-label mb-1 wimg"><?php echo e(__('messages.meta_keyword')); ?></label>
                                                    <input id="metakeyword" name="metakeyword" type="text" class="form-control" data-role="tagsinput" aria-invalid="false" placeholder="<?php echo e(__('messages.meta_keyword')); ?>" value="<?php echo e($product->meta_keyword); ?>">
                                                </div>
                                                        <div class="col-md-12 form-group rowset">
                                                            <button class="btn btn-primary btn-flat m-b-30 m-t-30" type="button" onclick="Savegeneralinfo()"><?php echo e(__('messages.save')); ?></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade pd10" id="custom-nav-price" role="tabpanel" aria-labelledby="custom-nav-price-tab">
                                                <h3><?php echo e(__('messages.price')); ?></h3>
                                                <div class="tabdivcatlog"></div>
                                                <form>
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="name" class="control-label mb-1"><?php echo e(__('messages.MRP')); ?><span class="reqfield">*</span>
                                                            </label>
                                                            <input id="mrp" name="mrp" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="<?php echo e(__('messages.MRP')); ?>" required value="<?php echo e($product->MRP); ?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="name" class="control-label mb-1"><?php echo e(__('messages.selling_price')); ?><span class="reqfield">*</span>
                                                            </label>
                                                            <input id="price" name="price" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="<?php echo e(__('messages.selling_price')); ?>" required value="<?php echo e($product->price); ?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="name" class="control-label mb-1"><?php echo e(__('messages.spe_price')); ?></label>
                                                            <input id="special_price" name="special_price" type="text" class="form-control" aria-invalid="false" placeholder="<?php echo e(__('messages.spe_price')); ?>" value="<?php echo e($product->special_price); ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="name" class="control-label mb-1"><?php echo e(__('messages.spe_price')); ?> <?php echo e(__('messages.start')); ?></label>
                                                            <input id="spe_pri_start" name="spe_pri_start" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo e($product->special_price_start); ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="name" class="control-label mb-1"><?php echo e(__('messages.spe_price')); ?> <?php echo e(__('messages.to')); ?></label>
                                                            <input id="spe_pri_to" name="spe_pri_to" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo e($product->special_price_to); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group rowset">
                                                        <button class="btn btn-primary btn-flat m-b-30 m-t-30" type="button" onclick="saveproductprice()"><?php echo e(__('messages.save')); ?></button>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="tab-pane fade pd10" id="custom-nav-inventory" role="tabpanel" aria-labelledby="custom-nav-inventory-tab">
                                                <h3><?php echo e(__('messages.inventory')); ?></h3>
                                                <div class="tabdivcatlog"></div>
                                                <form>
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="name" class="control-label mb-1"><?php echo e(__('messages.SKU')); ?></label>
                                                            <input id="sku" name="sku" type="text" class="form-control" aria-invalid="false" placeholder="<?php echo e(__('messages.SKU')); ?>" value="<?php echo e($product->sku); ?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="name" class="control-label mb-1"><?php echo e(__('messages.inventory_mang')); ?></label>
                                                            <select name="inventory" required id="inventory" class="form-control">
                                                                <option value="0" <?=$product->inventory ==0 ? ' selected="selected"' : '';?>><?php echo e(__('messages.donot_track_inven')); ?></option>
                                                                <option value="1" <?=$product->inventory ==1 ? ' selected="selected"' : '';?>><?php echo e(__('messages.track_inven')); ?></option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="name" class="control-label mb-1"><?php echo e(__('messages.stock_avilable')); ?></label>
                                                            <select name="stock" required id="stock" class="form-control">
                                                                <option value="1" <?=$product->stock ==1 ? ' selected="selected"' : '';?>><?php echo e(__('messages.in_stock')); ?></option>
                                                                <option value="0" <?=$product->stock ==0 ? ' selected="selected"' : '';?>><?php echo e(__('messages.outstock')); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group rowset">
                                                        <button class="btn btn-primary btn-flat m-b-30 m-t-30" type="button" onclick="SaveInventory()"><?php echo e(__('messages.save')); ?></button>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="tab-pane fade pd10" id="custom-nav-imgls" role="tabpanel" aria-labelledby="custom-nav-imgls-tab">
                                                <h3><?php echo e(__('messages.images')); ?></h3>
                                                <div class="tabdivcatlog"></div>
                                                <div class="mar20">
                                                    <h4 class="orderdiv"><?php echo e(__('messages.basic_img')); ?></h4>
                                                    <div id="uploaded_image">

                                                        <?php     
                                                            if (isset($product->basic_image)) {
                                                                $image1=asset('upload/product').'/'.$product->basic_image;
                                                            }
                                                            else{
                                                                $image1=asset('admin/images/imgplaceholder.png');
                                                            }
                                                        ?>
                                                            <div class="upload-btn-wrapper">
                                                                <button class="btn imgcatlog">
                                                                    <div class="add-img pad0">
                                                                        <img src="<?php echo e($image1); ?>" alt="..." class="img-thumbnail imgsize" id="basic_img">

                                                                    </div>

                                                                </button>
                                                                <input type="file" name="upload_image" id="upload_image" />
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="mar20">
                                                    <h4 class="orderdiv"><?php echo e(__('messages.add_img')); ?></h4>
                                                    <?php $imagels=explode(",",$product->additional_image);$i=1;  ?>

                                                        <div id="additional_image" class="fleft">
                                                            <?php if($product->additional_image!=""): ?> <?php $__currentLoopData = $imagels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div id="imgid<?php echo e($i); ?>" class="add-img">
                                                                <img src="<?php echo e(asset('upload/product').'/'.$imls); ?>" class="img-thumbnail imgsize" id="additional_img<?php echo e($i); ?>" name="arrimg[]" />
                                                                <div class="add-box">
                                                                    <input type="button" id="removeImage1" value="x" class="btn-rmv1" onclick="removeimg('<?php echo e($i); ?>')" />
                                                                </div>

                                                            </div>
                                                            <?php $i++;?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>

                                                        </div>
                                                        <div class="upload-btn-wrapper">
                                                            <input type="hidden" name="add_total_img" id="add_total_img" value="0" />
                                                            <button class="btn imgcatlog">
                                                                <img src="<?php echo e(asset('upload/add_image.png')); ?>" alt="..." class="img-thumbnail imgsize">
                                                            </button>
                                                            <input type="file" name="add_image" id="add_image" />
                                                        </div>
                                                </div>
                                                <input type="hidden" name="add_total_img" id="add_total_img" value="<?php echo e($i); ?>" />
                                                <div class="row form-group mar20">
                                                    <button class="btn btn-primary btn-flat m-b-30 m-t-30" type="button" onclick="saveimages()"><?php echo e(__('messages.save')); ?></button>
                                                </div>
                                                </form>
                                            </div>
                                             <div class="tab-pane fade show  pd10" id="custom-nav-attribute" role="tabpanel" aria-labelledby="custom-nav-attribute-tab">
                                            <h3><?php echo e(__('messages.attribute')); ?></h3>
                                            <div class="tabdivcatlog"></div>
                                            <form>
                                            <div class="table-responsive dtdiv">
                                                <table id="sortable" class="table table-striped table-bordered cmr1">
                                                    <thead>
                                                        <tr>
                                                            <td class="td2"></td>
                                                            <td class="td3"><?php echo e(__('messages.attribute')); ?></td>
                                                            <td class="td4"><?php echo e(__('messages.value')); ?></td>
                                                            <td class="td2"></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="lstable">
                                                        <?php $i=0;?>
                                                            <?php if(isset($product_attribute)): ?>
                                                            <?php $i=1;?>
                                                                <?php $__currentLoopData = $product_attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                <tr id="row<?php echo e($i); ?>">
                                                                    <td class="td2"><i class="ti-layout-grid4-alt"></i>
                                                                    </td>
                                                                    <td class="td3">
                                                                        <div id="typedrop">
                                                                            <select name="dataattribute[]" id="att_type<?php echo e($i); ?>" class="form-control" onchange="getattributevalueslist(this.value,'<?php echo e($i); ?>')">
                                                                                <option value=""><?php echo e(__('messages.type')); ?></option><?php $__currentLoopData = $attributedrop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <optgroup label="<?php echo e($ad->name); ?>"><?php $__currentLoopData = $ad->attributelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($aa->id); ?>" <?=$pro_att->attribute_id ==$aa->id ? ' selected="selected"' : '';?>><?php echo e($aa->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></optgroup><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
                                                                        </div>
                                                                    </td>
                                                                    <td class="td4">
                                                                        <input type="text" id="input-tags<?php echo e($i); ?>" name="att_values[]" value="<?php echo e($pro_att->values); ?>">
                                                                    </td>
                                                                    <input type="hidden" name="tagval<?php echo e($i); ?>" id="tagval<?php echo e($i); ?>" value="<?php echo e($pro_att->values); ?>" />
                                                                    <td class="td2">
                                                                        <button class="btn btn-danger" onclick="removerow('<?php echo e($i); ?>')"><i class="fa fa-trash f-s-25"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <?php $i++;?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                    </tbody>

                                                    <input type="hidden" name="totalrow" id="totalrow" value='<?php echo e($i); ?>' />
                                                </table>
                                            </div>
                                                <div id="container"></div>
                                              
                                                    <button type="button" class="btn btn-outline-secondary fleft" onclick="addrow()"><?php echo e(__('messages.add_new_row')); ?></button>
                                                    <button type="button" class="btn btn-primary florig" onclick="saveattibute()"><?php echo e(__('messages.save')); ?></button>
                                               
                                            </form>
                                        </div>
                                        <div class="tab-pane fade pd10" id="custom-nav-option" role="tabpanel" aria-labelledby="custom-nav-option-tab">
                                            <h3><?php echo e(__('messages.option')); ?></h3>
                                            <div class="tabdivcatlog"></div><?php echo $__env->make('admin.product.edit.edit_option_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                                        <div class="tab-pane fade pd10" id="custom-nav-rel_pro" role="tabpanel" aria-labelledby="custom-nav-rel_pro-tab">
                                            <h3><?php echo e(__('messages.realted_product')); ?></h3>
                                            <div class="tabdivcatlog"></div>
                                            <form>
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-primary florig sav" onclick="SaveRelatedproduct()"><?php echo e(__('messages.save')); ?></button>
                                                </div>
                                                <input type="hidden" id="rel_pro" value="<?php echo e($product->related_product); ?>" />
                                           
                                                <table id="related_product" class="table table-striped table-bordered dttablewidth">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <input name="select_all" value="1" id="select-all" type="checkbox" onchange="allselect('related')" />
                                                            </th>
                                                            <th><?php echo e(__('messages.thumbnail')); ?></th>
                                                            <th><?php echo e(__('messages.name')); ?></th>
                                                            <th><?php echo e(__('messages.price')); ?></th>
                                                        </tr>
                                                        <thead>
                                                </table>
                                                <form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="msgtype" value="<?php echo e(__('messages.type')); ?>">
<input type="hidden" id="check_price" value="<?php echo e(__('messages.check_price')); ?>">
<input type="hidden" id="special_price_check" value="<?php echo e(__('messages.special_price_check')); ?>">
<input type="hidden" id="sepical_price_vaildate" value="<?php echo e(__('messages_error_success.sepical_price_vaildate')); ?>">
<input type="hidden" id="selling_mrp_vaildate" value="<?php echo e(__('messages_error_success.selling_mrp_vaildate')); ?>">
<input type="hidden" id="sku_already" value="<?php echo e(__('messages_error_success.sku_already')); ?>">
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('footer'); ?>

<script type="text/javascript" src="<?php echo e(asset('js/product.js').'?v=59'); ?>"></script>
  <script>
          CKEDITOR.replace('description');
      </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views/admin/product/edit/default.blade.php ENDPATH**/ ?>