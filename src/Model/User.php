<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 03/10/16
 * Time: 08:09
 */

namespace wcs\Model;

class User extends Model
{

    public function __construct()
    {
        $this->table = "user";
    }

}
