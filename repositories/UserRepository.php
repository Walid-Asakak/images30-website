<?php

namespace Repositories;

use Exception;
use Services\Database;
use PDO;

class UserRepository {
    private PDO $pdo;
    
    public function __construct() {
        $db = new Database();
        $this -> pdo = $db -> getConnexionDb();
    }

    public function insertUserDb(string $firstname, string $lastname, string $email, string $password) {
        $request = $this -> pdo -> prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");

        $request -> execute([
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':password' => $password,
        ]);
    }

    public function getUserByEmail(string $email): ?array {
        try {
            $request = $this -> pdo -> prepare("SELECT * FROM users WHERE email = :email");
            $request -> execute([
                ':email' => $email,
            ]);

            $user = $request->fetch(PDO::FETCH_ASSOC);
            return $user ?: null;
        }
        catch(Exception $e) {
            return null;
        }
    }
}