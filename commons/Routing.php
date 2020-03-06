<?php

namespace Commons;

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
class Routing
{
    public static function customRouting($url){

        $router = new RouteCollector();    

        $router->get('/', ['Controllers\DummyController', 'index']);

        $router->group(['prefix' => 'cars'], function($router){
            $router->get('/', ['Controllers\CarController', 'index']);
            $router->get('add-car', ['Controllers\CarController', 'addForm']);
            $router->get('edit-car/{id:i}', ['Controllers\CarController', 'editForm']);
            $router->get('remove-car/{id:i}', ['Controllers\CarController', 'remove']);

            $router->get('search', ['Controllers\CarController', 'search']);

            $router->post('save-add-car', ['Controllers\CarController', 'saveAdd']);
            $router->post('save-edit-car', ['Controllers\CarController', 'saveEdit']);
            $router->post('check-car-name', ['Controllers\CarController', 'checkName']);
        });


        $router->group(['prefix' => 'brands'], function($router){
            $router->get('/', ['Controllers\BrandController', 'index']);
            $router->get('add-brand', ['Controllers\BrandController', 'addForm']);
            $router->get('edit-brand/{id:i}', ['Controllers\BrandController', 'editForm']);
            $router->get('remove-brand/{id:i}', ['Controllers\BrandController', 'remove']);

            $router->get('search', ['Controllers\BrandController', 'search']);

            $router->post('save-add-brand', ['Controllers\BrandController', 'saveAdd']);
            $router->post('save-edit-brand', ['Controllers\BrandController', 'saveEdit']);
            $router->post('check-brand-name', ['Controllers\BrandController', 'checkName']);
            
        });

        

        

        $dispatcher = new Dispatcher($router->getData());
        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
        echo $response;
    }
}

?>