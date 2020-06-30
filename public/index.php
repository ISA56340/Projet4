<?php
 
//controleur frontal qui appelle le routeur et intercepte toutes les requêtes
require_once ('../config/Router.php');
require_once ('../controller/ChapterController.php');//on ajoute les fichiers 
require_once ('../controller/CommentController.php');
require_once ('../controller/LoginController.php');
require_once ('../controller/ErrorController.php');

$router = new Router();
$router->run();