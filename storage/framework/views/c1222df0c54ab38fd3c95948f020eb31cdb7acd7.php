  <?php if(Session::has('message')): ?>
                                 <div class="col-sm-12">
                                    <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert">
                                      <?php echo e(Session::get('message')); ?>

                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                 </div>
                               <?php endif; ?><?php /**PATH C:\Users\Admin\Desktop\Mobie\UploadingContentV1.0\PHPScript\PHPScript\resources\views/emailverified.blade.php ENDPATH**/ ?>