 <?php $__env->startSection('content'); ?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1><?php echo e(__('messages.view_order')); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><?php echo e(__('messages.orders')); ?></li>
                    <li class="active"><?php echo e(__('messages.view_order')); ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">

    <div class="row rowset">

        <div class="col-md-12">
            <div class="card">
                <iframe src="<?php echo e(asset('public/pdf/').'/'.$pdfname); ?>" name="ifrm" id="ifrm" class="disno"></iframe>
                <div class="card-header">
                    <strong class="card-title"><?php echo e(__('messages.view_order')); ?></strong>

                    <div class="florig">
                        <form action="<?php echo e(url('admin/sendordermail')); ?>" method="post" class="ordermail">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="filename" value="<?php echo e($pdfname); ?>" />
                            <input type="hidden" name="user_id" value="<?php echo e($order->user_id); ?>" />
                            <button class="orderbtn"><i class="fa fa-envelope-o" class="ordericon" onclick="sendemail()"></i></button>
                        </form>

                        <button onclick="printDiv()" class="orderbtn"><i class="fa fa-print" class="ordericon"></i></button>
                    </div>

                </div>
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
                    <h3 class="ordermark"><?php echo e(__('messages.orders')); ?> & <?php echo e(__('messages.account_info')); ?></h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="orderdiv">
                                <h4 class="orderh4"><?php echo e(__('messages.order_info')); ?></h4>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="text-input" class=" form-control-label"><?php echo e(__('messages.order_date')); ?>

                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <?php echo e($order->orderdate); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="text-input" class=" form-control-label"><?php echo e(__('messages.order_status')); ?>

                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <?php if($order->order_status=='6'){
                                                  echo __('message.canceled');
                                            }else if($order->order_status=='5'){
                                                  echo __('messages.completed');
                                            }else if($order->order_status=='2'){ 
                                                  echo __("messages.on_hold");
                                            }else if($order->order_status=='3'){
                                                  echo __('messages.pending');
                                            }else if($order->order_status=='1'){
                                                echo __('messages.processing');
                                            }else if($order->order_status=='7'){
                                                echo __('messages.refunded');
                                            }
                                           ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="text-input" class=" form-control-label"><?php echo e(__('messages.shipping_method')); ?>

                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <?php echo e($shipping->label); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="text-input" class=" form-control-label">

                                        <?php echo e(__('messages.payment_method')); ?>

                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <?php if($order->payment_method==1): ?> <?php echo e(__('messages.paypal')); ?> <?php endif; ?> <?php if($order->payment_method==2): ?> <?php echo e(__('messages.stripe')); ?> <?php endif; ?> <?php if($order->payment_method==3): ?> <?php echo e(__('messages.case_on_delivery')); ?> <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="orderdiv">
                                <h4 class="orderh4"><?php echo e(__('messages.account_info')); ?></h4>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="text-input" class=" form-control-label"><?php echo e(__('messages.customer')); ?> <?php echo e(__('messages.name')); ?>

                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="text-input" class=" form-control-label"><?php echo e(__('messages.customer')); ?> <?php echo e(__('messages.email')); ?>

                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <?php echo e($user->email); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="text-input" class=" form-control-label"><?php echo e(__('messages.customer')); ?> <?php echo e(__('messages.phone')); ?>

                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <?php echo e($order->phone); ?>

                                </div>
                            </div>

                        </div>
                    </div>

                    <h3 class="ordermark"><?php echo e(__('messages.address_info')); ?></h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="orderdiv">
                                <h4 class="orderh4"><?php echo e(__('messages.billing_address')); ?></h4>
                            </div>
                            <div class="orderdivleft">
                                <div class="row">
                                    <label for="text-input" class=" form-control-label"><?php echo e($order->billing_first_name.' '.$order->billing_last_name); ?>

                                    </label>
                                </div>

                                <div class="row">
                                    <label for="text-input" class=" form-control-label halfwidth">
                                        <?php echo e($order->billing_address); ?></br>
                                        <?php echo e($order->billing_city); ?></br>
                                        <?php echo e($order->billing_pincode); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="orderdiv">
                                <h4 class="orderh4"><?php echo e(__('messages.shipping_address')); ?></h4>
                            </div>
                            <div class="orderdivleft">
                                <div class="row">
                                    <label for="text-input" class=" form-control-label">
                                        <?php if($order->to_ship==1): ?> <?php echo e($order->shipping_first_name.' '.$order->shipping_last_name); ?> <?php else: ?> <?php echo e($order->billing_first_name.' '.$order->billing_last_name); ?> <?php endif; ?>

                                    </label>
                                </div>

                                <div class="row">
                                    <label for="text-input" class=" form-control-label halfwidth">
                                        <?php if($order->to_ship==1): ?> <?php echo e($order->shipping_address); ?>

                                        </br>
                                        <?php echo e($order->shipping_city); ?></br>
                                        <?php echo e($order->shipping_pincode); ?> <?php else: ?> <?php echo e($order->billing_address); ?>

                                        </br>
                                        <?php echo e($order->billing_city); ?></br>
                                        <?php echo e($order->billing_pincode); ?> <?php endif; ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="ordermark"><?php echo e(__('messages.item_ordered')); ?></h3>
                    <table class="table topnone">
                        <thead>
                            <tr>
                                <th><?php echo e(__('messages.product')); ?></th>
                                <th><?php echo e(__('messages.unit_price')); ?></th>
                                <th><?php echo e(__('messages.qty')); ?></th>
                                <th><?php echo e(__('messages.line_total')); ?></th>
                            </tr>
                        </thead>
                        <tbody class="borderbot">
                            <?php $__currentLoopData = $orderdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $od): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($od->productdata->name); ?>

                                    <br><?php echo e($od->short_description); ?></td>
                                <td><?php echo e($currency.number_format((float)$od->price, 2, '.', '')); ?></td>
                                <td><?php echo e($od->quantity); ?></td>
                                <td><?php echo e($currency.number_format((float)$od->total_amount, 2, '.', '')); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>
                    <div class="row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <table class="table topnone">

                                <tbody class="borderbot">
                                    <tr>

                                        <th><?php echo e(__('messages.subtotal')); ?></th>
                                        <td><?php echo e($currency.number_format((float)$order->subtotal, 2, '.', '')); ?></td>
                                    </tr>

                                    <tr>
                                        <th><?php echo e(__('messages.shipping')); ?></th>
                                        <td><?php echo e($currency.number_format((float)$order->shipping_charge, 2, '.', '')); ?></td>

                                    </tr>
                                     <?php if($order->is_freeshipping=='1'): ?>
                                        <tr>
                                             <th></th>
                                             <td><?php echo e(__('messages.free_delivery')); ?></td>
                                        </tr>                 
                                     <?php endif; ?>
                                    <?php if($order->coupon_code!=""): ?>
                                    <tr>
                                        <th><?php echo e(__('messages.coupon')); ?>(<?php echo e($order->coupon_code); ?>)</th>
                                        <td>-<?php echo e($currency.number_format((float)$order->coupon_price, 2, '.', '')); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <th><?php echo e(__('messages.taxes')); ?></th>
                                        <td><?php echo e($currency.number_format((float)$order->taxes_charge, 2, '.', '')); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('messages.total')); ?></th>
                                        <th><?php echo e($currency.number_format((float)$order->total, 2, '.', '')); ?></th>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views\admin\order\vieworder.blade.php ENDPATH**/ ?>