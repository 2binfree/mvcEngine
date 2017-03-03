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

    /**
     * execute sql code
     * return data into $result property
     * @param $sql string
     */
    protected function execSql($sql)
    {
        $app = App::getInstance();
        if (false === $this->result = $app->getDb()->query($sql)){
            throw new \mysqli_sql_exception("failed to run query : (" . $app->getDb()->errno . ") " . $app->getDb()->error);
        }
    }

    /**
     * Return select result into custom object
     * Class must exist, class name = model . "Data"
     * @return object|\stdClass
     */
    public function getRow()
    {
        $class = get_class($this) . "Data";
        return $this->result->fetch_object($class);
    }

    /**
     * return sql table name
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }
}

