<?php
//namespace JF\Blog\model;
require_once("DataBase.php");

class ChapterManager extends DataBase
{
     
	
	public function getChapters()//récupère la liste des billets
	{
		$db = $this->getConnection();
        $result = $db->query('SELECT id, title, content, creation_date FROM chapter ORDER BY id DESC LIMIT 0,4');
        return $result;
	}

	public function getChapter($chapterId)//récupère un billet précis grace au paramètre
	{
		$db = $this->getConnection();
		$result = $db ->prepare('SELECT id, title, content, creation_date FROM chapter WHERE id = ?');
        $result->execute([$chapterId]);
        $chapter = $result->fetch();
        return $chapter;
	}

	public function addChapter()
	{
		$title = $_POST['title'];
		$content = $_POST['newChapter'];
		$db = $this->getConnection();
        $result = $connection ->prepare('INSERT INTO chapter(title, content,creation_date) VALUES (?,?,NOW())');
        $result->execute([$title,
    					  $content]);
        return $result;
	}

	public function deleteChapter()
    {
       	$db = $this->getConnection();
        $result = $db->prepare('DELETE FROM chapter WHERE id= ?');
        $result->execute(array('id' => $_GET['id']));
        
        return $result;  
    }

}