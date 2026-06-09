<?php 

namespace Services;

use PDO;
use PDOException;

class Database {

    private ?PDO $pdo = null;

    public function __construct() {
        try {
            // Get the values from the env file :
            $username = $_ENV['DB_USERNAME'];
            $password = $_ENV['DB_PASSWORD'];
            $host = $_ENV['DB_HOST'];
            $dbName = $_ENV['DB_NAME'];

            $this -> pdo = new PDO(

                "mysql:host=$host;dbname=$dbName;charset=utf8",
                $username,
                $password
            );

            $this -> pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            die ('Erreur de connexion à la base de données');
        }
    }

    public function getConnexionDb() {
        return $this -> pdo;
    }
}
