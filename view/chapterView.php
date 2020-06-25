<?php
session_start();
/* session_start();
if(!isset($_SESSION)){

    header('Location:loginView.php');
      exit(); //arrêt prématuré au cas où
}*/
//require '../model/DataBase.php';//on inclut le fichier pour la connexion à la BDD
require_once '../model/ChapterManager.php';//on ajoute le fichier Post.php
require_once '../model/CommentManager.php';

use JF\Blog\model\ChapterManager;
use JF\Blog\model\CommentManager;
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
					<li><a href="../view/loginView.php">Admin</a></li>
				</ul>
			</div>
			<h1> Billet simple pour l'Alaska</h1>
			<h2> de Jean Forteroche</h2>
		</header>
			<?php
    		$chapter = new \JF\Blog\model\ChapterManager();
    		$listChapters = $chapter->getChapter($_GET['chapterId']);
   			$chapter = $listChapters->fetch();
       			?>
        		<div class="billets">
        			<p>Publié le : <?= htmlspecialchars($chapter['creation_date']);?></p>
            		<h2><?= htmlspecialchars($chapter['title']);?></h2>
            		<p><?= htmlspecialchars($chapter['content']);?></p>
            		 <a href="../public/index.php">Retour à l'accueil</a>
            	<?php 
            		if (isset($_SESSION['admin']))
            	{
           		?>
              		<a href ="../public/index.php?action=chapter&delete=<?= $chapter['id'] ?>">Supprimer</a>
              		<a href ="../public/index.php?action=chapter&id=<?= $chapter['id'] ?>">Modifier</a>
     			 <?php
           		}
      			?>
            		
        		</div>
        		<br>
         		<?php
    		$listChapters->closeCursor();
   			?>
		<div id="commentaires">
			<h3>Commentaires</h3>
        <?php
        $comment = new \JF\Blog\model\CommentManager();
        $comments = $comment->getComments($_GET['chapterId']);
        $comment = $comments->fetch()
            ?>
            <h4><?= htmlspecialchars($comment['author']);?></h4>
            <p><?= htmlspecialchars($comment['comment']);?></p>
            <p>Posté le <?= htmlspecialchars($comment['comment_date']);?></p>
            <?php
        
        $comments->closeCursor();
        ?>    
		</div>
		
		<div id="your_comment">
			<h3></h3>
			<a href="../public/index.php?action=addComment&amp;chapterId=<?= $_GET['chapterId']?>" class="ajoutcomment">Ajouter un commentaire</a>
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