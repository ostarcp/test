@extends('layouts.admin')
    @section('title','Thêm brand')
    @section('content')
    <style>
        #add-brand-form{
            margin-top: 100px;
            margin-bottom: 100px;
        }
        .form-group label.error{
            color: indianred;
        }
    </style>

        <form id="add-brand-form" action=" {{ BASE_URL . 'brands/save-add-brand' }}" method="post" enctype="multipart/form-data">
            <h3>Thêm Brand</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tên Brand<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="brand_name">
                    </div>
                    <div class="form-group">
                        <label for="">Country</label>
                        <input type="quanity" class="form-control" name="country">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-8 offset-1">
                            <img id="preview-img" src="{{ BASE_URL . 'public/images/default-image.jpg'}}" class="img-fluid">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh hãng<span class="text-danger">*</span></label>
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

$('#add-brand-form').validate({
    rules:{
        brand_name: {
            required: true,
            minlength: 2,
            remote: {
                url: "{{ BASE_URL . 'brands/check-brand-name' }}",
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
            required: "Nhập quốc gia"
        },
        image: {
            extension: "Hãy chọn file định dạng ảnh (jpg|png|jpeg|gif)"
        }
    }
});
});


</script>
@endsection
