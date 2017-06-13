<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 29/09/16
 * Time: 14:47
 */

namespace wcs;

use wcs\controller\Controller;

require_once "../vendor/autoload.php";

/**
 * Class App
 * @author 2binfree <2binfree@gmail.com>
 *
 */
class Application
{
    /**
     * Instance container
     *
     * @var Application $instance
     */
    private static $instance = null;

    /**
     * @var array
     */
    private $config;

    /**
     * @var \mysqli
     */
    private $database;

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
        $this->view = new view\View($this->getController());
    }

    /**
     * @return Application
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Application();
        }
        return self::$instance;
    }

    private function initDb()
    {
        $this->database = new \mysqli(
            $this->config['db']['host'],
            $this->config['db']['user'],
            $this->config['db']['pwd'],
            $this->config['db']['dbname']
        );
        if ($this->database->connect_errno) {
            throw new \Exception(
                "Failed to connect to MySQL : (" .
                $this->database->connect_errno .
                ") " . $this->database->connect_error
            );
        }
    }

    /**
     * @return view\View
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @return Controller
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return \Mysqli
     */
    public function getDb()
    {
        return $this->database;
    }

    /**
     * select controller and action for an url
     */
    private function initController()
    {
        $request_url = $_SERVER['REQUEST_URI'];
        if ($request_url == "/") {
            $action_name     = "index";
            $controller_name = "index";
        } else {
            $route = explode("/", $request_url);
            $controller_name = $route[1];
            if (isset($route[2])) {
                $action_name = $route[2];
            } else {
                $action_name = "index";
            }
        }
        $controller_class = "wcs\\controller\\" . ucwords($controller_name);
        $this->controller = new $controller_class($controller_name, $action_name);
    }
}
