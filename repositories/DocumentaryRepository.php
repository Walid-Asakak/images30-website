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
    public function getDocumentaryById(int $id, string $language = 'fr'): array|false {
        $stmt = $this -> pdo -> prepare("
            SELECT
                documentaries.*,
                documentary_categories.label AS category,
                documentary_translations.description AS translated_description
            FROM documentaries
            INNER JOIN documentary_categories
                ON documentaries.category_id = documentary_categories.id
            LEFT JOIN documentary_translations
                ON documentaries.id = documentary_translations.documentary_id
                AND documentary_translations.language = :language
            WHERE documentaries.id = :id
        ");

        $stmt->execute([
            ':id' => $id,
            ':language' => $language,
        ]);

        $documentary = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($documentary && !empty($documentary['translated_description'])) {
            $documentary['description'] = $documentary['translated_description'];
        }
        
        return $documentary;
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