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

	
	function chapter($chapterId)
	{
		$chapterManager = new ChapterManager();
		$commentManager = new CommentManager();

		$chapter = $chapterManager->getChapter($chapterId);
		$comments = $commentManager->getComments($chapterId);
		//var_dump($comments);
		require_once('view/chapterView.php');
	}

	function addChapter()
	{
		$chapterManager = new ChapterManager();
		$chapter = $chapterManager->addChapter();
		header('Location: index.php?action=listChapters');
	}

	function deleteChapter()
	{
		$chapterManager = new ChapterManager();
		$chapter = $chapterManager->addChapter();
	}
}