<?php

/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 29/09/16
 * Time: 17:24
 */

namespace wcs\controller;

use wcs\Model\User;

/**
 * Class Index
 * @package wcs\controller
 */
class Index extends Controller
{

    /**
     * Index constructor.
     * @param string $name
     * @param string $action
     */
    public function __construct($name, $action)
    {
        parent::__construct($name, $action);
    }

    /**
     * @return array
     */
    public function index()
    {
        $user = new User();
        $user->getAll();
        return ["user" => $user];
    }
}
