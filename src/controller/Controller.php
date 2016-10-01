<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 30/09/16
 * Time: 13:50
 */

namespace wcs\controller;


class Controller
{
    protected $action;
    protected $name;

    public function __construct($name, $action)
    {
        $this->action = $action;
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function getAction(){
        return $this->action;
}

}