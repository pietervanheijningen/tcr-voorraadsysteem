<?php


namespace App;

use PDO, PDOException;

class DatabaseConnection
{
    public $pdo;

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
        $query = $this->pdo->prepare('SELECT DISTINCT brand FROM shoes');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllShoesFromBrand($brand){
        $query = $this->pdo->prepare('SELECT name,count(*) AS amount FROM shoes WHERE brand = :brand GROUP BY name ORDER BY amount DESC');
        $query->execute([
            'brand' => $brand
        ]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
