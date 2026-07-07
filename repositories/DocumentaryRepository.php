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

    // Method to retrieve all documentaries belonging to a protected section
    public function getDocumentariesByProtectedSectionId(int $protectedSectionId): array {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM documentaries
            WHERE protected_section_id = :protected_section_id
            ORDER BY display_order ASC
        ");

        $stmt->execute([
            ':protected_section_id' => $protectedSectionId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to retrieve all documentaries  with their protected section label
    public function getAllDocumentaries(): array {
        $stmt = $this->pdo->query("
            SELECT
                documentaries.*,
                protected_sections.label as category
            FROM documentaries
            
            INNER JOIN protected_sections
                ON documentaries.protected_section_id = protected_sections.id
            ORDER BY
                protected_sections.id ASC,
                documentaries.display_order ASC
        ");

        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    // Method to retrieve a documentary by its id
    public function getDocumentaryById(int $id): array|false {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM documentaries
            WHERE id = :id
            LIMIT 1
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