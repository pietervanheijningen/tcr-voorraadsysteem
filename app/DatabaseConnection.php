<?php


namespace App;

use PDO, PDOException;

class DatabaseConnection
{
    private $pdo;

    public function __construct(){

        try{
            $this->pdo = new PDO('mysql:host='.getenv('DB_HOST').
                ';dbname='.getenv('DB_NAME'),
                getenv('DB_USER'),
                getenv('DB_PASS')
            );

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getAllBrands(){
        $query = $this->pdo->prepare('select distinct brand from shoes');
        $query->execute();

        return $query->fetchAll();
    }
}
