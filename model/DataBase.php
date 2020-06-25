<?php
namespace JF\Blog\model;
use PDO;
use Exception;

class DataBase
{
     //Constantes
    const DB_HOST = 'mysql:host=localhost;dbname=blogjf; port=3308;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';
   
    protected $connection; //propriété qui va stocker la connexion s'il y en a une

    protected function checkConnection() //méthode qui vérifie si une connexion est présente ou non
    {
        // si la connexion est nulle et fait appel à getConnection()
        if($this->connection == null) {
            return $this->getConnection();
        }
        //Si la connexion existe, elle est renvoyée, inutile de refaire une connexion
        return $this->connection;
    }

    //Méthode de connexion à la bdd
    public function getConnection()
    {
        //Tentative de connexion à la bdd
        try{
            $connection = new PDO(DataBase::DB_HOST, DataBase::DB_USER, DataBase::DB_PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           //on renvoie la connexion dans la propriété $connection 
            return $connection;
        }
        //On lève une erreur si la connexion échoue
        catch(Exception $errorConnection)
        {
            die ('Erreur de connection:'.$errorConnection->getMessage());
        }
    }
}

