<?php

namespace Core\Database;

/**
 * load readbeans;
 */
include_once __DIR__ . '/r.php';

/**
 * Database 
 * @package core
 * @author Sanil Shrestha <web.developer.sanil@gmail.com>
 * @reference http://www.redbeanphp.com/
 */
class Db {

    private $_db;

    /**
     * connect db
     * @param type $host
     * @param type $user
     * @param type $password
     * @param type $dbname
     */
    public function __construct($host, $user, $password, $dbname) {
        $this->_db = mysql_connect($host, $user, $password);
        mysql_select_db($dbname);
    }

    /**
     * disconnect db
     */
    public function __destruct() {
        mysql_close($this->_db);
    }

    /**
     * query
     * @param type $ql
     * @return type
     */
    public function query($ql) {
        $result = mysql_query($sql);
        return $result;
    }

    /**
     * select as row
     * @param type $sql
     * @return type
     */
    public function select($sql) {
        $result = $this->query($sql);
        return $this->toArray($result);
    }

    /**
     * toarray
     * @param type $result
     * @return array
     */
    public function toArray($result) {
        $rows = array();

        while ($row = mysql_fetch_array($result)) {
            $columns = array();

            foreach ($row as $key => $value) {
                if (is_string($key)) {
                    $columns[$key] = $value;
                }
            }

            array_push($rows, $columns);
        }

        return $rows;
    }

}
