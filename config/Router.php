<?php
if (!isset($_SESSION)) {

    session_start();
}
require_once ('../controller/ChapterController.php');
require_once ('../controller/CommentController.php');
require_once ('../controller/LoginController.php');
//centralise l'appel des requêtes et instancie les controllers

class Router
{
  
    public function __construct()
    {
        $chapterController = new ChapterController();
        $commentController = new CommentController();
        $errorController = new ErrorController();
        $loginController = new LoginController();        
    }

    public function run()
    {
        try{

             if(isset($_GET['action']))
            {
                if($_GET['action'] === 'listChapters'){
                    $chapterController = new ChapterController();
                    $chapterController->listChapters();
                }
                elseif($_GET['action'] === 'chapter'){
                    $chapterController = new ChapterController();
                    $chapterController->chapter(isset($_GET['chapterId'])?$_GET['chapterId']: null);
                }
                elseif(isset($_GET['delete']) && $_GET['delete'] > 0){
                        $chapterController = new ChapterController();
                        $chapterController->deleteChapter($_GET['id']);
                        
                        listChapters();
                }
                elseif (isset($_GET['update'])){
                        $chapterController = new ChapterController();
                        $chapterController->updateChapterView($_GET['chapterId']);
                        
                        if(isset($_GET['action'])&& ($_GET['action'] == 'update')){
                            $chapterController = new ChapterController();
                            $chapterController->updateCheck();
                            
                        }
                }
                 elseif($_GET['action'] === 'addChapter'){
                    $backController = new BackController();
                    $backController->addChapter();
                }
               
                elseif ($_GET['action'] === 'addComment') {
                    $commentController = new CommentController();
                    $commentController->addComment($_GET['chapterId']);
                }
                elseif ($_GET['action'] === 'insertComment') {
                     $commentController = new CommentController();
                    $commentController->insertComment($_GET['chapterId'],$_POST['author'], $_POST['comment']);
                }
                elseif($_GET['action'] === 'signin'){
                    $loginController = new LoginController();
                    $loginController->signin();
                }
                 
                elseif($_GET['action'] === 'login'){
                    $loginController = new LoginController();
                    $loginController->login($_POST['pseudo']);
                }
                elseif($_GET['action'] === 'logout'){
                    $loginController = new LoginController();
                    $loginController->logout();
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


