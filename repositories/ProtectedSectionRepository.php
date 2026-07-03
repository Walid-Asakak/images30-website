<?php

namespace Repositories;

use Services\Database;
use PDO;

class ProtectedSectionRepository {
    private PDO $pdo;
    
    public function __construct() {
        $db = new Database();
        $this -> pdo = $db -> getConnexionDb();
    }

    // Method to retrieve a protected section by its section key
    public function getProtectedSectionByKey(string $sectionKey) {
        $stmt = $this -> pdo->prepare("
            SELECT *
            FROM protected_sections
            WHERE section_key = :section_key
            LIMIT 1
        ");
        
        $stmt->execute([
            ':section_key' => $sectionKey
        ]);
        
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }

    public function getProtectedSectionById(int $id) {
        $stmt = $this -> pdo->prepare("
            SELECT *
            FROM protected_sections
            WHERE id = :id
            LIMIT 1
        ");
    
        $stmt->execute([
            ':id' => $id
        ]);
    
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }
}