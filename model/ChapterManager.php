<?php
namespace JF\Blog\model;
require_once("DataBase.php");

class ChapterManager extends DataBase
{
	
	public function getChapters()//récupère la liste des billets
	{
		$db = new DataBase();
        $connection = $db->getConnection();
        $result = $connection->query('SELECT id, title, content,creation_date FROM chapter ORDER BY id DESC');
        return $result;
	}

	public function getChapter($chapterId)//récupère un billet précis grace au paramètre
	{
		$db = new DataBase();
        $connection = $db->getConnection();
		$result = $connection ->prepare('SELECT id, title, content, creation_date FROM chapter WHERE id = ?');
        $result->execute([$chapterId]);
        return $result;
	}

	public function addChapter()
	{
		$title = $_POST['title'];
		$content = $_POST['newChapter'];
		$db = new DataBase();
        $connection = $db->getConnection();
        $result = $connection ->prepare('INSERT INTO chapter(title, content,creation_date) VALUES (?,?,NOW())');
        $result->execute([$title,
    					  $content]);
        return $result;
	}	

	public function deleteChapter()
    {
       	$db = new DataBase();
        $connection = $db->getConnection();
        $result = $connection->prepare('DELETE FROM chapter WHERE id= :id');
        $result->execute(array(
                    'id' => $_GET['delete']
                    ));
        
        return $result;  
    }
}
