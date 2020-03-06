@extends('layouts.admin')
    @section('title', 'Update ô tô')
    @section('content')
    <style>
        #add-product-form{
            margin-top: 100px;
            margin-bottom: 100px;
        }
        .form-group label.error{
            color: indianred;
        }
    </style>

        <form id="edit-car-form" action=" {{ BASE_URL . 'cars/save-edit-car' }}" method="post" enctype="multipart/form-data">
            <h3>Update ô tô</h3>
            <div class="row">
                <div class="col-md-6">
                    
                    <input type="hidden" name="id" value="{{ $cars->id }}">

                    <div class="form-group">
                        <label>Tên mẫu xe<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="model_name" value="{{ $cars->model_name }}" >
                    </div>
                    <div class="form-group">
                        <label for="">Hãng xe</label>
                        <select name="brand_id" class="form-control">
                             @foreach ($brands as $brand)
                            <option
                                    @if($brand->id == $cars->brand_id)
                                        selected
                                    @endif
                                    value="{{ $brand->id }}"> {{ $brand->brand_name }} </option>
                           @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giá xe<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="price" value="{{ $cars->price }}">
                    </div>
                    <div class="form-group">
                        <label for="">Giá sale</label>
                        <input type="number" class="form-control" name="sale_price" value="{{ $cars->sale_price }}">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng</label>
                        <input type="number" class="form-control" name="quanity" value="{{ $cars->quanity }}">
                    </div>
                    <div class="form-group">
                        <label for="">Thông tin chi tiết</label>
                        <textarea name="detail" class="form-control" rows="5">{{$cars->detail}}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="row">
                        <div class="col-md-6 offset-md-3">
                        @if($cars->image == null)
                            <img id="img-preview" src="{{ BASE_URL . 'public/images/default-image.jpg'}}" class="img-fluid">
                        @else
                            <img src="{{ BASE_URL . $cars->image }}" class="img-fluid" id="img-preview">
                        @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm<span class="text-danger">*</span></label>
                        <input type="file" onchange="encodeImageFileAsURL(this)"  name="image" class="form-control" >
                    </div>
           
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <button class="btn btn-primary px-4" type="submit">Lưu</button>&nbsp;
                    <a href="{{ BASE_URL }}" class="btn btn-danger px-4">Hủy</a>
                </div>
            </div>
        </form>



  
  
@if(isset($_GET['msg']))
    <input type="hidden" id="msg" value="{{ $_GET['msg'] }}">
@endif

@endsection

@section('script')
<script>
    // Onchange Image when upload
    function encodeImageFileAsURL(element) {
        var file = element.files[0];

        if(file === undefined){
            $("#img-preview").attr("src", "{{ BASE_URL . $cars->image }}");
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
@endsection
