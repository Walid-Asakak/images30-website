<?php

namespace Repositories;
use Services\Database;
use PDO;

class EventRepository {
    private PDO $pdo;
    
    public function __construct() {
        $db = new Database();
        $this -> pdo = $db -> getConnexionDb();
    }

    public function getAllEvents(): array {
        $stmt = $this -> pdo-> query("
            SELECT *
            FROM events
        ");
    
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertEventIntoDb(string $title, string $description, string $location, string $eventDate, string $coverImageUrl): int {
        $stmt = $this -> pdo -> prepare("
            INSERT INTO events (
                title,
                description,
                location,
                event_date,
                cover_image_url
            )
            VALUES (
                :title,
                :description,
                :location,
                :event_date,
                :cover_image_url
            )
        ");

        $stmt -> execute([
            ':title' => $title,
            ':description' => $description,
            ':location' => $location,
            ':event_date' => $eventDate,
            ':cover_image_url' => $coverImageUrl,
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function getEventById(int $id) {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM events
            WHERE id = :id
        ");

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Method to search an event (for the searchbar) :
    public function searchEvents(string $search): array {
        $stmt = $this -> pdo -> prepare("
            SELECT *
            FROM events
            WHERE title LIKE :search
            ORDER BY id DESC
        ");

        $stmt -> execute([
            ':search' => '%' . $search . '%'
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}