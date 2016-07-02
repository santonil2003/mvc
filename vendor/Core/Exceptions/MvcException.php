<?php

namespace Core\Exceptions;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CoreException
 *
 * @author sanil
 */
class MvcException extends \Exception {

    public function getExceptionMessage() {
        return '<div class="mvc-exception-message">' . $this->getMessage() . '<hr/></div>';
    }

    public function getExceptionTraceAsString() {
        return '<div class="mvc-exception-message">' . $this->getTraceAsString() . '<hr/></div>';
    }

}
