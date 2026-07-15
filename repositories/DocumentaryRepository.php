<?php

namespace Repositories;

use PDO;
use Services\Database;

class DocumentaryRepository {
    private PDO $pdo;

    public function __construct() {
        $db = new Database();
        $this -> pdo = $db -> getConnexionDb();
    }

    // Method to retrieve all documentaries  with their protected section label
    public function getAllDocumentaries(): array {
        $stmt = $this -> pdo ->query("
            SELECT
                documentaries.*,
                documentary_categories.label as category
            FROM documentaries
            
            INNER JOIN documentary_categories
                ON documentaries.category_id = documentary_categories.id
            ORDER BY
                documentary_categories.id ASC,
                documentaries.display_order ASC
        ");

        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    // Method to retrieve a documentary by its id
    public function getDocumentaryById(int $id): array|false {
        $stmt = $this -> pdo -> prepare("
            SELECT
                documentaries.*,
                documentary_categories.label AS category
            FROM documentaries
            INNER JOIN documentary_categories
                ON documentaries.category_id = documentary_categories.id
            WHERE documentaries.id = :id
    ");

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getHomeDocumentaries(): array {
        $stmt = $this->pdo->query("
            SELECT *
            FROM documentaries
            WHERE show_on_home = 1
            ORDER BY display_order ASC
        ");
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to search a documentary (for the searchbar)
    public function searchDocumentaries(string $search): array {
        $stmt = $this -> pdo -> prepare("
            SELECT *
            FROM documentaries
            WHERE title LIKE :search
            ORDER BY display_order ASC
        ");
    
        $stmt -> execute([
            ':search' => '%' . $search . '%'
        ]);
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}