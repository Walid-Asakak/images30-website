<?php

namespace Repositories;

use Services\Database;
use PDO;

class CinemaRepository {
    private PDO $pdo;

    // Method to initialize the database connection used by the repository.
    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnexionDb();
    }

     // Method to retrieve all active movies ordered by category and their order for each category
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
                display_order ASC,
                title ASC
        ");
    
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to retrieve a movie by its ID
    public function getMovieById(int $id): array|false {
        $stmt = $this -> pdo->prepare("
            SELECT *
            FROM movies
            WHERE id = ?
        ");
    
        $stmt->execute([$id]);
    
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }

    // Method to search a movie by his title (for the search bar)
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

        // Method to retrieve the cover image of a movie
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
