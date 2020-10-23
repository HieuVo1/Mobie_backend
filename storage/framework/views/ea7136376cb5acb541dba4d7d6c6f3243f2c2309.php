<?php $__env->startSection('title'); ?>
<?php echo e(__('messages.Compare')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<div class="container">
   <div class="compare_table">
      <table class="table-responsive table">
         <thead>
            <?php if(count($comparedata)!=0): ?>
            <tr class="th-compare">
               <th class="product-name"><?php echo e(__('messages.action')); ?></th>
               <?php $__currentLoopData = $comparedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <th class="item-row">
                  <button type="button" onclick="removecomareitem('<?php echo e($d->id); ?>')" class="remove-compare"><?php echo e(__('messages.Remove')); ?></button>
               </th>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	       
            </tr>
         </thead>
         <tbody id="table-compare">
            <tr>
               <th class="product-name"><?php echo e(__('messages.Product Name')); ?></th>
               <?php $__currentLoopData = $comparedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <td><a href="<?php echo e(url('viewproduct/').'/'.$d->id); ?>"><?php echo e($d->name); ?></a></td>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <tr>
               <th class="product-name"><?php echo e(__('messages.Product Image')); ?></th>
               <?php $__currentLoopData = $comparedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <td class="item-row">
                  <img src="<?php echo e(asset('public/upload/product/').'/'.$d->basic_image); ?>" alt="product" class="   featured-image">
                  <div class="product-price product_price"><strong><?php echo e(__('messages.On Sale')); ?>: </strong><span><?php echo e(Session::get('currency').$d->selling_price); ?></span></div>
                  <form class="variants clearfix">
                     <input type="hidden">
                     <button title="Add to Cart" onclick="addcomparetocart('<?php echo e($d->id); ?>','<?php echo e($d->name); ?>','1','<?php echo e($d->selling_price); ?>')" class="add-to-cart btn btn-normal"><?php echo e(__('messages.add_to_cart')); ?></button>
                  </form>
               </td>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <tr>
               <th class="product-name"><?php echo e(__('messages.Product Sku')); ?></th>
               <?php $__currentLoopData = $comparedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <td class="item-row">
                  <p class="description-compare"><?php echo e($d->sku); ?></p>
               </td>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	       
            </tr>
            <tr>
               <th class="product-name"><?php echo e(__('messages.Availability')); ?></th>
               <?php $__currentLoopData = $comparedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <td class="availabel-stock">
                  <?php if($d->stock=='1'): ?>
                  <p><?php echo e(__('messages.Availabel In stock')); ?></p>
                  <?php else: ?>
                  <p><?php echo e(__('messages.Availabel Out Of stock')); ?></p>
                  <?php endif; ?>
               </td>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		       
            </tr>
            <?php $__currentLoopData = $attr_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
               <th class="product-name"><?php echo e($anam); ?></th>
               <?php foreach ($comparedata as $k) {   
                  $temp=0;                      	  
                  foreach ($k->attributes as $k1) {
	                  if($k1['attributename']&&isset($k1['attributename']['name'])&&$k1['attributename']['name']==$anam){
		                  echo '<td>'.$k1['attributename']['values'].'</td>';
		                  $temp=1;
		                  break;           	 		              	
	                  }
                  } ?>
               <?php if($temp!=1): ?>
               <td>--</td>
               <?php endif; ?>
               <?php } ?>	
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
         <?php else: ?>
         <h1><?php echo e(__('messages.No Any Product In Your Compare List')); ?></h1>
         <?php endif; ?>
      </table>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project\shop\resources\views/user/compare.blade.php ENDPATH**/ ?>