<?php
//namespace JF\Blog\controller
require_once('../model/DataBase.php');
require_once('../model/LoginManager.php');
//use JF\Blog\model\LoginManager;

class BackController
{
	
	function signin()
	{
    $loginManager = new \JF\Blog\model\LoginManager;
	// Vérification de la validité des informations
	if (isset($_POST['formsend']))
        {
          	extract($_POST);

        	if (!empty($password1) && !empty($password2) && !empty($pseudo))
        	{ 
           		if($password1 == $password2){
            		$signin = $loginManager->signinCheck();
				}
				else{
				echo "Erreur, vos mots de passe ne sont pas identiques";
				}
			}
		}
	}

	function login($pseudo)
	{
		$loginManager = new \JF\Blog\model\LoginManager;   
    	$login = $loginManager->loginCheck();
    	$result = $login -> fetch();

    	$verif = password_verify($_POST['password'],$result['password']);

    	if($verif)
    	{
    		$_SESSION['pseudo'] = $pseudo;
    		header('Location: ../view/createChapterView.php');
    	}
    	else
   		{
   			echo 'Identifiant ou mot de passe incorrect';
   		}
	}

	function logout() 
	{
    // Suppression des variables de session et de la session
    	session_star();
   	 	session_destroy();
   	 	header('Location: ../view/loginView.php');
	}

}		

