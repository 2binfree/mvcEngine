<?php

namespace wcs\view;

use wcs\controller\Controller;

class View
{
    /**
     * @var Controller
     */
    private $controller;

    /**
     * @var string
     */
    private $viewPath;

    /**
     * View constructor.
     * @param Controller $controller
     */
    public function __construct($controller){
        $this->viewPath  = __DIR__ ."/";
        $this->viewPath .= $controller->getName() . "/";
        $this->viewPath .= $controller->getAction() . '.php';
        $this->controller = $controller;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function render(){
        if (!is_file($this->viewPath)){
            throw new \Exception('Cannot render file ' . $this->viewPath);
        }
        $action = $this->controller->getAction();
        extract($this->controller->$action());
        ob_start();
        require $this->viewPath;
        return ob_get_clean();
    }
}