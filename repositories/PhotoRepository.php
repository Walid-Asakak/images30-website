<?php
// Class to make the links between the events and their pictures
namespace Repositories;

use Services\Database;
use PDO;

class PhotoRepository {
    private PDO $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnexionDb();
    }

    public function getPhotosByEventId(int $eventId): array {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM photos
            WHERE event_id = :event_id
            ORDER BY id
        ");
        
        $stmt->execute([
            ':event_id' => $eventId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertPhoto(
        int $eventId,
        string $imagePath,
        bool $isFirst,
        string $textAlt
    ): void {

        $stmt = $this->pdo->prepare("
            INSERT INTO photos (
                event_id,
                image_path,
                is_first,
                text_alt
            )
            VALUES (
                :event_id,
                :image_path,
                :is_first,
                :text_alt
            )
        ");

        $stmt->execute([
            ':event_id' => $eventId,
            ':image_path' => $imagePath,
            ':is_first' => $isFirst,
            ':text_alt' => $textAlt
        ]);
    }
}