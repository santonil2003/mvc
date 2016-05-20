<?php

class errorController extends BaseController {

    public function actionNotFoundAction() {
        $this->message = "Action not found !";
        $this->render('error');
    }

    public function controllerNotFoundAction() {
        $this->message = "Controller not found!";
        $this->render('error');
    }

}
