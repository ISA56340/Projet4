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
        $result = $connection->prepare('DELETE FROM chapter WHERE id= ?');
        $result->execute(array('id' => $_GET['id']));
        
        return $result;  
    }

    public function updateChapter($title, $content, $chapterId)
    {	
       	$db = new DataBase();
        $connection = $db->getConnection();
        $result = $connection->prepare('UPDATE chapter SET title=$title, content=$content WHERE id= $chapterId');
        $modifChapter = $result->execute(array(
                    'title' => $title,
                    'content' => $newChapter,
                    'id' => $chapterId
                    ));
        									                   							
        
        return $modifChapter;
    }

    public function updateChapterView($chapterId)
	{
		$db = new DataBase();
        $connection = $db->getConnection();
		$result = $connection ->prepare('SELECT id, title, content, creation_date FROM chapter WHERE id = ?');
        $result->execute([$chapterId]);
        
        return $result;
	
	}	
}
