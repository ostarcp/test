<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model{
    protected $table = 'brands';
    protected $fillable = ['brand_name','country'];
    public $timestamps = false;

}



?>