<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 29/09/16
 * Time: 19:09
 */

namespace wcs\view;

class View
{
    private $viewPath;

    public function __construct($controller)
    {
        $this->viewPath  = __DIR__ ."/";
        $this->viewPath .= $controller->controllerName . "/";
        $this->viewPath .= $controller->actionName . '.php';
    }

    public function render($data){
        extract($data);
        ob_start();
        require $this->viewPath;
        return ob_get_clean();
    }
}