    <?php $__env->startSection('title', 'Update ô tô'); ?>
    <?php $__env->startSection('content'); ?>
    <style>
        #add-product-form{
            margin-top: 100px;
            margin-bottom: 100px;
        }
        .form-group label.error{
            color: indianred;
        }
    </style>

        <form id="edit-car-form" action=" <?php echo e(BASE_URL . 'cars/save-edit-car'); ?>" method="post" enctype="multipart/form-data">
            <h3>Update ô tô</h3>
            <div class="row">
                <div class="col-md-6">
                    
                    <input type="hidden" name="id" value="<?php echo e($cars->id); ?>">

                    <div class="form-group">
                        <label>Tên mẫu xe<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="model_name" value="<?php echo e($cars->model_name); ?>" >
                    </div>
                    <div class="form-group">
                        <label for="">Hãng xe</label>
                        <select name="brand_id" class="form-control">
                             <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                    <?php if($brand->id == $cars->brand_id): ?>
                                        selected
                                    <?php endif; ?>
                                    value="<?php echo e($brand->id); ?>"> <?php echo e($brand->brand_name); ?> </option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giá xe<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="price" value="<?php echo e($cars->price); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Giá sale</label>
                        <input type="number" class="form-control" name="sale_price" value="<?php echo e($cars->sale_price); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng</label>
                        <input type="number" class="form-control" name="quanity" value="<?php echo e($cars->quanity); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Thông tin chi tiết</label>
                        <textarea name="detail" class="form-control" rows="5"><?php echo e($cars->detail); ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="row">
                        <div class="col-md-6 offset-md-3">
                        <?php if($cars->image == null): ?>
                            <img id="img-preview" src="<?php echo e(BASE_URL . 'public/images/default-image.jpg'); ?>" class="img-fluid">
                        <?php else: ?>
                            <img src="<?php echo e(BASE_URL . $cars->image); ?>" class="img-fluid" id="img-preview">
                        <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm<span class="text-danger">*</span></label>
                        <input type="file" onchange="encodeImageFileAsURL(this)"  name="image" class="form-control" >
                    </div>
           
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <button class="btn btn-primary px-4" type="submit">Lưu</button>&nbsp;
                    <a href="<?php echo e(BASE_URL); ?>" class="btn btn-danger px-4">Hủy</a>
                </div>
            </div>
        </form>



  
  
<?php if(isset($_GET['msg'])): ?>
    <input type="hidden" id="msg" value="<?php echo e($_GET['msg']); ?>">
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    // Onchange Image when upload
    function encodeImageFileAsURL(element) {
        var file = element.files[0];

        if(file === undefined){
            $("#img-preview").attr("src", "<?php echo e(BASE_URL . $cars->image); ?>");
            return false;
        }
    

        var reader = new FileReader();
        reader.onloadend = function() {
            $("#img-preview").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
    
    
$(document).ready(function(){

$('#edit-car-form').validate({
    rules:{
        model_name: {
            required: true,
            minlength: 2,
            remote: {
                url: "<?php echo e(BASE_URL . 'cars/check-car-name'); ?>",
                type: "post",
                data: {
                    name: function() {
                        return $( "input[name='model_name']" ).val();
                    },
                    id: function(){
                        return $( "input[name='id']" ).val();
                    }
                }
            }
        },
        price: {
            required: true,
            number: true,
            min: 1
        },
        image: {
            extension: "jpg|png|jpeg|gif"
        }
    },
    messages:{
        model_name: {
            required: "Nhập tên sản phẩm",
            minlength: "Tối thiểu 2 ký tự",
             remote: "Tên đã tồn tại, vui lòng chọn tên khác"
        },
        price: {
            required: "Nhập giá sản phẩm",
            number: "Yêu cầu nhập số",
            min: "Giá trị nhỏ nhất là 1"
        },
        image: {
            extension: "Hãy chọn file định dạng ảnh (jpg|png|jpeg|gif)"
        }
    }
});
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hailhph06122\views/cars/edit-car.blade.php ENDPATH**/ ?>