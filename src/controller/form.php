<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 22/09/16
 * Time: 11:07
 */

    require "bdd.php";

    $firstname   = $_POST["firstname"];
    $lastname    = $_POST["lastname"];
    $email       = $_POST["mail"];
    $password    = $_POST["pwd"];

    $conn = getConnection();

    $sql = "INSERT INTO user (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password');";

    $result = execSql($conn, $sql);

    header('Location: ../public/index.php');






