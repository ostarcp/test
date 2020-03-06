<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model{
    protected $table = 'cars';
    protected $fillable = ['brand_id','model_name' ,'price', 'sale_price', 'detail', 'quanity'];
    public $timestamps = false;

    public function getBrand(){
        return Brands::find($this->brand_id);
    }

 

}



?>