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
    /**
     * @var \Controller
     */
    private $controller;

    /**
     * @var string
     */
    private $viewPath;

    /**
     * View constructor.
     * @param \Controller $controller
     */
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