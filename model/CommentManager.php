<?php
namespace JF\Blog\model;

require_once("DataBase.php");

class CommentManager extends DataBase
{
     public function __construct() {
       
    }

    public function getComments($chapterId)//récupère les commentaires associés à un id de chapitre
    {
        $db = new DataBase();
        $connection = $db->getConnection();
        $result= $connection->prepare('SELECT id, chapterId, author, comment, comment_date FROM comment WHERE chapterId = ? ORDER BY comment_date DESC');
        $result->execute([$chapterId]);
        return $result;
    }

    public function chapterComment($chapterId,$author,$comment)//poster un commentaire
    {
        $db = new DataBase();
        $connection = $db->getConnection();
        $result = $connection->prepare('INSERT INTO comment (chapterId, author, comment,comment_date) VALUES (?,?,?,NOW())');
        $affectedLines=$result->execute (array($chapterId,$author,$comment));
        return $affectedLines;
        
        header('Location: ../public/index.php?action=chapter&id=' . $chapterId);
    }

}

