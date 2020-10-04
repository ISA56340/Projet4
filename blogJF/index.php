<?php
session_start();
require_once ('controller/ChapterController.php');
require_once ('controller/CommentController.php');
require_once ('controller/LoginController.php');
//centralise l'appel des requêtes 



     
        try{

             if(isset($_GET['action']))
            {
                if($_GET['action'] === 'listChapters'){
                    $chapterController = new ChapterController();
                    $chapterController->listChapters();
                }
                elseif($_GET['action'] === 'chapter'){
                    $chapterController = new ChapterController();
                    $chapterController->chapter($_GET['chapterId']);
                }
                elseif ($_GET['action'] === 'addComment') {
                    $commentController = new CommentController();
                    $commentController->addComment($_GET['chapterId']);
                }
                elseif ($_GET['action'] === 'insertComment') {
                    $commentController = new CommentController();
                    $commentController->insertComment($_GET['chapterId'],$_POST['author'], $_POST['comment']);
                }
                elseif($_GET['action'] === 'reportComment'){
                    $commentController = new CommentController();
                    $commentController->reportComment($_GET['commentId']);
                }
                elseif($_GET['action'] === 'signin'){
                    $loginController = new LoginController();
                    $loginController->signin($_POST['pseudo'], $_POST['password']);
                }
                elseif($_GET['action'] === 'login'){
                    $loginController = new LoginController();
                    $loginController->login($_POST['pseudo'], $_POST['mypassword']);
                }
                 elseif($_GET['action'] === 'admin'){
                    $loginController = new LoginController();
                    $loginController->admin();
                }
                 elseif($_GET['action'] === 'logout'){
                    $loginController = new LoginController();
                    $loginController->logout();
                }
                 elseif($_GET['action'] === 'addChapter'){
                     $chapterController = new ChapterController();
                    $chapterController->addChapter();
                }
                 elseif($_GET['action'] == 'delete') {
                    if(isset($_GET['delete']) && $_GET['delete'] > 0){
                        $chapterController = new ChapterController();
                        $chapterController->deleteChapter($_GET['id']);
                        
                        listChapters();
                    }
                }
                elseif($_GET['action'] == 'update'){
                    $chapterController = new ChapterController();
                    $chapterController->updateChapterView($_GET['chapterId']);    
                }
                elseif($_GET['action'] == 'updateCheck'){
                    $chapterController = new ChapterController();
                    $chapterController->updateCheck();
                }
                else{
                    echo 'page inconnue';
                } 
            } else{
                $chapterController = new ChapterController();
                $chapterController->listChapters();
            }
        }
        catch (Exception $e)
        {
            echo 'Erreur :' .$e->getMessage();
        }


