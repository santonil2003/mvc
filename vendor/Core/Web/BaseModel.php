<?php

namespace Core\Web;

use Core\Helper\Import;

Import::once(REDBEANS_PATH);



/**
 * base model
 * @author sanil shrestha <web.developer.sanil@gmail.com>
 */
class BaseModel {

    /**
     * database object
     * @var type object
     */
    protected $_db;

    /**
     * create instance of  db object
     */
    public function __construct() {
        
    }

}
