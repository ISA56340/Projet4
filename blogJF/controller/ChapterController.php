<?php
//namespace JF\Blog\controller;

require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');


//use JF\Blog\model\ChapterManager;
//use JF\Blog\model\CommentManager;

class ChapterController
{
	/*recupère tous les chapitres et affiche un extrait de chacun*/
	function listChapters()
	{
		$chapterManager = new ChapterManager();
    	$listChapters = $chapterManager->getChapters();//appel de la méthode

		require_once('view/homeView.php');
	}

/*afficher un chapitre et commentaires associés*/	
	function chapter($chapterId)
	{
		$chapterManager = new ChapterManager();
		$commentManager = new CommentManager();

		$chapter = $chapterManager->getChapter($chapterId);
		$comments = $commentManager->getComments($chapterId);
		//var_dump($comments);
		require_once('view/chapterView.php');
	}

/*affiche la vue qui permet de créer nouveau chapitre*/
	function newChapter()
	{
		$chapterManager = new ChapterManager();
		require_once('view/newChapterView.php');
		
	}

	function addChapter()
	{
		$chapterManager = new ChapterManager();
		$chapter = $chapterManager->addChapter();
		header('Location: index.php?action=listChapters');
		
	}

	function deleteChapter($chapterId)
	{
		$chapterManager = new ChapterManager();
		$chapter = $chapterManager->deleteChapter($chapterId);
		header('Location: index.php?action=listChapters');
	}

/*récupère et affiche dans la vue un chapitre pour pouvoir le modifier*/
	function updateChapterView($chapterId)
	{
		$chapterManager = new ChapterManager();
    	$chapter = $chapterManager->getChapter($chapterId);	
		//var_dump($_GET['chapterId']);
    	require_once('view/adminChapterView.php');
		
	}

/*modifier chapitre*/
	function updateChapter($title,$content)
	{
    	$chapterManager = new ChapterManager();
    	$updateChapter = $chapterManager->updateChapter($title,$content);
    	if($updateChapter){
			header('Location: index.php?action=listChapters');
		}else{
			throw new Exception("Impossible modifier le chapitre");
			
		}	
	}
}