<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 29/09/16
 * Time: 19:15
 */

namespace wcs\controller;


class Controller
{
    public $controllerName;
    public $actionName;

    public function __construct()
    {
        $url = $_SERVER['REQUEST_URI'];
        if ($url == "/"){
            $this->actionName       = "index";
            $this->controllerName   = "index";
        } else {
            $route = explode("/", $url);
            $this->controllerName = $route[1];
            if (isset($route[2])){
                $this->actionName = $route[2];
            } else {
                $this->actionName = "index";
            }
        }
    }

    public function getController(){
        $controllerClass = "wcs\\controller\\" . ucwords($this->controllerName);
        return new $controllerClass();
    }

    public function getAction(){
        return $this->actionName;
    }

    public function getResponse(){
        $action = $this->actionName;
        return $this->getController()->$action();
    }
}