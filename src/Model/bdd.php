<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 22/09/16
 * Time: 12:56
 */

    function getConnection($db)
    {
        $user       = "root";
        $password   = "";
        $host       = "localhost";
        //$db         = "test";

        $mysqli = new mysqli($host, $user, $password, $db);
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            die();
        }
        return $mysqli;

    }

    function execSql($mysqli, $sql){
        $result = $mysqli->query($sql);
        if ($result == 0){
            echo "failed to run query : (" . $mysqli->errno . ") " . $mysqli->error;
            die();
        }
        return $result;
    }


