<?php $__env->startSection('title', 'Danh sách ô tô'); ?>

<?php $__env->startSection('content'); ?>

<table class="table table-striped table-primary">
                        <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>brands</th>
                        <th>
                            <a href="<?php echo e(BASE_URL . 'cars/add-car'); ?>" class="btn btn-sm btn-success">Thêm</a>
                        </th>
                    
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <td><?php echo e($car->id); ?></td>
                            <td><?php echo e($car->model_name); ?></td>
                            <td><?php echo e($car->brand_name); ?></td>    
                            <td>
                               <a href=" <?php echo e(BASE_URL . "cars/edit-car/$car->id"); ?>" class="btn btn-primary btn-sm">Sửa</a>
                               <a href="<?php echo e(BASE_URL . "cars/remove-car/$car->id"); ?>" class="btn btn-danger btn-sm btn-remove">Xóa</a>
                            </td>
                            </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\assignment\views/home/search.blade.php ENDPATH**/ ?>