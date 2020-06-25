<?php
require_once ('../controller/FrontController.php');
require_once ('../controller/BackController.php');
//centralise l'appel des requêtes et instancie les controllers

class Router
{
  
    public function __construct()
    {
        $frontController = new FrontController();
        $errorController = new ErrorController();
        $backController = new BackController();
        
    }
    public function run()
    {
        try{

             if(isset($_GET['action']))
            {
                if($_GET['action'] === 'listChapters'){
                    $frontController = new FrontController();
                    $frontController->listChapters();
                }
                elseif($_GET['action'] === 'chapter'){
                    $frontController = new FrontController();
                    $frontController->chapter($_GET['chapterId']);

                    /*if (isset($_GET['delete'])) {
                        deleteCheck();
                        listChapters();
                    }*/
                }
                elseif($_GET['action'] === 'addChapter'){
                    $frontController = new FrontController();
                    $frontController->addChapter();
                }
                elseif ($_GET['action'] === 'addComment') {
                    $frontController = new FrontController();
                    $frontController->addComment($_GET['chapterId']);
                }
                elseif ($_GET['action'] === 'insertComment') {
                    $frontController = new FrontController();
                    $frontController->insertComment($_GET['chapterId'],$_POST['author'], $_POST['comment']);
                }
                elseif($_GET['action'] === 'signin'){
                    $backController = new BackController();
                    $backController->signin();
                }
                 
                elseif($_GET['action'] === 'login'){
                    $backController = new BackController();
                    $backController->login($_POST['pseudo']);
                }
                elseif($_GET['action'] === 'logout'){
                    $backController = new BackController();
                    $backController->logout();
                }
                else
                {
                    echo 'page inconnue';
                } 
            } else{
                require_once '../view/homeView.php'; //retour à l'accueil
            }
        }
        catch (Exception $e)
        {
            echo 'Erreur :' .$e->getMessage();
        }
    }  
}


