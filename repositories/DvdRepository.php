<?php

namespace Repositories;

use Services\Database;
use PDO;
use Models\DvdModel;

class DvdRepository {
    private PDO $pdo;
    
    public function __construct() {
        $db = new Database();
        $this -> pdo = $db -> getConnexionDb();
    }

    public function findDvd(int $id): ?DvdModel {
        $request = $this -> pdo -> prepare("SELECT * FROM dvds WHERE id = :id");
        $request ->execute([
            ':id' => $id,
        ]);
        
        $result = $request -> fetch(PDO::FETCH_ASSOC);

        // Return the instance DvdModel if we find it else return null
        return $result ? new DvdModel($result) : null;
    }
    
    public function findAll(): array {
        $request = $this->pdo->query("SELECT * FROM dvds");
        $results = $request->fetchAll(PDO::FETCH_ASSOC);
        
        // Return an empty array if there are no dvds :
        if (empty($results)) return [];
        
        // Array which is used to stock all dvds :
        $dvds = [];
        
        foreach ($results as $dvd) {
            $dvds[] = new DvdModel($dvd);
        }
        
        return $dvds;
    }
}