<?php
require 'model/LoginManager.php';//on ajoute le fichier 

$title = 'admin'; ?> 

<?php ob_start(); ?>

<a href="index.php?">Déconnexion</a>



<a href="index.php">Modifier ou supprimer un chapitre</a><br/><br/>
<a href="createChapterView.php">Créer un nouveau chapitre</a>

<?php $content = ob_get_clean(); ?>
 

<?php require('template.php'); ?>
