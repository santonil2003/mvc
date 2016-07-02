<?php

namespace Core\Helper;

use Core\Exceptions\MvcException;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Import
 *
 * @author sanil
 */
class Import {

    /**
     * import once
     * @param type $path
     * @throws MvcException
     */
    public static function once($path) {
        if (file_exists($path)) {
            include_once $path;
        } else {
            throw new MvcException($path . ' does not exist');
        }
    }

}
