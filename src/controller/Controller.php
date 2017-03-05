<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 30/09/16
 * Time: 13:50
 */

namespace wcs\controller;


abstract class Controller
{
    /**
     * current controller action
     * @var string
     */
    protected $action;

    /**
     * Controller name
     * @var string
     */
    protected $name;

    /**
     * Controller constructor.
     * @param $name string
     * @param $action string
     */
    public function __construct($name, $action)
    {
        $this->action = $action;
        $this->name = $name;
    }

    /**
     * return controller name
     * @return string
     */
    public function getName(){
        return $this->name;
    }

    /**
     * return controller action name
     * @return string
     */
    public function getAction(){
        return $this->action;
    }
}
