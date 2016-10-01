<?php
/**
 * User: ubuntu
 * Date: 22/09/16
 * Time: 10:35
 */
require_once "../src/App.php";

$app = wcs\App::getInstance();
echo $app->getView()->render();

