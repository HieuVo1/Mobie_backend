!<DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title><?php echo $__env->yieldContent('title'); ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/Ecommerce/css/style.css')); ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/Ecommerce/css/bootstrap.min.css')); ?>">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/Ecommerce/css/responsive.css')); ?>">
      <script type="text/javascript" src="<?php echo e(asset('public/Ecommerce/js/bootstrap.min.js')); ?>"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" />
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
      <script type="text/javascript" src="<?php echo e(asset('public/Ecommerce/js/aos.js')); ?>"></script>
      <script type="text/javascript" src="<?php echo e(URL::to('public/js/zoomsl.js')); ?>"></script>
      <script type="text/javascript" src="<?php echo e(asset('public/js/select.js')); ?>"></script>

   </head>
   <body class="rtl">
      <div class="modal log Log out" id="myModal1">
         <div class="modal-dialog">
            <div class="modal-content logout">
               <button type="button" class="close" data-dismiss="modal">
               <span>×</span>
               </button>
               <div class="logout-text">
                  <p><?php echo e(__('messages.logout_msg')); ?></p>
               </div>
               <div class="logout-btn">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(__('messages.cancel')); ?></button>
                  <button type="button" onclick="userlogout()" class="btn log" data-dismiss="modal"><?php echo e(__('messages.logout')); ?></button>
               </div>
            </div>
         </div>
      </div>
      <div class="user-login-pop_up">
         <div class="modal" id="myModal">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                     <div id="forgotbody" class="forgotbody">
                        <div class="reset-p">
                           <h1><?php echo e(__('messages.forgot_note')); ?>

                           </h1>
                        </div>
                        <div class="tab-content space">
                           <form class="log-1">
                              <span id="forgot_msg"></span>
                              <div class="logi">
                                 <a href="#">
                                 <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                 <a href="javascript:loginmodel()"><?php echo e(__('messages.back_to_login')); ?></a>
                                 </a>
                              </div>
                              <input type="text" name="forgot_email"  placeholder="Email" id="value">
                           </form>
                           <div class="button-sign_in-1">
                              <a href="javascript:forgotpassword()">
                              <?php echo e(__('messages.forgot_pwd')); ?>

                              </a>
                           </div>
                        </div>
                     </div>
                     <div id="loginbody">
                        <ul class="nav nav-tabs" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><?php echo e(__('messages.login')); ?></a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><?php echo e(__('messages.register')); ?></a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div role="tabpanel" class="tab-pane fade in active" id="profile">
                              <form>
                                 <span id="login_error_msg"></span>
                                 <input type="email" name="login_email" value="<?php echo e(isset($_COOKIE['user_email'])?$_COOKIE['user_email']:''); ?>" placeholder="Enter Your Email"  id="value">
                                 <br>
                                 <input type="password" value="<?php echo e(isset($_COOKIE['password'])?$_COOKIE['password']:''); ?>" name="login_password" placeholder="Enter Password"  id="value">
                                 <div class="form-group">
                                    <input type="checkbox" <?php echo isset($_COOKIE[ 'rem_me'])? "checked": ''?> id="html" name="login_remember">
                                    <label for="html">
                                    <span><?php echo e(__('messages.rem_me')); ?></span>
                                    </label>
                                    <a href="javascript:forgotmodel()"><?php echo e(__('messages.lost_pwd')); ?></a>
                                 </div>
                              </form>
                              <div class="button-sign_in">
                                 <input type="button" name="btnlogin" onclick="loginuser('login_')" value="<?php echo e(__('messages.login')); ?>" class="regiterbtn" />
                              </div>
                              <?php if(Session::get("facebook_active")): ?>
                              <div class="button-facebook">
                                 <a href="<?php echo e(url('auth/facebook')); ?>">
                                 <img src="<?php echo e(asset('public/Ecommerce/images/facebook.png')); ?>">
                                 </a>
                              </div>
                              <?php endif; ?>
                              <?php if(Session::get("google_active")): ?>
                              <div class="button-facebook">
                                 <a href="<?php echo e(url('auth/google')); ?>">
                                 <img src="<?php echo e(asset('public/Ecommerce/images/google.png')); ?>">
                                 </a>
                              </div>
                              <?php endif; ?>
                           </div>
                           <div role="tabpanel" class="tab-pane fade" id="buzz">
                              <form>
                                 <span id="reg_success_msg"></span>
                                 <span id="reg_error_msg"></span>
                                 <label><?php echo e(__('messages.name')); ?><span>*</span></label>
                                 <input type="text" name="first_name"  id="value">
                                 <br>
                                 <label><?php echo e(__('messages.email')); ?><span>*</span></label>
                                 <input type="email" name="reg_email"  id="value">
                                 <br>
                                 <label><?php echo e(__('messages.phone')); ?><span>*</span></label>
                                 <input type="text" name="reg_phone" id="value">
                                 </br>
                                 <label><?php echo e(__('messages.password')); ?><span>*</span></label>
                                 <input type="password" name="reg_password"  id="value">
                                 <label><?php echo e(__('messages.confirm_password')); ?><span>*</span></label>
                                 <input type="password" name="confirm_password" id="value">
                              </form>
                              <div class="button-sign_in">
                                 <input type="button" name="btnsubmit" onclick="registeruser()" value="REGISTER" class="regiterbtn" />
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="user-cart-pop_up">
         <div class="modal" id="modal1">
            <div class="modal-content">
               <div class="cart-pop_up-box">
                  <?php $cartCollection = Cart::getContent();$i=0;?>
                  <?php if($cartCollection->count()!=0): ?>
                  <div class="cart-pop_up-sbox">
                     <?php $__currentLoopData = $cartCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="cart-pop_up-content">
                        <div class="cart-pop_up-imgbox">
                           <?php $__currentLoopData = $productdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($hs->id==$item->id): ?>
                           <img src="<?php echo e(asset('public/upload/product').'/'.$hs->basic_image); ?>" width="75" height="auto">
                           <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="cart-pop_up-detail-box">
                           <div class="pop_up-detail-head">
                              <h2><?php echo e($item->name); ?></h2>
                              <div class="cart-pop_up-cross">
                                 <i class="fa fa-times" aria-hidden="true"></i>
                                 <span><?php echo e($item->quantity); ?></span>
                              </div>
                              <a href="<?php echo e(url('deletecartitem/'.$item->id)); ?>"><i class="fa fa-trash-o pop_up-delete" aria-hidden="true"></i></a>
                           </div>
                           <p>
                              <?php $option=explode(",",$item->attributes[0]['option']);
                                 $label=explode(",",$item->attributes[0]['label']);
                                 ?>
                              <select name="cartdrop" id="cartdrop" class="custom-select">
                                 <?php for($i=0;$i<count($option);$i++){?>
                                 <optgroup label="<?php echo e($option[$i]); ?>">
                                 <option><?php echo e($label[$i]); ?></option>
                                 <?php }?>
                              </select>
                           </p>
                           <h2><?php echo e(Session::get('currency').number_format((float)$item->price, 2, '.', '')); ?></h2>
                        </div>
                     </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <div class="cart-pop_up-subtotal">
                        <h3><?php echo e(__('messages.subtotal')); ?> :</h3>
                        <?php $cartCollection = Cart::getContent();
                           $totalamountarr=array();
                           foreach ($cartCollection as $car) {
                              $totalamount="";
                              $totalamount=(float)$car->quantity*(float)$car->price;
                              $totalamountarr[]=round($totalamount,2);
                           }
                           ?>
                        <h3 class="cart-pop_up-prize"><?php echo e(Session::get('currency').number_format((float)array_sum($totalamountarr), 2, '.', '')); ?></h3>
                     </div>
                     <a href="<?php echo e(url('cartdetail')); ?>">
                        <div class="pop_up-viewcart-b">
                           <?php echo e(__('messages.view_cart')); ?>

                        </div>
                     </a>
                     <a href="#">
                        <div class="">
                           <form action="<?php echo e(url('checkout')); ?>" method="post">
                              <?php echo e(csrf_field()); ?>

                              <input type="hidden" name="check_delivery" id="check_delivery" value="<?php echo e(Session::get('home_delivery')); ?>" />
                              <input type="hidden" name="check_discount_type" id="check_discount_type" value="1" />
                              <input type="hidden" name="check_discount_value" id="check_discount_value"   value="15"/>
                              <input type="hidden" name="check_free_shipping" id="check_free_shipping" value="0" />
                              <input type="hidden" name="check_coupon_value" id="check_coupon_value" />
                              <input type="hidden" name="check_couponcode" id="check_couponcode" />
                              <button value="submit" class="pop_up-checkout-b" type="submit" onclick="Checkout()" >
                              <?php echo e(__('messages.proceed_to_checkout')); ?>

                              </button>
                           </form>
                        </div>
                     </a>
                  </div>
                  <?php endif; ?>
                  <?php if($cartCollection->count()==0): ?>
                  <div class="cart-pop_up-content">
                     <div class="cart-pop_up-content empty">
                        <div class="cart-pop_up-imgbox">
                           <img src="<?php echo e(asset('public/Ecommerce/images/empty.png')); ?>">
                           <h1><?php echo e(__('messages.cart_empty')); ?></h1>
                        </div>
                     </div>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <input type="hidden" id="select_cate_name" value="<?=isset($_GET['ca'])?$_GET['ca']:'All'; ?>" />
      <input type="hidden" id="select_cate_id" value="<?=isset($_GET['ca'])?$_GET['ca']:'0'; ?>" />
      <input id="settings-btn" type="checkbox" class="settings-btn">
      <label for="settings-btn" class="settings-box-element" style="background: <?= Session::get('site_color') ?> !important"><i class="fa fa-2x fa-gear"></i></label>
      <div id="style-switcher">
         <h2 class="color-title"><?php echo e(__('messages.choose_color')); ?> :
         </h2>
         <div class="tab-content-1" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-base" role="tabpanel" aria-labelledby="pills-base-tab">
               <div>
                  <ul class="colors themecolor" id="colorslist">
                     <li id="colorbox1" class="<?=Session::get("colorid")==1? 'active-1' : '';?>" onclick="changebox(1,'#ff5500')">
                        <a  data-color="ff5500" class="color1" onclick="changecolorlog(1)"></a>
                     </li>
                     <li id="colorbox2" class="<?=Session::get("colorid")==2? 'active-1' : '';?>" onclick="changebox(2,'#E91E63')">
                        <a data-color="E91E63" class="color2" onclick="changecolorlog(2)"></a>
                     </li>
                     <li id="colorbox3" class="<?=Session::get("colorid")==3? 'active-1' : '';?>" onclick="changebox(3,'#673AB7')">
                        <a  data-color="673AB7" class="color3" onclick="changecolorlog(3)"></a>
                     </li>
                     <li id="colorbox4" class="<?=Session::get("colorid")==4? 'active-1' : '';?>" onclick="changebox(4,'#00BCD4')">
                        <a  data-color="00BCD4" class="color4" onclick="changecolorlog(4)"></a>
                     </li>
                     <li id="colorbox5" class="<?=Session::get("colorid")==5? 'active-1' : '';?>" onclick="changebox(5,'#009688')">
                        <a  data-color="009688" class="color5" onclick="changecolorlog(5)"></a>
                     </li>
                     <li id="colorbox6" class="<?=Session::get("colorid")==6? 'active-1' : '';?>" onclick="changebox(6,'#4CAF50')">
                        <a  data-color="4CAF50" class="color6" onclick="changecolorlog(6)"></a>
                     </li>
                     <li id="colorbox7" class="<?=Session::get("colorid")==7? 'active-1' : '';?>" onclick="changebox(7,'#8BC34A')">
                        <a  data-color="8BC34A" class="color7" onclick="changecolorlog(7)"></a>
                     </li>
                     <li id="colorbox8" class="<?=Session::get("colorid")==8? 'active-1' : '';?>" onclick="changebox(8,'#353b48')">
                        <a  data-color="353b48" class="color8" onclick="changecolorlog(8)"></a>
                     </li>
                     <li id="colorbox9" class="<?=Session::get("colorid")==9? 'active-1' : '';?>" onclick="changebox(9,'#E88EBA')"> 
                        <a  data-color="E88EBA" class="color9" onclick="changecolorlog(9)"></a>
                     </li>
                     <li id="colorbox10" class="<?=Session::get("colorid")==10? 'active-1' : '';?>" onclick="changebox(10,'#795548')">
                        <a data-color="795548" class="color10" onclick="changecolorlog(10)"></a>
                     </li>
                     <li id="colorbox11" class="<?=Session::get("colorid")==11? 'active-1' : '';?>" onclick="changebox(11,'#f1c40f')">
                        <a  data-color="f1c40f" class="color11" onclick="changecolorlog(11)"></a>
                     </li>
                     <li id="colorbox12" class="<?=Session::get("colorid")==12? 'active-1' : '';?>" onclick="changebox(12,'#D8616D')">
                        <a  data-color="D8616D" class="color12" onclick="changecolorlog(12)"></a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <?php   if(strpos($_SERVER['REQUEST_URI'],"productslist")){
         $myclass="container my-container";
         }else{
         $myclass="container";
         }
         ?>
      <div class="<?php echo e($myclass); ?>">
         <div class="e-nav">
            <div class="row">
               <div class="col-lg-2 col-md-3 col-4">
                  <a href="<?php echo e(url('/')); ?>">

                     <div class="top-logo" style="background: <?= Session::get('site_color') ?> !important"></div>
                     
                  </a>
               </div>
               <div class="col-lg-7 col-md-6 ser-show">
               
                  <form action="<?php echo e(url('searchproduct')); ?>" method="post">
                     <?php echo e(csrf_field()); ?>

                     <div class="search">
                           <div id="divNoImage">      
                           </div>
                        <div class="sea-input">
                        <input type="text" required name="search_product" value="<?=isset($_GET['s'])?$_GET['s']:''; ?>" onfocus="changesearcat()" id="search_product" placeholder="Search product...">
                     </div>
                        <button class="search-btn" type="submit" style="background: <?= Session::get('site_color') ?> !important">
                           <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                     </div>
                  </form>
               </div>
               <div class="col-lg-3 col-md-3 col-8">
                  <div class="cartbar">
                     <?php if(Auth::id()!=""): ?>
                     <a href="<?php echo e(url('myaccount')); ?>" class="user" >
                     <i class="fa fa-user" aria-hidden="true"></i>
                     </a>
                     <?php endif; ?>
                     <?php if(Auth::id()==""): ?>
                     <a href="#" class="user" data-toggle="modal" data-target="#myModal">
                     <i class="fa fa-user" aria-hidden="true"></i>
                     </a>
                     <?php endif; ?>
                     <a href="#" class="cart" data-modal-target="modal1">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <?php $cartCollection = Cart::getContent();?>
                        <div class="e-nav-cricle" style="background: <?= Session::get('site_color') ?> !important">
                           <h1><?php echo e($cartCollection->count()); ?></h1>
                        </div>
                     </a>
                     <a href="<?php echo e(url('mywishlist')); ?>" class="wish">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        <div class="e-nav-cricle" style="background: <?= Session::get('site_color') ?> !important">
                           <h1><?php echo e(count($mywish)); ?></h1>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="<?php echo e($myclass); ?>">
         <div class="main-menu">
            <div class="row">
               <ul>
                  <?php $__currentLoopData = $header_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                     <a href="<?php echo e(url('productslist/').'/'.$category->id.'/0/0/0'); ?>">
                     <?php echo e($category->name); ?>

                     <i class="fa fa-angle-down" aria-hidden="true"></i>
                     </a>
                     <div class="main-sub">
                        <div class="sub">
                           <?php $__currentLoopData = $category->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <ul class="sub-menu">
                              <h4><a href="<?php echo e(url('productslist/').'/0/'.$subcat->id.'/0/0'); ?>"><?php echo e($subcat->name); ?></a></h4>
                              <?php $__currentLoopData = $subcat->brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li><a href="<?php echo e(url('productslist/').'/'.$category->id.'/'.$subcat->id.'/'.$brand->id.'/0'); ?>"><?php echo e($brand->brand_name); ?></i></a></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                     </div>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <li><a href="<?php echo e(url('Offers')); ?>"><?php echo e(__('messages.offers')); ?></a>
               </ul>
               <div class="col-lg-7 col-md-12 ser-hide">
                    <form action="<?php echo e(url('searchproduct')); ?>" method="post">
                     <?php echo e(csrf_field()); ?>

                     <div class="search">
                      
                          <div id="divNoImage1">
                              
                          </div>
                       
                        <input type="text" name="search_product" value="<?=isset($_GET['s'])?$_GET['s']:''; ?>" onfocus="changesearcat()"required  id="search_product_mobile" placeholder="Search product...">

                        <button class="search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                     </div>
                  </form>
               </div>
               <div class="col-md-12 toggle">
                  <nav class="navbar navbar-dark">
                     <a class="navbar-brand" href="#"><?php echo e(__('messages.all_category')); ?></a>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggle-but">
                           <h1 class="but-lines"></h1>
                           <h1 class="but-lines"></h1>
                           <h1 class="but-lines"></h1>
                        </span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                           <?php $__currentLoopData = $header_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                              <?php echo e($category->name); ?>

                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 <div class="<?php echo e($myclass); ?>">
                                    <div class="row">
                                       <div class="col-md-4">
                                          <ul>
                                             <?php $__currentLoopData = $category->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <li><a href="<?php echo e(url('productslist/').'/0/'.$subcat->id.'/0/0'); ?>"><?php echo e($subcat->name); ?></i></a></li>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                      
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                           <li><a href="<?php echo e(url('Offers')); ?>"><?php echo e(__('messages.offers')); ?></a>
                           </li>
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <?php echo $__env->yieldContent('content'); ?>
      <?php echo $__env->yieldContent('footer'); ?>
      <div class="footer-background">
         <div class="footer-logo">
            <div class="f-logo" style="background: <?= Session::get('site_color') ?> !important"></div>
         </div>
         <div class="<?php echo e($myclass); ?>">
            <div class="row">
               <div class="col-md-12 col-lg-4">
                  <div class="contact">
                     <div class="f-head">
                        <h1><?php echo e(__('messages.contact_us')); ?></h1>
                     </div>
                     <div class="contact-text">
                        <div class="contact-icon">
                           <div class="footer-icon" style="background: <?= Session::get('site_color') ?> !important"></div>
                        </div>
                        <div class="c-text">
                           <h1><?php echo e(__('messages.address')); ?> : </h1>
                           <p><?php echo e(Session::get('site_address')); ?></p>
                        </div>
                     </div>
                     <div class="contact-text">
                        <div class="contact-icon">
                           <div class="footer-icon-1" style="background: <?= Session::get('site_color') ?> !important"></div>
                        </div>
                        <div class="c-text">
                           <h1><?php echo e(__('messages.phone')); ?> : </h1>
                           <p><?php echo e(Session::get('site_email')); ?></p>
                        </div>
                     </div>
                     <div class="contact-text">
                        <div class="contact-icon">
                           <div class="footer-icon-2" style="background: <?= Session::get('site_color') ?> !important"></div>
                        </div>
                        <div class="c-text">
                           <h1><?php echo e(__('messages.email')); ?> : </h1>
                           <p><?php echo e(Session::get('site_phone')); ?></p>
                        </div>
                     </div>
                     <div class="contact-text">
                        <div class="contact-icon">
                           <div class="footer-icon-3" style="background: <?= Session::get('site_color') ?> !important"></div>
                        </div>
                        <div class="c-text">
                           <h1><?php echo e(__('messages.working_day')); ?> :</h1>
                           <p><?php echo e(Session::get('site_workinghour')); ?></p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 col-lg-8">
                  <div class="row">
                     <div class="f-box">
                        <div class="f-head">
                           <h1><?php echo e(__('messages.my_account')); ?></h1>
                        </div>
                        <div class="f-account">
                           <li><a href="<?php echo e(url('aboutus')); ?>"><?php echo e(__('messages.about')); ?></a></li>
                           <li><a href="<?php echo e(url('helpsupport')); ?>"><?php echo e(__('messages.helpsupport')); ?></a></li>
                           <li><a href="<?php echo e(url('termscondition')); ?>"><?php echo e(__('messages.termscon')); ?></a></li>
                           <li><a href="<?php echo e(url('contactus')); ?>"><?php echo e(__('messages.contact_us')); ?></a></li>
                           <?php if(Session::get('user_id')!=0){?>
                           <li><a href="<?php echo e(url('myaccount')); ?>"><?php echo e(__('messages.my_account')); ?></a></li>
                           <li><a href="<?php echo e(url('myaccount')); ?>"><?php echo e(__('messages.order_history')); ?></a></li>
                           <?php }else{?>
                           <li><a href="#" data-toggle="modal" data-target="#myModal"><?php echo e(__('messages.my_account')); ?></a></li>
                           <li><a href="#" data-toggle="modal" data-target="#myModal"><?php echo e(__('messages.order_history')); ?></a></li>
                           <?php }?>
                        </div>
                     </div>
                     <div class="f-box-1">
                        <div class="f-head">
                           <h1><?php echo e(__('messages.main_feature')); ?></h1>
                        </div>
                        <div class="f-account">
                           <?php echo e(Session::get('site_mainfeature')); ?>

                        </div>
                     </div>
                     <div class="f-box-2">
                        <div class="f-head">
                           <h1><?php echo e(__('messages.newsletternote')); ?></h1>
                        </div>
                        <div class="f-be">
                           <p><?php echo e(Session::get('site_newsletter')); ?></p>
                           <div class="news">
                              <?php if(Session::has('message')): ?>
                              <div class="col-sm-12">
                                 <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                              </div>
                              <?php endif; ?>
                              <form action="<?php echo e(url('newsletter')); ?>" method="post">
                                 <?php echo e(csrf_field()); ?>

                                 <input type="text" name="newsletter" placeholder="<?php echo e(__('messages.email')); ?>" required="">
                                 <button class="go-btn" type="submit" style="background: <?= Session::get('site_color') ?> !important"><?php echo e(__('messages.go')); ?></button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="pay">
                     <a href="#"><img src="<?php echo e(asset('public/Ecommerce/images/pay-1.jpg')); ?>"></a>
                     <a href="#"><img src="<?php echo e(asset('public/Ecommerce/images/pay-2.jpg')); ?>"></a>
                     <a href="#"><img src="<?php echo e(asset('public/Ecommerce/images/pay-3.jpg')); ?>"></a>
                     <a href="#"><img src="<?php echo e(asset('public/Ecommerce/images/pay-4.jpg')); ?>"></a>
                     <span><?php echo e(date('Y')); ?> <?php echo e(__('messages.footer_note')); ?></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="<?php echo e(URL::to('public/js/code.js').'?v=15641'); ?>"></script>
      <input type="hidden" id="path" value="<?php echo e(url('/')); ?>">
      <input type="hidden" id="login_user_id" value="<?php echo e(Auth::id()); ?>">
      <input type="hidden" id="currency" value='<?php echo e(Session::get("currency")); ?>'>
       <input type="hidden" id="coupon_ds" value='<?php echo e(__("messages.coupon")); ?>'>
       <input type="hidden" id="not_found_lang" value="<?php echo e(__('messages.No Result Found')); ?>">
       <input type="hidden" id="All_lang" value="<?php echo e(__('messages.All')); ?>">
       <input type="hidden" id="required_field_lang" value="<?php echo e(__('messages_error_success.required_field')); ?>">
       <input type="hidden" id="login_account_lang" value="<?php echo e(__('messages.Please Login to Your Account')); ?>">
       <input type="hidden" id="ent_current_pwd_lang" value="<?php echo e(__('messages.ent_current_pwd')); ?>">
       <input type="hidden" id="invaild_coupon_lang" value="<?php echo e(__('messages.Invaild Coupon')); ?>">
       <input type="hidden" id="coupon_req_lang" value="<?php echo e(__('messages.Please Enter Coupon Code')); ?>">
       <input type="hidden" id="np_product_lang" value="<?php echo e(__('messages.No Product')); ?>">
       <input type="hidden" id="is_required_lang" value="<?php echo e(__('messages.is Required')); ?>">
       <input type="hidden" id="email_success_lang" value="<?php echo e(__('messages.Email Send Successfully')); ?>">
       <input type="hidden" id="email_not_lang" value="<?php echo e(__('messages.Your Entered Email Not Exist')); ?>"> 
       <input type="hidden" id="email_req_lang" value="<?php echo e(__('messages.Entered Your Email')); ?>">

       <input type="hidden" id="site_color_store" value="<?php echo e(Session::get('site_color')); ?>">
   </body>

</html><?php /**PATH C:\xampp\htdocs\projects\client\laravel\shop\resources\views/user/index.blade.php ENDPATH**/ ?>