<?php

require_once('model/LoginManager.php');
require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');


class LoginController
{
	function signin($pseudo, $password)
	{
	    $loginManager = new LoginManager;
		// Vérification de la validité des informations
		if (!empty($password1) && !empty($password2) && !empty($pseudo))
		{ 
	   		if($password1 == $password2){
	    		$signin = $loginManager->signinCheck($pseudo, $password);
			}
			else{
				echo "Erreur, vos mots de passe ne sont pas identiques";
			}
		}
	}

	function login($pseudo, $password)
	{
		if(isset($pseudo) && isset($password)) {
			$loginManager = new LoginManager;
			try {
				$check = $loginManager->loginCheck($pseudo, $password);
			} catch (Exception $e) {
				echo 'Erreur :' .$e->getMessage();
			}

	    	//$verif = password_verify($_POST['password'],$result['password']);
	    	if($check)
	    	{
	    		session_start();
	        	$_SESSION['connexion'] = $_POST['pseudo'] ;
	    		//header('Location: ../public/index.php');
	        //require_once("../view/adminView.php");
	        	//$_SESSION['pseudo'] = $result['pseudo'];
	        	header("Location:view/adminView.php");
	    	}
	    	else
	   		{
	   			echo 'Identifiant ou mot de passe incorrect';
	   		}
		} else {
			echo 'Identifiant ou mot de passe incorrect';
		}		
	}

	function admin(){
		require_once("./view/loginView.php");
	}
	
 }
