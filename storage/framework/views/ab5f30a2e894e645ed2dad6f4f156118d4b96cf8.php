<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<?php echo e(__('messages.Hello')); ?>,<?php echo e($user->first_name); ?>  <?php echo e($user->last_name); ?>

		<div style="width:100%">
		 <a href="<?php echo e(url('admin/confirmregister').'/'.$user->id); ?>">
		 	<?php echo e(__('messages.confirm_email_address')); ?>

		 </a>
		</div>
</body>
</html><?php /**PATH /home/hieuvo/Desktop/PHPScript/resources/views/email/register_confirmation.blade.php ENDPATH**/ ?>