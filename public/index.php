<?php
 
//controleur frontal qui appelle le routeur et intercepte toutes les requêtes
require_once ('../config/Router.php');
require_once ('../controller/FrontController.php');//on ajoute le fichier 
require_once ('../controller/BackController.php');
require_once ('../controller/ErrorController.php');

$router = new Router();
$router->run();