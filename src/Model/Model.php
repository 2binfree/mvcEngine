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
     * @var \mysqli_result
     */
    protected $result;

    /**
     *
     */
    public function getAll()
    {
        $sql = "select * from " . static::TABLE;
        $this->execSql($sql);
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
        return static::TABLE;
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool
     */
    protected function execSql($sql, $params = array())
    {
        $db = App::getInstance()->getDb();
        $statement = $db->prepare($sql);
        if (count($params) > 0) {
            $types = $this->convertType($params);
            $statement->bind_param($types, $params);
        }
        if (false === $statement->execute()) {
            throw new \mysqli_sql_exception("failed to run query : (" . $db->errno . ") " . $db->error);
        }
        $this->result = $statement->get_result();
    }

    /**
     * @param $params
     * @return string
     */
    private function convertType($params)
    {
        $types = "";
        foreach ($params as $param) {
            switch (gettype($param)) {
                case 'boolean':
                case 'integer':
                    $types .= 'i';
                    break;
                case 'double':
                    $types .= 'd';
                    break;
                case 'string':
                    $types .= 's';
                    break;
                case 'array':
                case 'object':
                case 'resource':
                case 'NULL':
                case 'unknown type':
                    throw new \mysqli_sql_exception('Binding parameter type unexpected (' . gettype($param) . ')');
                    break;
            }
        }
        return $types;
    }
}
