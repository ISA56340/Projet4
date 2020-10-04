<?php
//namespace JF\Blog\model;

require_once("DataBase.php");

class CommentManager extends DataBase
{
     

    public function getComments($chapterId)//récupère les commentaires associés à un id de chapitre
    {
        $db = $this->getConnection();
        $result= $db->prepare('SELECT id,author, comment, comment_date, report FROM comment WHERE chapterId = ? ORDER BY comment_date DESC');
        $result->execute([$chapterId]);
        return $result;
    }

    public function chapterComment($chapterId,$author,$comment)//poster un commentaire
    {
        $db = $this->getConnection();
        $result = $db->prepare('INSERT INTO comment (chapterId, author, comment,comment_date) VALUES (?,?,?,NOW())');
        $affectedLines=$result->execute (array($chapterId,$author,$comment));
        return $affectedLines;
        
        header('Location: index.php?action=chapter&id=' . $chapterId);
    }

}

