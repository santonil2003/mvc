<?php

defined('DEBUG') or define('DEBUG', true);
defined('ENV') or define('ENV', 'dev');


/**
 * Load framework
 */
require(__DIR__ . '/../vendor/Core/autoload.php');

/**
 * include application configuration
 */
require(__DIR__ . '/config/config.php');



/**
* Database connection
* http://www.redbeanphp.com
*/
R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
// freeze beans
R::freeze(true);

// initalize Application
$Application = new Application();
$Application->run(__DIR__);

// close database connection
 R::close();