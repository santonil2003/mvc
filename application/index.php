<?php

defined('DEBUG') or define('DEBUG', true);
defined('ENV') or define('ENV', 'dev');


/**
 * Load framework
 */
require(__DIR__ . '/../vendor/autoload.php');

/**
 * include application configuration
 */
require(__DIR__ . '/config/config.php');

use Core\MVC\Application;
use Core\MVC\Db;

$Db = new Db();
/**
 * Database connection
 * http://www.redbeanphp.com
 */
R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
// freeze beans
R::freeze(false);

// initalize Application
$Application = new Application();
$Application->run(__DIR__);

// close database connection
R::close();
