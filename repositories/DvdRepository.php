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

    // Get a DVD with the translated description
    public function findDvd(int $id): ?DvdModel {
        $request = $this -> pdo -> prepare("
            SELECT
                dvd.id,
                dvd.title,
                translation.description,
                dvd.price,
                dvd.cover_image_url,
                dvd.stock,
                dvd.created_at,
                dvd.updated_at,
                dvd.movie_id,
                dvd.category,
                dvd.is_active
            FROM dvds AS dvd
            INNER JOIN dvd_description_translations AS translation
                ON dvd.id = translation.dvd_id
            WHERE dvd.id = :id
            AND translation.language = :language
        ");
        
        $request ->execute([
            ':id' => $id,
            ':language' => $_SESSION['language'] ?? 'fr'
        ]);
        
        $result = $request -> fetch(PDO::FETCH_ASSOC);

        // Return the instance DvdModel if we find it else return null
        return $result ? new DvdModel($result) : null;
    }
    
    public function findAll(): array {
        $request = $this -> pdo -> prepare("
            SELECT
                dvd.id,
                dvd.title,
                translation.description,
                dvd.price,
                dvd.cover_image_url,
                dvd.stock,
                dvd.created_at,
                dvd.updated_at,
                dvd.movie_id,
                dvd.category,
                dvd.is_active
            FROM dvds AS dvd
            INNER JOIN dvd_description_translations AS translation
                ON dvd.id = translation.dvd_id
            WHERE translation.language = :language
        ");
        
        $request->execute([
            ':language' => $_SESSION['language'] ?? 'fr'
        ]);
        
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