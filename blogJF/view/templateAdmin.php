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
		