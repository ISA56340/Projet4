<?php 
if(isset($_SESSION['connexion'])){ //pour vérifier qu'une session n'est pas déjà présente
     echo "Vous êtes connecté!";
}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf8">
		<link rel="stylesheet" href="public/css/style.css"  type="text/css"/>
		<meta name= "viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://cdn.tiny.cloud/1/vbl7evtg0dhgyajokozlbin5xayz3083upqby70jenjsq1oa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<title><?= $title ?></title>
	</head>

	<body>

		<header>
			<div class="logo">
				<img src="public/images/logo4.png" alt="logo">
			</div>
			<div id="nav">
				<ul>
					<li><a href="index.php">Accueil</a></li>
					<li><a href="index.php?action=admin">Admin</a></li>
				</ul>
			</div>
			<h1> Billet simple pour l'Alaska</h1>
			<h2> de Jean Forteroche</h2>
		</header>

		 <?= $content ?>

		 <footer>
			<div id="logo_reseaux_sociaux">
				<img src="public/images/facebook_logo.png" alt="logo_facebook">
				<img src="public/images/logo_twitter.png" alt="logo_twitter">
				<img src="public/images/logo_instagram.png" alt="logo_instagram">
			</div>
			<p>Contact</p>
			<p>Politique de confidentialité</p>
		</footer>
	</body>
</html>