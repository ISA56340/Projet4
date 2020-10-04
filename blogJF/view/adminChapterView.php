<?php $title = 'adminChapter'; ?> 

<?php ob_start(); ?>
     <a href="index.php?">Déconnexion</a></p>

    <form action="index.php?action=updateCheck" method="post">
           
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($chapter['title']) ?>"/>
      
  		<textarea id="newChapter" name="newChapter"  value="<?= htmlspecialchars($chapter['content']) ?>"></textarea>
      		
      <input type="submit" value="Modifier"/>
      <input type="submit" value="Supprimer"/>
    </form>
  		
  		<script>
    	tinymce.init({
        language: 'fr_FR',
        forced_root_block : "", 
        force_br_newlines : true,
        force_p_newlines : false,
     	 	selector: 'textarea',
     	 	height: 600,
     		plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      		toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      		toolbar_mode: 'floating',
      		tinycomments_mode: 'embedded',
      		tinycomments_author: 'Author name',
    	});
  		</script>
  
<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
