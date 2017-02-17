<?php

include 'model/model.php';

class LoginModel extends Model
{
	//protected $pdo;
    //public $errors = array();

    //public $messages = array();

    public function __construct()
    {

        //session_start();
		// dołączone z Model inaczej nie działa

		    try {
            require 'config/sql.php';
            $this->pdo=new PDO('mysql:host='.$host.';dbname='.$dbase, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(DBException $e) {
            echo 'The connect can not create: ' . $e->getMessage();
        }

     if (isset($_GET["logout"])) {
            $this->doLogout();
        }
       else if (isset($_POST["login"])) {
            $this->dologinWithPostData();
        } 
		else if (isset($_POST['register'])){
				$this->register();
		}
    }
		

		
	
    private function dologinWithPostData()
    {

        if (empty($_POST['user_name'])) {
            //$this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            //$this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {
				
			$records = $this->pdo->prepare('SELECT * FROM  users WHERE user_name = :username');

			//addslashes protect from sql injection
            //filtry zamiast isset, addslashes
			$user_name = addslashes($_POST['user_name']);
			
			$records->bindParam(':username', $user_name);
			$records->execute();
			$results = $records->fetch(PDO::FETCH_ASSOC);

            //hash
			$hash = hash('sha256', $_POST['user_password']);
			if(count($results) > 0 && $hash== $results['user_pass']){
				$_SESSION['user_name'] = $results['user_name'];
				$_SESSION['user_login_status'] = 1;
				header_remove(); 
				header('Location: index.php');

			}else{
				echo'wrong password';
			
			}
				 
				

        }
    }

    public function doLogout()
    {
        $_SESSION = array();
        session_destroy();
        echo "You have been logged out.";
    }
/*
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }

        return false;
    }
*/
	public function register()
	{
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {	
		//hash
		$hash = hash('sha256', $_POST['user_password']);
		
        $ins=$this->pdo->prepare('INSERT INTO users (user_name, user_pass) VALUES (
            :user_name, :user_pass)');
        $ins->bindValue(':user_name', addslashes($_POST['user_name']), PDO::PARAM_STR);
        $ins->bindValue(':user_pass', $hash, PDO::PARAM_STR);
        $ins->execute();		
		
		echo 'zarejestrowany';
		
		
		}
	}
	
	
}






















?>