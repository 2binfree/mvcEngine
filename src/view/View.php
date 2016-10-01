<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 29/09/16
 * Time: 19:09
 */

namespace wcs\view;

use wcs\App;

class View
{
    private $controller;
    private $viewPath;

    public function __construct($controller){
        $this->viewPath  = __DIR__ ."/";
        $this->viewPath .= $controller->getName() . "/";
        $this->viewPath .= $controller->getAction() . '.php';
        $this->controller = $controller;
    }

    public function render(){
        $action = $this->controller->getAction();
        extract($this->controller->$action());
        ob_start();
        require $this->viewPath;
        return ob_get_clean();
    }
}