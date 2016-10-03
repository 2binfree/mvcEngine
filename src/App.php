<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 29/09/16
 * Time: 14:47
 */

namespace wcs;

use wcs\controller\Controller;

include "../vendor/autoload.php";

class App
{
    /**
     * @var App
     */
    private static $instance = null;

    /**
     * @var array
     */
    private $config;

    /**
     * @var \mysqli
     */
    private $db;

    /**
     * @var view\View
     */
    private $view;

    /**
     * @var Controller
     */
    private $controller;

    private function __construct()
    {
        $this->config = include("../src/Configuration/config.php");
        $this->initDb();
        $this->initController();
        $this->view = new view\View($this->controller);
    }

    /**
     * @return App
     */
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

    /**
     * @return view\View
     */
    public function getView(){
        return $this->view;
    }

    /**
     * @return Controller
     */
    public function getController(){
        return $this->controller;
    }

    /**
     * @return \Mysqli
     */
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