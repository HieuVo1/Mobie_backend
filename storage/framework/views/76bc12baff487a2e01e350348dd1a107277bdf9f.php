<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<?php echo e(__('messages.Hello')); ?>,<?php echo e($user->first_name); ?>  <?php echo e($user->last_name); ?>

		<div style="width:100%">
		   <?php echo e(__('messages.order_id')); ?>:-<?php echo e($user->order_id); ?>

		</div>
		<div style="width:100%">
			<?php echo e($user->order_msg); ?>

		</div>
</body>
</html><?php /**PATH /home/hieuvo/Desktop/PHPScript/resources/views/email/customer_order_status.blade.php ENDPATH**/ ?>