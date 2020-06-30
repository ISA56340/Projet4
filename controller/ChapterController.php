<?php
//namespace JF\Blog\controller;
require_once('../model/DataBase.php');
require_once('../model/ChapterManager.php');
require_once('../config/Router.php');

use JF\Blog\model\ChapterManager;
use JF\Blog\model\CommentManager;

class ChapterController
{
	function listChapters()
	{
		$chapter = new \JF\Blog\model\ChapterManager();
    	$listChapters = $chapter->getChapters();//appel de la méthode

		require_once('../view/homeView.php');
	}

	function chapter($chapterId)
	{
		$chapterManager = new \JF\Blog\model\ChapterManager();
		$commentManager = new \JF\Blog\model\CommentManager();

		$chapter = $chapterManager->getChapter($_GET['chapterId']);	
		$comments = $commentManager->getComments($_GET['chapterId']);

		require_once('../view/chapterView.php');
	}
 	
 	function addChapter()
	{
		$chapterManager = new \JF\Blog\model\ChapterManager();
		$chapter = $chapterManager->addChapter();
		header('Location: ../public/index.php?action=listChapters');
	}

	function deleteChapter()
	{
		if (isset($_GET['delete']) && $_GET['delete'] > 0) {
    		$chapterManager = new \JF\Blog\model\ChapterManager();
    		$deleteChapter = $chapterManager->deleteChapter();
    	}
    		require_once('../view/adminChapterView.php');
  		//header('Location: ../public/index.php?action=listChapters');	
	}

	function updateCheck()
	{
		if (
        isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['newChapter']) && !empty($_POST['newChapter'])){
       		updateChapter();
    	}

	}

	function updateChapter($title, $content, $chapterId)
	{
    	$chapterManager = new \JF\Blog\model\ChapterManager();;
    	$modifChapter = $chapterManager->updateChapter($title, $content, $chapterId);
    	
  		header('Location: ../public/index.php?action=chapter&id=' .$_GET['id']);	
	}

	function updateChapterView($chapterId)
	{
		$chapterManager = new \JF\Blog\model\ChapterManager();
    	$chapter = $chapterManager->getChapter($_GET['chapterId']);	
		$comments = $commentManager->getComments($_GET['chapterId']);

		require_once('../view/adminChapterView.php');
	}
}