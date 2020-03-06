<?php $__env->startSection('title', 'Home'); ?>


<?php $__env->startSection('content'); ?>
<marquee width="100%" direction="right" scrollamount="20" height="100%">
   <img src="<?php echo e(BASE_URL.'public/images/troll.jpg'); ?>" alt="">
</marquee>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\assignment\views/home/index.blade.php ENDPATH**/ ?>