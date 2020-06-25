
<?php
 session_start();
if(!isset($_SESSION)){

    header('Location:loginView.php');
      exit(); //arrêt prématuré au cas où
}
require '../model/LoginManager.php';//on ajoute le fichier 
?>

<!DOCTYPE html>
<html>
	<head>
    <a href="../public/index.php">Déconnexion</a></p>
  		<script src="https://cdn.tiny.cloud/1/vbl7evtg0dhgyajokozlbin5xayz3083upqby70jenjsq1oa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	</head>
	
	<body>
    <a href="../public/index.php?action=chapter&amp;chapterId;?>"class="bouton">Chapitres</a>
    <form method="post" action=" ../public/index.php?action=addChapter"?>        
      <input type="text" id="title" name="title" placeholder="Titre"/>  
  		<textarea id="newChapter" name="newChapter">
    	Jean Forteroche	
  		</textarea>
      <input type="submit" value="Publier"/>
    </form>
  		
  		<script>
    	tinymce.init({
     	 	selector: 'textarea',
     	 	height: 600,
     		plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      		toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      		toolbar_mode: 'floating',
      		tinycomments_mode: 'embedded',
      		tinycomments_author: 'Author name'
    	});
  		</script>
	</body>
</html>