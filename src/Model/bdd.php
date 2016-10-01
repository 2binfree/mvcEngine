<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 22/09/16
 * Time: 12:56
 */


class Model
{
    protected function execSql($mysqli, $sql)
    {
        $result = $mysqli->query($sql);
        if ($result == 0) {
            echo "failed to run query : (" . $mysqli->errno . ") " . $mysqli->error;
            die();
        }
        return $result;
    }
}

