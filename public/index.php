<?php
/**
 * User: ubuntu
 * Date: 22/09/16
 * Time: 10:35
 */
require_once "../src/App.php";

$app = new wcs\App();
echo $app->getView()->render($app->getController()->getResponse());

