<?php
namespace Controllers;

use Jenssegers\Blade\Blade;

class BaseController
{

    public function render($views, $dataArr = [])
    {
        $blade = new Blade('views', 'storage');
        echo $blade->make($views, $dataArr)->render();

    }

}
