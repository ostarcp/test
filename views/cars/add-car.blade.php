@extends('layouts.admin')
    @section('title','Thêm ô tô')
    @section('content')
    <style>
        #add-car-form{
            margin-top: 50px;
            margin-bottom: 100px;
        }
        .form-group label.error{
            color: indianred;
        }
    </style>

        <form id="add-car-form" action=" {{ BASE_URL . 'cars/save-add-car' }}" method="post" enctype="multipart/form-data">
            <h3>Thêm mới ô tô</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tên mẫu xe<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="model_name">
                    </div>
                    <div class="form-group">
                        <label for="">Hãng xe</label>
                        <select name="brand_id" class="form-control">
                            @foreach ($brands as $brand)
                             <option value="{{ $brand->id }}"> {{ $brand->brand_name }} </option>
                             @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giá xe<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="price">
                    </div>
                    <div class="form-group">
                        <label for="">Giá sale</label>
                        <input type="number" class="form-control" name="sale_price">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng</label>
                        <input type="number" class="form-control" name="quanity">
                    </div>
                    <div class="form-group">
                        <label for="">Thông tin chi tiết</label>
                        <textarea name="detail" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-7 offset-1">
                            <img id="preview-img" src="{{ BASE_URL . 'public/images/default-image.jpg'}}" class="img-fluid">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh đại diện xe<span class="text-danger">*</span></label>
                        <input type="file" onchange="encodeImageFileAsURL(this)" class="form-control" name="image">
                    </div>
           
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <button class="btn btn-primary" type="submit">Lưu</button>&nbsp;
                    <a href="{{ BASE_URL }}" class="btn btn-danger">Hủy</a>
                </div>
            </div>
        </form>



  
  
@if(isset($_GET['msg']))
    <input type="hidden" id="msg" value="{{ $_GET['msg'] }}">
@endif

@endsection

@section('script')

<script>

      function encodeImageFileAsURL(element) {
        var file = element.files[0];
        if(file === undefined){
            $('#preview-img').attr('src', "{{ BASE_URL . 'public\images\default-image.jpg' }}");
        }else{
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#preview-img').attr('src', reader.result);    
            }
            reader.readAsDataURL(file);      
        }
    }


 $(document).ready(function(){

$('#add-car-form').validate({
    rules:{
        model_name: {
            required: true,
            minlength: 2,
            remote: {
                url: "{{ BASE_URL . 'cars/check-car-name' }}",
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
            number:true

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
            number: "nhap so"
        },
        image: {
            extension: "Hãy chọn file định dạng ảnh (jpg|png|jpeg|gif)"
        }
    }
});
});

</script>
@endsection
