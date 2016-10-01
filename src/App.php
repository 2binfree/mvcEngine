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
    private static $instance = null;

    private $config;
    private $db;
    private $view;
    private $controller;

    private function __construct()
    {
        $this->config = include("../src/Configuration/config.php");
        $this->initDb();
        $this->initController();
        $this->view = new view\View($this->controller);
    }

    public static function getInstance() {

        if(is_null(self::$instance)) {
            self::$instance = new App();
        }
        return self::$instance;
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

    public function getDb(){
        return $this->db;
    }

    private function initController(){
        $url = $_SERVER['REQUEST_URI'];
        if ($url == "/"){
            $actionName     = "index";
            $controllerName = "index";
        } else {
            $route = explode("/", $url);
            $controllerName = $route[1];
            if (isset($route[2])){
                $actionName = $route[2];
            } else {
                $actionName = "index";
            }
        }
        $controllerClass = "wcs\\controller\\" . ucwords($controllerName);
        $this->controller = new $controllerClass($controllerName, $actionName);
    }
}