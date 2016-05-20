<?php

/**
 * Base view
 * @author sanil shrestha <web.developer.sanil@gmail.com>
 */
class BaseView {

    public $view;
    public $layout = false;

    /**
     * set view
     * @param type $view
     */
    public function setView($view) {
        $this->view = $view;
    }

    /**
     * get widget
     * @param type $view
     * @param type $vars
     * @return type
     */
    public function renderWidget($view, $vars = array()) {
        $viewPath = APP_BASE_PATH . DS . 'views' . DS . $view . '.php';

        if (!file_exists($viewPath)) {
            exit($viewPath . ' not found!');
        }

        foreach ($vars as $key => $value) {
            $this->$key = $value;
        }

        include $viewPath;
    }

    /**
     * get content to be rendered
     */
    public function getContent() {
        if ($this->view) {
            $viewPath = APP_BASE_PATH . DS . 'views' . DS . $this->view . '.php';

            if (file_exists($viewPath)) {
                include $viewPath;
            } else {
                echo $viewPath . ' not found!';
            }
        } else {
            echo 'View not defined';
        }
    }

    /**
     * render main layout
     */
    public function renderLayout() {

        if ($this->layout) {
            $layoutPath = APP_BASE_PATH . DS . 'layouts' . DS . $this->layout . '.php';

            if (file_exists($layoutPath)) {
                include $layoutPath;
            } else {
                $msg = $layoutPath . '.php not found!';
                exit($msg);
            }
        } else {
            include APP_BASE_PATH . DS . 'layouts' . DS . 'index.php';
        }
    }

    /**
     * include Script
     * @param type $url
     * @param type $controller
     * @param type $action
     */
    public function includeScript($url, $controller = null, $action = null) {
        if (empty($controller)) {
            echo '<script src="' . $url . '" type="text/javascript"></script>';
        } else if ($controller == $_GET['controller']) {
            if (empty($action)) {
                echo '<script src="' . $url . '" type="text/javascript"></script>';
            } else if ($action == $_GET['action']) {
                echo '<script src="' . $url . '" type="text/javascript"></script>';
            }
        }
    }

}
