<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 22/09/16
 * Time: 12:56
 */

namespace wcs\model;

use wcs\App;

abstract class Model
{
    /**
     * @var string
     */
    protected $table;

    /**
     * @var \mysqli_result
     */
    protected $result;

    protected function execSql($sql)
    {
        $app = App::getInstance();
        if (false === $this->result = $app->getDb()->query($sql)){
            echo "failed to run query : (" . $app->getDb()->errno . ") " . $app->getDb()->error;
            die();
        }
    }

    public function getRow()
    {
        return $this->result->fetch_object("\\wcs\\Model\\UserData");
    }

    public function getTable()
    {
        return $this->table;
    }
}

