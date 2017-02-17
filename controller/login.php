<?php

include 'controller/controller.php';

class LoginController extends Controller{
	
    public function index() {
        $view=$this->loadView('login');
		$view->index();
	}

    public function insert() {
        $model=$this->loadModel('login');
        $model->insert($_POST);
    }

}

?>
