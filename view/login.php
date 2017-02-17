<?php
include 'view/view.php';

class LoginView extends View{
    
	public function  index() {
        $art=$this->loadModel('login');
        $this->render('login');
    }

}
?>
