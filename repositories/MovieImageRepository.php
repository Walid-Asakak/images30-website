<?php

namespace Repositories;

use Exception;
use Services\Database;
use PDO;

class MovieImageRepository {
    private PDO $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnexionDb();
    }

    // Function to get all images which are used to illustrate each movie
    public function getImagesByMovieId(int $movieId): array {
        $stmt = $this->pdo->prepare("
            SELECT image_url 
            FROM movie_images 
            WHERE movie_id = ?
        ");

        $stmt->execute([$movieId]);
        
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}