<?php
/**
 * User: ubuntu
 * Date: 22/09/16
 * Time: 10:35
 */
require_once "../src/Application.php";

$application = wcs\Application::getInstance();
echo $application->getView()->render();
