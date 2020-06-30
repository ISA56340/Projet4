
<?php
//namespace JF\Blog\controller;
require_once('../model/DataBase.php');
require_once('../model/CommentManager.php');
require_once('../config/Router.php');

//use JF\Blog\model\ChapterManager;
use JF\Blog\model\CommentManager;

class CommentController

{
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