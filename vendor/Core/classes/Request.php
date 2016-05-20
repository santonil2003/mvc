<?php

/**
 * Request class
 * @package model
 * @author Sanil Shrestha <web.developer.sanil@gmail.com>
 */
class Request {

    /**
     * create URL
     * @param type $controller
     * @param type $action
     * @param array $params
     */
    public static function createUrl($controller = "", $action = "", array $params = array()) {

        $urlParams = "";

        foreach ($params as $key => $value) {
            $urlParams.="&$key=$value";
        }

        if (empty($controller)) {
            $controller = DEFAULT_CONTROLLER;
        } elseif (empty($action)) {
            $action = DEFAULT_ACTION;
        }

        $url = 'index.php?controller=' . $controller . '&action=' . $action . $urlParams;

        return $url;
    }

    /**
     * get controller
     * @return type
     */
    public static function getController() {
        $_GET['controller'] = self::getGet('controller', DEFAULT_CONTROLLER);
        return $_GET['controller'];
    }

    /**
     * get default action
     * @return type
     */
    public static function getAction() {
        $_GET['action'] = self::getGet('action', DEFAULT_ACTION);
        return $_GET['action'];
    }

    /**
     * Returns whether this is an AJAX (XMLHttpRequest) request.
     * @return boolean whether this is an AJAX (XMLHttpRequest) request.
     */
    public static function getIsAjaxRequest() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    /**
     * Returns whether this is an Adobe Flash or Adobe Flex request.
     * @return boolean whether this is an Adobe Flash or Adobe Flex request.
     * @since 1.1.11
     */
    public static function getIsFlashRequest() {
        return isset($_SERVER['HTTP_USER_AGENT']) && (stripos($_SERVER['HTTP_USER_AGENT'], 'Shockwave') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'Flash') !== false);
    }

    /**
     * Returns the server name.
     * @return string server name
     */
    public static function getServerName() {
        return $_SERVER['SERVER_NAME'];
    }

    /**
     * Returns the server port number.
     * @return integer server port number
     */
    public static function getServerPort() {
        return $_SERVER['SERVER_PORT'];
    }

    /**
     * Returns the URL referrer, null if not present
     * @return string URL referrer, null if not present
     */
    public static function getUrlReferrer() {
        return isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
    }

    /**
     * Returns the user agent, null if not present.
     * @return string user agent, null if not present
     */
    public static function getUserAgent() {
        return isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null;
    }

    /**
     * Returns the user IP address.
     * @return string user IP address
     */
    public static function getUserHostAddress() {
        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
    }

    /**
     * Returns the user host name, null if it cannot be determined.
     * @return string user host name, null if cannot be determined
     */
    public static function getUserHost() {
        return isset($_SERVER['REMOTE_HOST']) ? $_SERVER['REMOTE_HOST'] : null;
    }

    /**
     * get $_POST
     * @param type $key
     * @param type $default
     * @return type
     */
    public static function getPost($key, $default = '') {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        }

        return $default;
    }

    /**
     * get $_GET
     * @param type $key
     * @param type $default
     * @param type $nonEmpty
     * @return type
     */
    public static function getGet($key, $default = '', $nonEmpty = false) {
        if ($nonEmpty) {
            if (isset($_GET[$key]) && !empty($_GET[$key])) {
                return $_GET[$key];
            }
        }

        if (isset($_GET[$key])) {
            return $_GET[$key];
        }

        return $default;
    }

    /**
     * get $_Request
     * @param type $key
     * @param type $default
     * @return type
     */
    public static function getRequest($key, $default = '') {
        if (isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        }

        return $default;
    }

    /**
     * get value (advance isset)
     * @param type $array
     * @param type $key
     * @param type $default
     * @return type
     */
    public static function getValue($array, $key, $default = '') {

        if (!is_array($array)) {
            (array) $array;
        }

        if (isset($array[$key]) && !empty($array[$key])) {
            return $array[$key];
        }

        return $default;
    }

    /**
     * get base url
     * @param type $is_absolute
     * @return type
     */
    public static function getBaseUrl($is_absolute = false) {
        $path = pathinfo($_SERVER['PHP_SELF']);
        $abs_path = str_replace("\\", "/", $path['dirname']);
        $abs_path = ($abs_path == "/") ? $abs_path : $abs_path . '/';
        if ($is_absolute) {
            return $abs_path;
        } else {
            $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
            return $protocol . $_SERVER['HTTP_HOST'] . $abs_path;
        }
    }

}
