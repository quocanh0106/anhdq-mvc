<?php
namespace mvc\Webroot;

use mvc\Config\Core;
use mvc\Router;
use mvc\Request;
use mvc\Dispatcher;

/* namespace */
define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
/* url folder source */
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
require __DIR__ . '/../vendor/autoload.php';

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>