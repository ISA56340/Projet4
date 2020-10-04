<?php $title = 'Chapter'; ?> 

<?php ob_start(); ?>

        <div class="billets">
        	<p>Publié le : <?= htmlspecialchars($chapter['creation_date']);?></p>
            <h2><?= htmlspecialchars($chapter['title']);?></h2>
            <p><?= htmlspecialchars($chapter['content']);?></p>
            <a href="index.php">Retour à l'accueil</a>

        </div>
        <br>
        
		<div id="commentaires">
			<h3>Commentaires</h3>
        <?php
        foreach ($comments as $id=>$comment){
        ?>
            <h4><?= htmlspecialchars($comment['author']);?></h4>
            <p><?= htmlspecialchars($comment['comment']);?></p>
            <p>Posté le <?= htmlspecialchars($comment['comment_date']);?></p>
        <?php
        }
        ?>    
		</div>
		
		<div id="your_comment">
			<h3></h3>
			<a href="index.php?action=addComment&amp;chapterId=<?= $_GET['chapterId']?>" class="ajoutcomment">Ajouter un commentaire</a> |
		</div>
		
		<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>