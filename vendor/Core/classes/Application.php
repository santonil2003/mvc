<?php

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
        $controllerClass = $controller . 'Controller';
        $controllerPath = APP_BASE_PATH . '/controllers/' . $controllerClass . '.php';

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
                $msg = $controllerClass . ' class not found!';
                exit($msg);
            }
        } else {
            $msg = $controllerPath . ' not found!';
            exit($msg);
        }

        /**
         * prepare method
         */
        $methodName = $action . 'Action';

        if (!method_exists($Controller, $methodName)) {
            $msg = " Method $methodName not found on $controllerClass Class ";
            exit($msg);
        }

        /**
         * execute appropriate contoller's action method
         */
        try {
            $Controller->{$methodName}();
        } catch (Exception $exc) {
            
            if(defined('DEBUG') && DEBUG){
                 Debug::r($exc->getMessage());
                 Debug::r($exc->getTraceAsString());
            } else {
                Debug::l($exc->getMessage(), 'application-exception.txt');
                Debug::l($exc->getTraceAsString(), 'application-exception.txt');
            }
           
        }
    }

}
