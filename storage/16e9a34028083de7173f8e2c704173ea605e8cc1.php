    <?php $__env->startSection('title', 'Update brand'); ?>
    <?php $__env->startSection('content'); ?>
    <style>
        #edit-brand-form{
            margin-top: 100px;
            margin-bottom: 100px;
        }
        .form-group label.error{
            color: indianred;
        }
    </style>

        <form id="edit-brand-form" action=" <?php echo e(BASE_URL . 'brands/save-edit-brand'); ?>" method="post" enctype="multipart/form-data">
            <h3>Update Brand</h3>
            <div class="row">
                <div class="col-md-6">
                    
                    <input type="hidden" name="id" value="<?php echo e($brand->id); ?>">

                    <div class="form-group">
                        <label>Tên mẫu xe<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="brand_name" value="<?php echo e($brand->brand_name); ?>" >
                    </div>
                   
                    <div class="form-group">
                        <label for="">Country<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="country" value="<?php echo e($brand->country); ?>">
                    </div>
                </div>
                <div class="col-md-6">
                <div class="row">
                        <div class="col-md-6 offset-md-3">
                        <?php if($brand->logo == null): ?>
                            <img id="img-preview" src="<?php echo e(BASE_URL . 'public/images/default-image.jpg'); ?>" class="img-fluid">
                        <?php else: ?>
                            <img src="<?php echo e(BASE_URL . $brand->logo); ?>" class="img-fluid" id="img-preview">
                        <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm<span class="text-danger">*</span></label>
                        <input type="file" onchange="encodeImageFileAsURL(this)"  name="image" class="form-control" >
                    </div>
           
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <button class="btn btn-primary" type="submit">Lưu</button>&nbsp;
                    <a href="<?php echo e(BASE_URL); ?>" class="btn btn-danger">Hủy</a>
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
            $("#img-preview").attr("src", "<?php echo e(BASE_URL . $brand->logo); ?>");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function() {
            $("#img-preview").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
    
    
$(document).ready(function(){

$('#edit-brand-form').validate({
    rules:{
        brand_name: {
            required: true,
            minlength: 2,
            remote: {
                url: "<?php echo e(BASE_URL . 'brands/check-brand-name'); ?>",
                type: "post",
                data: {
                    name: function() {
                        return $( "input[name='brand_name']" ).val();
                    },
                    id: function(){
                        return $( "input[name='id']" ).val();
                    }
                }
            }
        },
        country: {
            required: true

        },
        image: {
            extension: "jpg|png|jpeg|gif"
        }
    },
    messages:{
        brand_name: {
             required: "Nhập tên sản phẩm",
             minlength: "Tối thiểu 2 ký tự",
             remote: "Tên đã tồn tại, vui lòng chọn tên khác"
        },
        country: {
            required: "Nhập giá sản phẩm",
        },
        image: {
            extension: "Hãy chọn file định dạng ảnh (jpg|png|jpeg|gif)"
        }
    }
});
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\assignment\views/brands/edit-brand.blade.php ENDPATH**/ ?>