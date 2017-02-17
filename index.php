<?php
date_default_timezone_set('Europe/Berlin');
/*
TODO:
- ładny error przy próbie tworzenia konta o nazwie co istnieje
-haszowanie haseł - done
-SQL injection (form logowania/rejestracji) - done
-XSS (treści notatek) - done
- profile admina usera, pokazanie tablicy userów jeśli jesteś adminem, ewentualnie usuniecie
-edycja notatek w userze i adminie
-sortowanie notatek w tabelce
- zamiana isset na php'owe filtry

*/
	session_start();
//WYLOGOWANIE
if(isset($_GET['logout'])){
	$_SESSION = array();
    session_destroy();
	header('Location: index.php');
     //echo "You have been logged out.";
	exit();
}

//sprawdzenie zalogowania

 if (isset($_SESSION['user_login_status']) && $_SESSION['user_login_status'] == 1) {
					
		if(@$_GET['task']=='articles') {
			include 'controller/articles.php';
			$ob = new ArticlesController();
			$ob->$_GET['action']();
		} else {
			include 'controller/articles.php';
			$ob = new ArticlesController();
			$ob->index();
		}
		
} else {

	include 'controller/login.php';
	$obj = new LoginController();
	$obj->index();

	exit();		
    }
?> 