<?php $title = 'adminChapter'; ?> 

<?php ob_start(); ?>
     <a href="index.php?">Déconnexion</a></p>

    <form action="index.php?action=updateChapter&chapterId=<?= $chapter['id'] ?>" method="post">
           
        <label>Titre :<input type="text" id="title" name="title" value="<?= htmlspecialchars($chapter['title']) ?>"/></label>
      
  		<textarea id="newChapter" name="newChapter"> <?= htmlspecialchars($chapter['content']) ?> </textarea>
      		
       <a href ="index.php?action=delete&amp;chapterId=<?= $chapter['id'] ?>">Supprimer</a> |
       <input type="submit" value="Modifier"/> 
    </form>
  		
  		
<script src="public/js/textEditor.js"></script> 

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
