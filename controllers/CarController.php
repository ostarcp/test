<?php
namespace Controllers;
use Models\Cars;
use Models\Brands;
class CarController extends BaseController
{
    public function index(){
        $cars = Cars::all();
        $this->render('cars.index',compact('cars'));
    }

    public function remove($id){

        if(!id){
            header("location: " . BASE_URL . "cars?msg=Sai thông tin mã sản phẩm");
            die;
        }

        if(Cars::destroy($id)) {
            header("location: " . BASE_URL . "cars?msg=Xóa sản phẩm thành công");
            die;
        }

        header("location: " . BASE_URL . "cars?msg=Xóa không thành công");
        die;
    }

    public function addForm(){
        $brands = Brands::all();
        $this->render('cars.add-car',compact('brands'));
    }

    public function saveAdd(){
        $model = new Cars();
        $requestData = $_POST; 
          
        $model->image = img_upload($_FILES['image']); 
        $model->fill($requestData);

        $msg = $model->save() == true ? "Tạo sản phẩm thành công!" : "Tạo sản phẩm thất bại!";
        header('location: ' . BASE_URL . "cars?msg=$msg");
        die;
    }



    public function editForm($id){
        $cars = Cars::find($id);

        if(!$cars){
            header("location: " . BASE_URL . "cars?msg=id không tồn tại");
            die;
        }
        $brands = Brands::all();
        $this->render('cars.edit-car',compact('cars','brands'));
    }


    public function saveEdit(){
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = Cars::find($id);
        if(!$model){
            header("location: " . BASE_URL . "cars?msg=id không tồn tại");
            die;
        }    
        $requestData = $_POST;
        
        $filename = img_upload($_FILES['image']);

        if($filename != null){
            $model->image = $filename;
        }

        $model->fill($requestData);
        $msg = $model->save() == true ? "Cập nhập thành công" : "Cập nhập không thành công";
        header("location: " . BASE_URL . "cars?msg=$msg");
        die;
    } 



    public function checkName(){
        $name = trim($_POST['model_name']);
        $id = $_POST['id'];
        if($id){
            $exited = Cars::where('model_name', $name)
                              ->where('id','!=',$id)
                              ->count();
           
        }else{
            $exited = Cars::where('model_name', $name)->count();
        
        }

        echo $exited == 0 ? "true" : "false";
    }


    public function search(){
        $name = isset($_GET['s']) == true ? $_GET['s'] : "cars";

        $cars = Cars::join('brands','cars.brand_id','=','brands.id')
        ->select('cars.*')
        ->where('model_name','like',"%$name%")
        ->orWhere('brands.brand_name','like',"%$name%")
        ->orderBy('id', 'asc')
        ->get();
      
        $this->render('cars.index',compact('cars'));
    }
}
