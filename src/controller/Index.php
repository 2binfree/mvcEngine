<?php

/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 29/09/16
 * Time: 17:24
 */

namespace wcs\controller;

class Index extends Controller
{

    public function __construct($name, $action)
    {
        parent::__construct($name, $action);
    }

    public function index()
    {
        return array("value" => "Bonjour");
    }
}