<?php $__env->startSection('title', 'Danh sách Brand '); ?>

<?php $__env->startSection('content'); ?>


<style>
      #search-form{
          padding:10px 0;
         
      }
</style>

    <form class="form-inline ml-3" id="search-form" action="<?php echo e(BASE_URL.'brands/search'); ?>" method="get">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="s" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn  btn-primary" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

<table class="table table-striped table-danger">
                        <thead>
                        <th>ID</th>
                        <th>Brand name</th>
                        <th>logo</th>
                        <th>Country</th>                 
                        <th>
                            <a href="<?php echo e(BASE_URL . 'brands/add-brand'); ?>" class="btn btn-sm btn-success">Thêm</a>
                        </th>
                    
                        </thead>
                        <tbody>
                        <?php if(count($brands) != 0 ): ?>
                           <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>              
                            <tr>
                            <td><?php echo e($brand->id); ?></td>
                            <td><?php echo e($brand->brand_name); ?></td>
                            <td>
                                <?php if($brand->logo != null): ?>
                                  <img src="<?php echo e(BASE_URL . $brand->logo); ?>" class="img-thumbnail" width="60px">
                                 <?php else: ?>
                                     <img src="<?php echo e(BASE_URL . 'public\images\carsDefaut.jpg'); ?>" class="img-thumbnail" width="80px">
                                <?php endif; ?>                               
                            </td>
                            <td><?php echo e($brand->country); ?></td>                
                            <td>
                               <a href=" <?php echo e(BASE_URL . "brands/edit-brand/$brand->id"); ?>" class="btn btn-primary btn-sm">Sửa</a>
                               <a href="<?php echo e(BASE_URL . "brands/remove-brand/$brand->id"); ?>" class="btn btn-danger btn-sm btn-remove">Xóa</a>
                            </td>
                            </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php else: ?>
                                <tr class="text-center bg-white">
                                    <td colspan="6">Your search did not match any documents</td>
                                </tr>
                             <?php endif; ?>
                        </tbody>

                    </table>
<?php if(isset($_GET['msg'])): ?>
    <input type="hidden" id="msg" value="<?php echo e($_GET['msg']); ?>">
<?php endif; ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function(){
        if($('#msg').length > 0){
            Swal.fire({
                position: 'center',
                icon: 'info',
                title: $('#msg').val(),
                showConfirmButton: false,
                timer: 1500
            })
        }

        $('.btn-remove').click(function(){
            var redirectUrl = $(this).attr('href');
            Swal.fire({
                title: 'Thông báo!',
                text: "Bạn có chắc chắn muốn xóa sản phẩm này ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = redirectUrl;
                }
            })
            return false;
        });


    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\assignment\views/brands/index.blade.php ENDPATH**/ ?>