<?php

namespace Repositories;

use Exception;
use Services\Database;
use PDO;

class CinemaRepository {
    private PDO $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnexionDb();
    }

    public function getAllMovies(): array {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM movies
            WHERE is_active = 1
            ORDER BY
                CASE category
                    WHEN 'film-en-cours' THEN 1
                    WHEN 'court-metrage' THEN 2
                    WHEN 'long-metrage' THEN 3
                    ELSE 4
                END,
                title ASC
        ");
    
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMovieById(int $id): array|false {
        $stmt = $this -> pdo->prepare("
            SELECT *
            FROM movies
            WHERE id = ?
        ");
    
        $stmt->execute([$id]);
    
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }

    // Method to search a movie (for the searchbar) :
        public function searchMovies(string $search): array {
            $stmt = $this->pdo->prepare("
                SELECT *
                FROM movies
                WHERE title LIKE :search
            ");
        
            $stmt->execute([
                ':search' => "%$search%"
            ]);
        
            $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            foreach ($movies as &$movie) {
                $movie['image'] = $this -> getCoverImageMovie($movie['id']);
            }
        
            return $movies;
        }

        public function getCoverImageMovie(int $movieId): ?string {
            $stmt = $this->pdo->prepare("
                SELECT image_url
                FROM movie_images
                WHERE movie_id = :id
                LIMIT 1
            ");

            $stmt->execute([
                ':id' => $movieId
            ]);

            $image = $stmt->fetchColumn();

            return $image ?: null;
        }
}
