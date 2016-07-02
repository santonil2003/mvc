<?php

defined('DEBUG') or define('DEBUG', true);
defined('ENV') or define('ENV', 'dev');


/**
 * Load framework
 */
require(__DIR__ . '/../../vendor/autoload.php');

/**
 * include application configuration
 */
require(__DIR__ . '/config/config.php');

use Core\Web\Application;

// initalize Application
$Application = new Application();
$Application->run(__DIR__);
