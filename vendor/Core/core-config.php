<?php

/**
 * Core configuration
 * @author web.developer.sanil@gmail.com
 */
/**
 * Directory seperator
 */
defined('DS') or define('DS', DIRECTORY_SEPARATOR);

/**
 * core base path
 */
defined('CORE_BASE_PATH') or define('CORE_BASE_PATH', __DIR__);

/**
 * vendor base path
 */
defined('VENDOR_BASE_PATH') or define('VENDOR_BASE_PATH', CORE_BASE_PATH.'/..');

/**
 * Default controller
 */
defined('DEFAULT_CONTROLLER') or define('DEFAULT_CONTROLLER', 'index');

/**
 * Default action
 */
defined('DEFAULT_ACTION') or define('DEFAULT_ACTION', 'index');

/**
 * Default layout
 */
defined('DEFAULT_LAYOUT') or define('DEFAULT_LAYOUT', 'index');

/**
 * Debug mode
 */
defined('DEBUG') or define('DEBUG', true);
