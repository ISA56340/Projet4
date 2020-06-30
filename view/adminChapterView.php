
<?php
if(!isset($_SESSION)){ //pour vérifier qu'une session n'est pas déjà présente
    session_start();
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

    <form action="../public/index.php?action=updateid=chapterId=<?= $chapter['id'] ?>" method="post">
           
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($chapter['title']) ?>"/>
        <input type="text" id="content" name="content" value="<?= htmlspecialchars($chapter['content']) ?>"/>
  		<textarea id="newChapter" name="newChapter"  value=<?= nl2br($chapter['content']) ?>></textarea>
      		
      <input type="submit" value="Modifier"/>
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
	</body>
</html>