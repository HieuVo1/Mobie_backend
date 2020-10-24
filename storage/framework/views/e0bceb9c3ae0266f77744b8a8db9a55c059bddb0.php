<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2><?php echo e(__('messages.new_order')); ?></h2>
	<table>
		<tbody>
			 <tr>
			 	 <th><?php echo e(__('messages.cus_name')); ?></th>
			 	 <td><?php echo e($user['customer_name']); ?></td>
			 </tr>
			  <tr>
			 	 <th><?php echo e(__('messages.order_amount')); ?></th>
			 	 <td><?php echo e($user['order_amount']); ?></td>
			 </tr>
		</tbody>
	</table>
</body>
</html><?php /**PATH D:\Learning\4th\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views\email\orderdetail.blade.php ENDPATH**/ ?>