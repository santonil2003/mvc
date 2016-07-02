<?php
namespace Core\MVC;
/**
 * base controller
 * @author sanil shrestha <web.developer.sanil@gmail.com>
 */
class BaseController {

    private $_models = array();

    /**
     * initalized view 
     */
    public function __construct() {
        $this->view = new BaseView();

        /**
         * init
         */
        if (method_exists($this, 'init')) {
            $this->init();
        }
    }

    /**
     * render Partial
     * @param type $view
     */
    public function renderPartial($view) {
        $this->view->setView($view);
        $this->view->getContent();
    }

    /**
     * render view
     * @param type $view
     */
    public function render($view) {
        $this->view->setView($view);
        $this->view->renderLayout();
    }

    /**
     * set layout for a view
     * @param type $layout
     */
    public function setlayout($layout) {
        $this->view->layout = $layout;
    }

    /**
     * 
     * @param string $url
     * @param type $terminate
     * @param type $statusCode
     */
    public function redirect($url, $terminate = true, $statusCode = 302) {
        if ($this->isAjaxRequest()) {
            exit('<script>location.replace("' . $url . '");</script>');
        } else {
            header('Location: ' . $url, $terminate, $statusCode);
        }

        if ($terminate) {
            exit();
        }
    }

    /**
     * check if request is ajax
     * @return boolean
     */
    public function isAjaxRequest() {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }
        return false;
    }

    /**
     * forward
     * @param type $action
     * @param type $controller
     * @return type
     */
    public function forward($action, $controller = null) {
        if (!empty($controller)) {
            $_GET['controller'] = $controller;
        }

        $_GET['action'] = $action;

        $controllerClass = $_GET['controller'] . 'Controller';
        $controllerPath = APP_BASE_PATH . '/controllers/' . $controllerClass . '.php';
        include_once $controllerPath;

        $Controller = new $controllerClass;

        $methodName = $action . 'Action';

        return $Controller->{$methodName}();
    }

    /**
     * 
     * @param type $model
     */
    public function getModel($modelName, $reuse = true) {

        if (!key_exists($modelName, $this->_models) || !$reuse) {
            include_once APP_BASE_PATH . DS . 'model' . DS . $modelName . '.php';
            $obj = new $modelName();
            $this->_models[$modelName] = $obj;
        }

        return $this->_models[$modelName];
    }

}
