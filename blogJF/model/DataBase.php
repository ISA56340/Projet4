<?php
//namespace JF\Blog\model;


class DataBase
{
     //Constantes
    const DB_HOST = 'mysql:host=localhost;dbname=blogjf; port=3308;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';

    //Méthode de connexion à la bdd
    protected function getConnection()
    {
        //Tentative de connexion à la bdd
        try{
            $this->connection = new PDO(DataBase::DB_HOST, DataBase::DB_USER, DataBase::DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //On renvoie la connexion
            return $this->connection;
        }
        //On lève une erreur si la connexion échoue
        catch(Exception $errorConnection)
        {
            die ('Erreur de connection:'.$errorConnection->getMessage());
        }
    }
}

