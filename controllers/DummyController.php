<?php
namespace Controllers;
use Models\Cars;
use Models\Brands;


    class DummyController extends BaseController{
        public function index(){
            $this->render('home.index');
        }

    }

?>