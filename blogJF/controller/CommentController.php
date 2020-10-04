<?php
//namespace JF\Blog\controller

require_once('model/LoginManager.php');
require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');
//use JF\Blog\model\LoginManager;
//use JF\Blog\model\ChapterManager;
//use JF\Blog\model\CommentManager;

class CommentController
{
	
	function addComment($chapterId)
	{
		$commentManager = new CommentManager();
		
		require_once('view/insertCommentView.php');
	}
	

	function insertComment($chapterId,$author,$comment)
	{
		$commentManager = new CommentManager();

		$affectedLines = $commentManager->chapterComment($chapterId,$author,$comment);

		if($affectedLines === false){
			throw new Exception('Impossible d\'ajouter un commentaire !');
		}
		else{
			header('Location:index.php?action=chapter&chapterId='. $chapterId);
		}
	}

}
		
	

