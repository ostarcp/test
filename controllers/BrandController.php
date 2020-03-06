<?php
namespace Controllers;
use Models\Brands;

class BrandController extends BaseController{
    public function index(){
        $brands = Brands::all();
        $this->render('brands.index',compact('brands'));
    }

    public function remove($id){
        if(!id){
            header("location: " . BASE_URL . "brands?msg=Sai thông tin mã sản phẩm");
            die;
        }

        if(Brands::destroy($id)) {
            header("location: " . BASE_URL . "brands?msg=Xóa sản phẩm thành công");
            die;
        }

        header("location: " . BASE_URL . "brands?msg=Xóa không thành công");
        die;
    }

    public function addForm(){
        $this->render('brands.add-brand');
    }

    public function saveAdd(){
        $model = new Brands();
        $requestData = $_POST; 

     

        $model->logo = img_upload($_FILES['image']); 
        $model->fill($requestData);
        

        $msg = $model->save() == true ? "Tạo sản phẩm thành công!" : "Tạo sản phẩm thất bại!";
        header('location: ' . BASE_URL . "brands?msg=$msg");
        die;
    }



    public function editForm($id){
        $brand = Brands::find($id);

        if(!$brand){
            header("location: " . BASE_URL . "brands?msg=id không tồn tại");
            die;
        }

        $this->render('brands.edit-brand',compact('brand'));
    }


    public function saveEdit(){
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = Brands::find($id);
        if(!$model){
            header("location: " . BASE_URL . "brands?msg=id không tồn tại");
            die;
        }    
        $requestData = $_POST;
        
        $filename = img_upload($_FILES['image']);

        if($filename != null){
            $model->logo = $filename;
        }

        $model->fill($requestData);
        $msg = $model->save() == true ? "Cập nhập thành công" : "Cập nhập không thành công";
        header("location: " . BASE_URL . "brands?msg=$msg");
        die;
    } 



    public function checkName(){
        $name = trim($_POST['brand_name']);
        $id = $_POST['id'];
        if($id){
            $exited = Brands::where('brand_name', $name)
                              ->where('id','!=',$id)
                              ->count();
           
        }else{
            $exited = Brands::where('brand_name', $name)->count();
        
        }

        echo $exited == 0 ? "true" : "false";
    }

    
    public function search(){
        $name = isset($_GET['s']) == true ? $_GET['s'] : "brands";

        $brands = Brands::where('brand_name','like',"%$name%")
        ->orWhere('country','like',"%$name%")
        ->orderBy('id', 'asc')
        ->get();
        $this->render('brands.index',compact('brands'));
    }
}

?>