<?php

/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 29/09/16
 * Time: 17:24
 */

namespace wcs\controller;

use \wcs\Model as model;

class Index extends Controller
{

    public function __construct($name, $action)
    {
        parent::__construct($name, $action);
    }

    public function index()
    {
        $user = new model\User();
        $user->getAll();
        return array("user" => $user);
    }
}