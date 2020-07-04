<?php
 	session_start();
	require_once '../model/LoginManager.php';//on inclut le fichier pour la connexion à la BDD
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
				<img src="../public/images/logo4.png" alt="logo">
			</div>
			<div id="nav">
				<ul>
					<li><a href="../public/index.php">Accueil</a></li>
					<li><a href="../view/loginView.php?">Admin</a></li>
				</ul>
			</div>
			<h1> Billet simple pour l'Alaska</h1>
			<h2> de Jean Forteroche</h2>
		</header>

		<div id = "formulaire">
			<form action="../public/index.php?action=listChapters" method="POST">
				<h3>Connexion</h3>
  				<label for="login">Identifiant</label><br/><br/>
  					<input type="text" id="pseudo" name="pseudo" placeholder="Identifiant" required/><br/><br/>
  				<label for="mdp">Mot de passe</label><br/><br/>
  					<input type="password" id="password" name="password" placeholder="Mot de Passe" required/><br/><br/>
  				<div class="envoi">
  					<input type="submit" name="formlogin" id="formlogin" value="Se connecter"/>
  				</div>  				
			</form> 
			
			<form action="../public/index.php?action=signin" method="POST">
				<h3>Inscription</h3>
  				<label for="login">Identifiant</label><br/><br/>
  					<input type="text" id="pseudo" name="pseudo" placeholder="Identifiant" required/><br/><br/>
  				<label for="mdp">Mot de passe</label><br/><br/>
  					<input type="password" id="password1" name="password1" placeholder="Mot de passe" required/><br/><br/>
  					<input type="password" id="password2" name="password2" placeholder="Confirmer votre Mot de passe" required/><br/><br/>
  				<div class="envoi">
  					<input type="submit" name="formsend" id="formsend" value="Créer son compte"/>
  				</div>  				
			</form> 
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