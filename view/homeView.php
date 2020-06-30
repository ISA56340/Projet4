<?
session_start();
$pseudo = $_POST['pseudo'];
$_SESSION['pseudo'] = $pseudo;
if(!isset($_SESSION)){

    header('Location:loginView.php');
      exit(); //arrêt prématuré au cas où
}
require '../model/ChapterManager.php';
require '../model/DataBase.php';
//on inclut le fichier pour la connexion à la BDD
use JF\Blog\model\ChapterManager;
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf8">
		<link rel="stylesheet" href="../public/css/style.css"  type="text/css"/>
		<meta name= "viewport" content="width=device-width, initial-scale=1.0">
		<title>Billet simple pour l'Alaska</title>
	</head>

	<body>

		<header>
			<div class="logo">
				<img src="../public/images/logo4.png" alt="logo"></a>				
			</div>
			<div id="nav">
				<ul>
					<li><a href="../public/index.php">Accueil</a></li>
					<li><a href="../view/loginView.php">Admin</a></li>
				</ul>
			</div>
			<h1> Billet simple pour l'Alaska</h1>
			<h2> de Jean Forteroche</h2>
		</header>

		<div id="post">
			<h3>Derniers épisodes mis en ligne</h3>
				
			<!---<div id="pagination">
				<div id="flechegauche"><a href="../view/homeView.php"> < P1</a></div>
				<div id="flechedroite"><a href="../view/homeViewP2.php">P2 ></a></div>
			</div>-->

			<?php
    		$chapter = new \JF\Blog\model\ChapterManager();//creation d'un nouveau chapitre
    		$listChapters = $chapter->getChapters();//appel de la méthode
   			while($chapter=$listChapters->fetch())//boucle
    		{
       			?>
        		<div class="billets">
            		<h2><a href="../public/index.php?action=chapter&amp;chapterId=<?= htmlspecialchars($chapter['id']);?>"><?= htmlspecialchars($chapter['title']);?></a></h2> 
            		<p><?= htmlspecialchars($chapter['content']);?></p>
            		<p>Publié le : <?= htmlspecialchars($chapter['creation_date']);?></p>
            		<a href="../public/index.php?action=chapter&amp;chapterId=<?=  htmlspecialchars($chapter['id']);?>"class="bouton">Lire la suite...</a> <!---on a rediriger vers le bon url via le routeur pour voir le chapitre en entier--->
        		</div>
        		<br>

         		<?php
    		}
    		$listChapters->closeCursor();
   			?>
		</div>

		<footer>
			<div id="logo_reseaux_sociaux">
				<img src="../public/images/facebook_logo.png" alt="logo_facebook">
				<img src="../public/images/logo_twitter.png" alt="logo_twitter">
				<img src="../public/images/logo_instagram.png" alt="logo_instagram">
			</div>
			<p>Contact</p>
			<p>Politique de confidentialité</p>
		</footer>


	</body>
</html>