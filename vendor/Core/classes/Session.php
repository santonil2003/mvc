<?php

/**
 * session class
 * @package model
 * @author Sanil Shrestha <web.developer.sanil@gmail.com>
 */
class Session {

    /**
     * save data to session
     * @param type $key
     * @param type $val
     */
    public static function set($key, $val) {
        self::start();
        $_SESSION[$key] = $val;
    }

    /**
     * check if session exists
     * @param type $key
     * @return boolean
     */
    public static function check($key) {
        self::start();
        if (isset($_SESSION[$key])) {
            return true;
        }

        return false;
    }

    /**
     * get data from session
     * @param type $key
     * @return boolean
     */
    public static function get($key) {
        self::start();

        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return false;
    }

    /**
     * delete data from session
     * @param type $key
     */
    public static function delete($key) {
        self::start();
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * flush session
     */
    public static function flush() {
        self::start();
        session_destroy();
    }

    /**
     * set session id
     * @param type $id
     * @return type
     */
    public static function setSessionId($id = null) {
        selft::start();
        session_id($id);
    }

    /**
     * get session id
     * @return type
     */
    public static function getSessionId() {
        selft::start();
        return session_id();
    }

    /**
     * start session if not started
     */
    public static function start() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

}
