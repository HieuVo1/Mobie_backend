 <?php $__env->startSection('title'); ?>
<?php echo e(__('messages.view_product_detail')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<div class="container">
<style type="text/css">
    .product-heading h1:after{
        background-color:<?= Session::get('site_color') ?> !important;
    }
    .product-heading h1:before{
         background-color:<?= Session::get('site_color') ?> !important;
    }
    .detail-information-tab ul.tabs li.active{
        border-bottom:3px solid <?= Session::get('site_color') ?> !important;
    }
    .detail-review-star .fa-star:before{
         color:<?= Session::get('site_color') ?> !important;
    }
    .rating>input:checked~label, .rating:not(:checked)>label:hover, .rating:not(:checked)>label:hover~label{
        color:<?= Session::get('site_color') ?> !important;
    }
    .detail-information-tab .d_active{
        background-color:<?= Session::get('site_color') ?> !important;
    }
</style>

</div>
<div class="container">
    <div class="detail-product">
        <p id="msgrev"></p>
         <?php if(Session::has('message')): ?>
                              <div class="col-sm-12">
                                 <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                              </div>
                              <?php endif; ?>
        <div class="row">
            <input type="hidden" name="product_id" id="product_id" value="<?php echo e($product->id); ?>" />
            <div class="col-lg-6 col-md-6">
             <div class="carousel carousel-main" data-flickity='{"pageDots": false }'>
  <div class="carousel-cell"><img class="block__pic" src="<?php echo e(asset('public/upload/product').'/'.$product->basic_image); ?>"/></div>
            <?php $i=1;$add_img=explode(",",$product->additional_image);?>
            <?php if(!empty(array_filter($add_img))): ?>
                <?php $__currentLoopData = $add_img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="carousel-cell"><img class="block__pic" src="<?php echo e(asset('public/upload/product').'/'.$ad); ?>"/></div>
                <?php $i++;?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
 
</div>

<div class="carousel carousel-nav"
  data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
  <div class="carousel-cell"><img class="thumbimg"  src="<?php echo e(asset('public/upload/product').'/'.$product->basic_image); ?>"/></div>
            <?php $i=1;$add_img=explode(",",$product->additional_image);?>
             <?php if(!empty(array_filter($add_img))): ?>
            <?php $__currentLoopData = $add_img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="carousel-cell"><img class="thumbimg"  src="<?php echo e(asset('public/upload/product').'/'.$ad); ?>"/></div>
            <?php $i++;?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>
</div>
        
            </div>
          <div class="col-lg-6 col-md-6">
                <div class="detail-product-text">
                    <div class="detail-product-head">
                        <input type="hidden" name="productname" id="productname" value="<?php echo e($product->name); ?>">
                        <h2><?php echo e($product->name); ?></h2>
                     <p><?php echo e($currency); ?><span id="order_price"><?php echo e($product->selling_price); ?></span></p>
                        <input type="hidden" name="product_price" id="product_price" value="<?php echo e($product->selling_price); ?>">
                        <input type="hidden" name="new_price" id="new_price" value="<?php echo e($product->selling_price); ?>">
                        
                           <p id="mrppro"><?php echo e(Session::get('currency')); ?><span class="td1"><?php echo e($product->MRP); ?></span></p>
                    </div>
                    <div>
                        <?php echo e($product->new_desc); ?><a href="#information" ><?php echo e(__('messages.Read More')); ?></a>
                    </div>
                    <div class="detail-review-box">
                        <div class="detail-review-star">
                            <?php for($i=0;$i<$productstar;$i++){ ?>
                                <i class="fa fa-star" aria-hidden="true" style="color: <?= Session::get('site_color') ?> !important"></i>
                                <?php }?>
                                    <?php for($i=0;$i<(5-$productstar);$i++){ ?>
                                        <i class="fa fa-star-o" aria-hidden="true" style="color: <?= Session::get('site_color') ?> !important"></i>
                                        <?php }?>
                        </div>
                        <div class="detail-review-people">
                            <p>(<?php echo e($product->totalreview); ?> <?php echo e(__('messages.cus')); ?> <?php echo e(__('messages.review')); ?>)</p>
                        </div>
                    </div>
                   
                    <?php  
                  if(isset($product->options)){
                      $options_name=explode(",",$product->options->name);
                      $options_type=explode(",",$product->options->type);
                      $option_required=explode(",", $product->options->is_required);
                      $label_option=explode("#",$product->options->label);
                      $price_option=explode("#",$product->options->price);
                      for($i=0;$i<count($options_name);$i++){
                        $label=explode(",",$label_option[$i]);
                        $price=explode(",",$price_option[$i]);
                        $required="";
                        if($option_required[$i]==1){
                           $required="required";
                        }
                      ?>
                        <input type="hidden" name="option_name[]" id="option_name<?php echo e($i); ?>" value="<?php echo e($options_name[$i]); ?>">
                        <input type="hidden" name="option_req[]" id="option_req<?php echo e($i); ?>" value="<?php echo e($required); ?>">
                        <input type="hidden" name="option_type[]" id="options_type<?php echo e($i); ?>" value="<?php echo e($options_type[$i]); ?>">
                        <div>
                            <p class="detail-head col-md-12">
                                <?php echo e($options_name[$i]); ?> <?php if($required=="required"): ?>
                                <span class="req_field">*</span> <?php endif; ?>
                            </p>
                            <?php if($options_type[$i]==1): ?>
                            <ul class="col-md-12 sizes">
                                <li>
                                    <select name="option_ls[<?php echo e($i); ?>][]" id="option_ls<?php echo e($i); ?>" class="custom-select" onchange="changetotalamount('1')">
                                        <option value="">Select</option>
                                        <?php for($j=0;$j<count($label);$j++){?>
                                            <?php if(isset($price[$j])): ?>
                                              <option value="<?php echo e($label[$j]); ?>#<?php echo e($price[$j]); ?>"><?php echo e($label[$j]); ?><?php if($price[$j]!=""): ?>(<?php echo e($currency.$price[$j]); ?>)<?php endif; ?></option>
                                            <?php else: ?>
                                              <option value="<?php echo e($label[$j]); ?>#"><?php echo e($label[$j]); ?></option>
                                            <?php endif; ?>
                                            <?php }?>
                                    </select>
                                </li>
                            </ul>
                            <?php endif; ?>
                            <?php if($options_type[$i]==2): ?>
                                <ul class="col-md-12 sizes">
                                   <?php 
                                        for($j=0;$j<count($label);$j++){?>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <?php if(isset($price[$j])): ?>
                                                    <input type="checkbox" class="custom-control-input" id="customCheck<?php echo e($i); ?><?php echo e($j); ?>" name="option_ls<?php echo e($i); ?>" value="<?php echo e($label[$j]); ?>#<?php echo e($price[$j]); ?>" onchange="changetotalamount('2')">
                                                    <label class="custom-control-label" for="customCheck<?php echo e($i); ?><?php echo e($j); ?>"><?php echo e($label[$j]); ?><?php if($price[$j]!=""): ?>(<?php echo e($currency.$price[$j]); ?>)<?php endif; ?></label>
                                                     <?php else: ?>
                                                      <input type="checkbox" class="custom-control-input" id="customCheck<?php echo e($i); ?><?php echo e($j); ?>" name="option_ls<?php echo e($i); ?>" value="<?php echo e($label[$j]); ?>#" onchange="changetotalamount('2')">
                                                    <label class="custom-control-label" for="customCheck<?php echo e($i); ?><?php echo e($j); ?>"><?php echo e($label[$j]); ?></label>
                                                     <?php endif; ?>
                                                </div>
                                            </li>
                                        <?php }?>
                                </ul>
                            <?php endif; ?>
                           <?php if($options_type[$i]==3): ?>
                                <ul class="col-md-12 sizes">
                                    <?php for($j=0;$j<count($label);$j++){?>
                                            <div class="cost">
                                                <li>
                                                    <div class="custom-control custom-radio radio">
                                                        <?php if(isset($price[$j])): ?>
                                                         <input type="radio" class="custom-control-input" id="customRadio<?php echo e($i); ?><?php echo e($j); ?>" name="option_ls<?php echo e($i); ?>" value="<?php echo e($label[$j]); ?>#<?php echo e($price[$j]); ?>" onclick="changeradio('3','<?php echo e($label[$j]); ?>#<?php echo e($price[$j]); ?>','<?php echo e($i); ?>','<?php echo e($j); ?>')">
                                                        <label class="custom-control-label" for="customRadio<?php echo e($i); ?><?php echo e($j); ?>">
                                                            <?php echo e($label[$j]); ?> <?php if($price[$j]!=""): ?> (<?php echo e($currency.$price[$j]); ?>) <?php endif; ?>
                                                        </label>
                                                        <?php else: ?>
                                                         <input type="radio" class="custom-control-input" id="customRadio<?php echo e($i); ?><?php echo e($j); ?>" name="option_ls<?php echo e($i); ?>" value="<?php echo e($label[$j]); ?>#" onclick="changeradio('3','<?php echo e($label[$j]); ?>#','<?php echo e($i); ?>','<?php echo e($j); ?>')">
                                                        <label class="custom-control-label" for="customRadio<?php echo e($i); ?><?php echo e($j); ?>">
                                                            <?php echo e($label[$j]); ?> 
                                                        </label>
                                                        <?php endif; ?>
                                                       
                                                    </div>
                                                </li>
                                            </div>
                                    <?php }?>
                                        <input type="hidden" id="previousradio<?php echo e($i); ?>">
                                </ul>
                            <?php endif; ?>
                            <?php if($options_type[$i]==4): ?>
                                <ul class="col-md-12">
                                    <li>
                                        <select name="option_ls[]" id="option_ls<?php echo e($i); ?>" class="custom-select" multiple onchange="changetotalamount('4')">
                                            <?php for($j=0;$j<count($label);$j++){?>
                                                <?php if(isset($price[$j])): ?>
                                                     <option value="<?php echo e($label[$j]); ?>#<?php echo e($price[$j]); ?>"><?php echo e($label[$j]); ?><?php if($price[$j]!=""): ?>(<?php echo e($currency.$price[$j]); ?>)<?php endif; ?></option>
                                                <?php else: ?>
                                                      <option value="<?php echo e($label[$j]); ?>#"><?php echo e($label[$j]); ?></option>
                                                <?php endif; ?>
                                            <?php }?>
                                        </select>
                                    </li>
                                </ul>
                           <?php endif; ?>
                        </div>
                        <?php  } } ?>
                            <input type="hidden" name="reqerror" id="reqerror" value="0">
                            <input type="hidden" name="total_option" id="total_option" value="<?php echo e($i); ?>" />
                            <div class="detail-qty-button" style="border-color: <?= Session::get('site_color') ?> !important">
                                <div class="number">
                                    <span class="qty-mp minus" onclick="changeqty('-1')" style="background: <?= Session::get('site_color') ?> !important"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                    <input type="text" value="1" id="qty-nu" name="pro_qty" onchange="changeproprice(this.value)" />
                                    <span class="qty-mp plus" onclick="changeqty('1')" style="background: <?= Session::get('site_color') ?> !important"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                </div>
                            </div>
                         
                                  <?php if($product->stock=='1'): ?>
                                     <a href="javascript:addtocart()">
                                        <div class="detail-add-cart" style="background: <?= Session::get('site_color') ?> !important">
                                           <?php echo e(__('messages.add_to_cart')); ?>

                                        </div>
                                    </a>
                                  <?php else: ?>
                                     <a href="#">
                                       <div class="detail-add-cart " style="background: <?= Session::get('site_color') ?> !important">
                                           <?php echo e(__('messages.outstock')); ?>

                                        </div>
                                    </a>
                                  <?php endif; ?>
                           
                            <div class="detail-info">
                                <div class="detail-info-wishlist">
                                    <label class="fancy-checkbox">
                                          <?php if(Auth::id()!=""): ?>
                                        <input type="checkbox" id="checkdataview0" name="checkdata" <?=$product->wish==1? ' checked="checked"' : '';?> onclick="changewishlist('<?php echo $product->id;?>','checkdataview0')" />
                                         <?php else: ?>
                                            <input type="checkbox" onclick="removewishselect('checkdataview0')" id="checkdataview0" name="checkdata"  data-toggle="modal" data-target="#myModal"/>
                                        <?php endif; ?>
                                        <big id="wishfavor<?php echo e($product->id); ?>"></big>
                                    </label>
                                     
                                    <p><?php echo e(__('messages.add_to_wishlist')); ?></p>
                                  </br>
                                    <span>
                                      <a href="javascript:addcomapre('<?=$product->id?>','msgrev')"><img src="<?php echo e(asset('public/Ecommerce/images/compare.png')); ?>" class="compareimg"></a>
                                     </span>
                                    <p class="pd10com"><?php echo e(__('messages.Compare')); ?></p>

                                </div>
                                <div class="detail-information">
                                    <h2><?php echo e(__('messages.SKU')); ?> :</h2>
                                    <h4><?php echo e($product->sku); ?></h4>
                                </div>
                                <div class="detail-information">
                                    <h2><?php echo e(__('messages.cate_gory')); ?> :</h2>
                                    <h4><?php echo e($product->category); ?>/<?php echo e($product->subcategory); ?></h4>
                                </div>
                                <div class="detail-information">
                                    <h2><?php echo e(__('messages.Tags')); ?> :</h2>
                                    <h4><?php echo e($product->meta_keyword); ?></h4>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" id="information">
    <div class="detail-information-tab">
        <ul class="tabs">
            <li class="active" rel="tab1" id="reltab1" onclick="changeproducttab(1)"><?php echo e(__('messages.description')); ?></li>
            <li rel="tab2" id="reltab2" onclick="changeproducttab(2)"><?php echo e(__('messages.add_info')); ?></li>
            <li rel="tab3" id="reltab3" onclick="changeproducttab(3)"><?php echo e(__('messages.review')); ?></li>
        </ul>
        <div class="tab_container">
            <h3 class="d_active tab_drawer_heading" rel="tab1" id="hredtab1" onclick="changeproducttab(1)"><?php echo e(__('messages.description')); ?></h3>
            <div id="tab1" class="tab_content">
                <div class="des_content">
                    <p>
                        <?php echo html_entity_decode($product->description);?>
                    </p>
                </div>
            </div>
            <h3 class="tab_drawer_heading" rel="tab2" id="hredtab2" onclick="changeproducttab(2)"><?php echo e(__('messages.add_info')); ?></h3>
            <div id="tab2" class="tab_content">
                <div class="addi">
                    <table class="addi-h" style="background: <?= Session::get('site_color') ?> !important">
                        <tr>
                            <th class="spe"><?php echo e(__('messages.attributeset')); ?></th>
                            <th class="brand"><?php echo e(__('messages.attribute')); ?></th>
                            <th class="sams"><?php echo e(__('messages.value')); ?></th>
                        </tr>
                    </table>
                    <table class="addi-sub">
                        <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="spe-1"><?php echo e($attr['set']); ?></td>
                            <td class="brand-1">
                                <div class="types">
                                    <ul>
                                        <?php $__currentLoopData = $attr['attributename']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($att['name']); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </td>
                            <td class="sams-1">
                                <div class="types desa">
                                    <ul>
                                        <?php $__currentLoopData = $attr['attributename']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e(implode(',',$att['values'])); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <div class="res-addi" >
                    <div class="res-spe">
                        <h1 style="background-color:<?= Session::get('site_color') ?> !important;"><?php echo e(__('messages.attributeset')); ?></h1>
                        <div class="tital">
                            <h2><?php echo e(__('messages.attribute')); ?></h2>
                            <p><?php echo e(__('messages.value')); ?></p>
                        </div>
                    </div>
                    <div class="res-spe">
                        <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h1 style="background-color:<?= Session::get('site_color') ?> !important;"><?php echo e($att['name']); ?></h1>
                        <div class="tital tal">
                            <?php $__currentLoopData = $attr['attributename']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h2><?php echo e($att['name']); ?></h2>
                            <p><?php echo e(implode(',',$att['values'])); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <h3 class="tab_drawer_heading" rel="tab3" id="hredtab3" onclick="changeproducttab(3)"><?php echo e(__('messages.review')); ?></h3>
            <div id="tab3" class="tab_content">
                <div class="detail-review-tab">
                    <h3 class="detail-review-head"><?php echo e(__('messages.review')); ?></h3>
                    <div class="detail-review-user-box">
                        <?php $__currentLoopData = $product->review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $re): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="review-user-box" data-aos="zoom-in">
                            <div class="review-user-img">
                                <?php 
                        $external_link = asset('upload/profile'.'/'.$re->userdata->profile_pic);
                           if (@GetImageSize($external_link)) {
                                 $image = $external_link;
                           } else {
                                    $image = asset('public/Ecommerce/images/profile.png');
                           }?>
                                    <img src="<?php echo e($image); ?>" width="100px" height="75px">
                            </div>
                            <div class="review-user-text">
                               
                                    <div class="detail-review-people-1">
                                        <?php for($i=0;$i<$re->ratting;$i++): ?>
                                         <i class="fa fa-star" aria-hidden="true" style="color: <?= Session::get('site_color') ?> !important"></i>
                                        <?php endfor; ?>
                                      
                                          <?php for($i=0;$i<5-$re->ratting;$i++): ?>
                                         <i class="fa fa-star-o" aria-hidden="true" style="color: <?= Session::get('site_color') ?> !important"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="review-user-content">
                                        <h3><?php echo e(__('messages.by')); ?> <span class="reviewname"><?php echo e($re->userdata->first_name); ?> <?php echo e($re->userdata->last_name); ?></span> <?php echo e(__('messages.on')); ?> <?php echo e(date('F d,Y',strtotime($re->created_at))); ?></h3>
                                        <p><?php echo e($re->review); ?></p>
                                    </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="detail-review-box2">
                        <h2 class="detail-review-underline"><?php echo e(__('messages.review_note')); ?></h2>
                        <p id="msgrev"></p>
                        <div class="detail-review-rating-box">
                            <div class="detail-review-star2">
                                <p><?php echo e(__('messages.your_ratting')); ?></p>
                            </div>
                            <div class="detail-review-people2 rating">
                                <input type="radio" id="star5" class="radiobtn" name="rating[]" value="5" />
                                <label class="full" for="star5"></label>
                                <input type="radio" id="star4" class="radiobtn" name="rating[]" value="4" />
                                <label class="full" for="star4"></label>
                                <input type="radio" id="star3" class="radiobtn" name="rating[]" value="3" />
                                <label class="full" for="star3"></label>
                                <input type="radio" id="star2" class="radiobtn" name="rating[]" value="2" />
                                <label class="full" for="star2"></label>
                                <input type="radio" id="star1" class="radiobtn" name="rating[]" value="1" />
                                <label class="full" for="star1"></label>
                            </div>
                        </div>
                    </div>
                    <div class="detail-review-form">
                        <label><?php echo e(__('messages.your_ratting')); ?></label>
                        <br>
                        <textarea id="reviewtext" name="reviewtext"></textarea>
                    </div>
                    <?php if(isset($userdata->id)): ?>
                    <div class="deta-but">
                      
                        <button class="detail-review-submit" onclick="storereview()" style="background: <?= Session::get('site_color') ?> !important">
                            <?php echo e(__('messages.submit')); ?>

                        </button>
                      
                    </div>
                    <?php endif; ?> <?php if(!isset($userdata->id)): ?>
                    <div class="detail-review-submit" style="background: <?= Session::get('site_color') ?> !important">
                        <a href="#" data-toggle="modal" data-target="#myModal" style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.submit')); ?>

                         </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="product-heading">
        <h1><?php echo e(__('messages.related_product')); ?></h1>
    </div>
    <p id="realtecompare">
    <div class="product-slider">
        <div id="demo1">
            <div class="row pos">
                <div class="customNavigation">
                    <a class="btn prev" onclick="prevdemo1()"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    <a class="btn next" onclick="nextdemo1()"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
                <div id="owl-demo1" class="owl-carousel ">
                    <?php if(!empty($product->related_product)): ?>
                    <?php $k=0;?>
                        <?php $__currentLoopData = $product->related_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $realt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item col-md-12 ">
                            <div class="home-bg">
                                 <?php if($realt->stock=='0'): ?>
                                                 <div class="out_of_sb">
                                                    <span><?php echo e(__('messages.outstock')); ?></span>
                                                 </div>
                                                <?php endif; ?>
                            <div class="img-background">
                                <a href="<?php echo e(url('viewproduct/').'/'.$realt->id); ?>"> <img src="<?php echo e(asset('public/upload/product').'/'.$realt->basic_image); ?>" class="img-responsive" ></a>
                                <div class="img-text">
                                    <label class="fancy-checkbox">
                                        <?php if(Auth::id()!=""): ?>
                                         <input type="checkbox" id="checkrelat<?php echo e($k); ?>" name="checkrelat" onclick="changewishlist('<?php echo $realt->id;?>','checkrelat<?php echo e($k); ?>')" <?=$realt->wish==1? ' checked="checked"' : '';?>/>
                                        <?php else: ?>
                                         <input type="checkbox" id="checkrelat<?php echo e($k); ?>" name="checkrelat" data-toggle="modal" data-target="#myModal"/>
                                        <?php endif; ?>
                                        <big id="wishfavor<?php echo e($realt->id); ?>"></big>
                                    </label>
                                     <i class="fa fa-spinner loadlconwish" aria-hidden="true" id="loading<?php echo e($realt->id); ?>" ></i>
                                    <?php if($realt->discount!=0): ?>
                                    <span><?php echo e($realt->discount); ?>%</span> <?php endif; ?>
                                </div>
                            </div>
                            <div class="product-text">
                                <h1><?php echo e($realt->name); ?></h1>
                                <div class="price">
                                    <h2><?php echo e($currency); ?><?php echo e($realt->selling_price); ?>

                           <?php if($realt->discount!=0): ?>
                           <span class="realtd"> <?php echo e($currency.$realt->MRP); ?></span>
                           <?php endif; ?>
                        </h2>

                                    <span class="rating">
                         <?php for($i=0;$i<$realt->avgStar;$i++){ ?>
                        <i class="fa fa-star" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                        <?php }?>
                        <?php for($i=0;$i<(5-$realt->avgStar);$i++){ ?>
                        <i class="fa fa-star-o" style="color: <?= Session::get('site_color') ?> !important" aria-hidden="true"></i>
                        <?php }?>
                        </span>
                         <span class="compare_icon"> 
                        <a href="javascript:addcomapre('<?=$realt->id?>','realtecompare')"><img src="<?php echo e(asset('public/Ecommerce/images/compare.png')); ?>"></a>
                     </span>
                                </div>
                                  <?php if($realt->stock=='1'): ?>
                                                <a href="<?php echo e(url('viewproduct/').'/'.$realt->id); ?>" style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.shop_now')); ?></a>
                                                <?php endif; ?>
                            </div>
                            </div>
                        </div>
                        <?php $k++;?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                              
                             <?php $k=0;?>
                                  <?php $__currentLoopData = $productdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $realt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <?php if($realt->category==$product->category_id&&$realt->subcategory==$product->subcategory_id): ?>
                                   <div class="item col-md-12 ">
                                            <div class="home-bg">
                                               <?php if($realt->stock=='0'): ?>
                                                 <div class="out_of_sb">
                                                    <span><?php echo e(__('messages.outstock')); ?></span>
                                                 </div>
                                                <?php endif; ?>
                                            <div class="img-background">
                                                <a href="<?php echo e(url('viewproduct/').'/'.$realt->id); ?>"> <img src="<?php echo e(asset('public/upload/product').'/'.$realt->basic_image); ?>" class="img-responsive" ></a>
                                                <div class="img-text">
                                                    <label class="fancy-checkbox">
                                                        <?php if(Auth::id()!=""): ?>
                                                         <input type="checkbox" id="checkrelat<?php echo e($k); ?>" name="checkrelat" onclick="changewishlist('<?php echo $realt->id;?>','checkrelat<?php echo e($k); ?>')" <?=$realt->wish==1? ' checked="checked"' : '';?>/>
                                                        <?php else: ?>
                                                         <input type="checkbox" id="checkrelat<?php echo e($k); ?>" name="checkrelat" data-toggle="modal" data-target="#myModal"/>
                                                        <?php endif; ?>
                                                        <big id="wishfavor<?php echo e($realt->id); ?>"></big>
                                                    </label>
                                                       <i class="fa fa-spinner loadlconwish" aria-hidden="true" id="loading<?php echo e($realt->id); ?>" ></i>
                                                    <?php if($realt->discount!=0): ?>
                                                    <span><?php echo e($realt->discount); ?>%</span> <?php endif; ?>
                                                </div>
                                            </div>
                                           <div class="text-s-box text-s-box-2">
                     <h1><?php echo e($realt->name); ?></h1>
                     <span class="rating">
                     <?php for($i=0;$i<$realt->avgStar;$i++){ ?>
                     <i class="fa fa-star" aria-hidden="true" style="color: <?= Session::get('site_color') ?> !important"></i>
                     <?php }?>
                     <?php for($i=0;$i<(5-$realt->avgStar);$i++){ ?>
                     <i class="fa fa-star-o" aria-hidden="true" style="color: <?= Session::get('site_color') ?> !important"></i>
                     <?php }?>
                     </span>
                     <span class="review">
                     (<?php echo e($realt->total_review); ?> <?php echo e(__('messages.review')); ?>)
                     </span>
                     <span class="compare_icon"> 
                        <a href="javascript:addcomapre('<?=$realt->id?>','realtecompare')"><img src="<?php echo e(asset('public/Ecommerce/images/compare.png')); ?>"></a>
                     </span>
                     <div class="price">
                        <h2><?php echo e(Session::get("currency")); ?><?php echo e($realt->selling_price); ?></h2>
                        <span ><?php echo e(Session::get("currency")); ?><?php echo e($realt->MRP); ?></span>
                        <?php if($realt->stock=='1'): ?>
                        <a href="<?php echo e(url('viewproduct/').'/'.$realt->id); ?>" style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.shop_now')); ?></a>
                        <?php endif; ?>
                     </div>
                  </div> 
                                            </div>
                                        </div>
                                        
                                         <?php $k++;?>
                                       <?php endif; ?>  
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project\shop\resources\views/user/product/viewproduct.blade.php ENDPATH**/ ?>