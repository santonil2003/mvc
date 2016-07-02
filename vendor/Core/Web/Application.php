<?php

namespace Core\Web;

use Core\Exceptions\MvcException;
use Core\Helper\Debug;

include_once __DIR__ . '/../core-config.php';

/**
 * Application
 * Boot the application
 * 
 * @author sanil shrestha <web.devloper.sanil@gmail.com>
 */
class Application {

    /**
     * Run the application 
     * @param type $appBasePath
     */
    public function run($appBasePath) {
        /**
         * execute appropriate contoller's action method
         */
        try {
            /**
             * Define application base path
             */
            defined('APP_BASE_PATH') or define('APP_BASE_PATH', $appBasePath);

            /**
             * get controller and action from from url
             */
            $controller = Request::getController();
            $action = Request::getAction();

            /**
             * prepare controller class and path according to convention
             */
            $controllerClass = '\\Application\\Controllers\\' . $controller . 'Controller';
            $controllerPath = APP_BASE_PATH . '/controllers/' . $controller . 'Controller.php';

            /**
             * check if requested controller file and class exists
             * @todo use error controller and action to display errors
             */
            if (file_exists($controllerPath)) {
                /**
                 * Include requested controller
                 */
                include_once $controllerPath;
                if (class_exists($controllerClass)) {
                    $Controller = new $controllerClass;
                } else {
                    throw new MvcException($controllerClass . ' class not found!');
                }
            } else {
                throw new MvcException($controllerPath . ' not found!');
            }

            /**
             * prepare method
             */
            $methodName = $action . 'Action';

            if (!method_exists($Controller, $methodName)) {
                $controllerPath . ' not found!';
                $msg = " Method $methodName not found on $controllerClass Class ";
                throw new MvcException($msg);
            }


            call_user_method($methodName, $Controller);
        } catch (MvcException $exc) {

            if (defined('DEBUG') && DEBUG) {
                echo $exc->getExceptionMessage();
                echo $exc->getExceptionTraceAsString();
            } else {
                Debug::l($exc->getMessage(), 'application-exception.txt');
                Debug::l($exc->getTraceAsString(), 'application-exception.txt');
            }
        }
    }

}
