<?php
//namespace JF\Blog\controller;
require_once('../model/DataBase.php');
require_once('../model/ChapterManager.php');
require_once('../model/CommentManager.php');
require_once('../config/Router.php');

use JF\Blog\model\ChapterManager;
use JF\Blog\model\CommentManager;

class FrontController
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
    	$chapterManager = new ChapterManager();
    	$deleteChapter = $chapterManager->deleteChapter();
	}

	function addComment($chapterId)
	{
		$commentManager = new \JF\Blog\model\CommentManager();
		
		require_once('../view/insertCommentView.php');
	}
	
	function insertComment($chapterId,$author,$comment)
	{
		$commentManager = new \JF\Blog\model\CommentManager();

		$affectedLines = $commentManager->chapterComment($chapterId,$author,$comment);

		if($affectedLines === false){
			throw new Exception('Impossible d\'ajouter un commentaire !');
		}
		else{
			header('Location: ../public/index.php?action=chapter&chapterId='. $chapterId);
		}
	}
}