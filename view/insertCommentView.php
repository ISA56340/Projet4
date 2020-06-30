<?php
if(!isset($_SESSION)){ //pour vérifier qu'une session n'est pas déjà présente
    session_start();
}

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
		<div class="logo">
			<img src="../public/images/logo4.png" alt="logo">
		</div>

		<div id="nav">
			<ul>
				<li><a href="../public/index.php">Accueil</a></li>
				<li><a href="../view/loginView.php?">Admin</a></li>
			</ul>
		</div>

		<h1>Ajouter un commentaire</h1>

		<form method="post" action="../public/index.php?action=insertComment&amp;chapterId=<?= htmlspecialchars($_GET['chapterId']); ?>">
			<label for="author">Auteur</label><br/>
			<input type="text" id="author" name="author"/><br/>
			<label for="comment" class="commentaire">Commentaire</label><br/>
			<textarea id="comment" name="comment" rows="5" cols="60"></textarea><br/>
			<input type="submit" value="Envoyer"/>
		</form>	
	</body>
		