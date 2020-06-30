<?php
namespace JF\Blog\model;

require_once("DataBase.php");

class LoginManager extends DataBase
{
    public function __construct() {
       
    }

    public function loginCheck()    
    {
        
        $pseudo = $_POST['pseudo'];
        $db = new DataBase();
        $connection = $db->getConnection();
        $req = $connection->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
        $req-> execute(['pseudo' => $pseudo]);
        return $req;
        //var_dump($req);
    } 
      
   


    public function signinCheck() {
    // Insertion
      $pseudo = $_POST['pseudo'];
      $hashpass = password_hash($_POST['password1'], PASSWORD_DEFAULT);
      $db = new DataBase();
      $connection = $db->getConnection();
      $result = $connection->prepare('INSERT INTO user(pseudo, password,creation_date) VALUES(:pseudo, :password, NOW())');
      $result->execute(array(
        'pseudo' => $pseudo,
        'password' => $hashpass));
    }

}