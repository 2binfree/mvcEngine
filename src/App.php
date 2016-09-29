<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 29/09/16
 * Time: 14:47
 */

namespace wcs;

include "../vendor/autoload.php";

class App
{
    private $config;
    private $db;
    private $controller;
    private $view;

    public function __construct()
    {
        $this->config = include("../src/Configuration/config.php");
        $this->initDb();
        $this->controller = new controller\Controller();
        $this->view = new view\View($this->controller);
    }

    private function initDb(){
        $this->db = new \mysqli(
            $this->config['db']['host'],
            $this->config['db']['user'],
            $this->config['db']['pwd'],
            $this->config['db']['dbname']
        );
        if ($this->db->connect_errno) {
            throw new \Exception("Failed to connect to MySQL : (" . $this->db->connect_errno . ") " . $this->db->connect_error);
        }
    }

    public function getView(){
        return $this->view;
    }

    public function getController(){
        return $this->controller;
    }
}