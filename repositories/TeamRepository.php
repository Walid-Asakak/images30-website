<?php

namespace Repositories;

use Exception;
use Services\Database;
use PDO;

class TeamRepository {
    private PDO $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnexionDb();
    }

    public function getAllTeamMembers(): ?array {
        try {
            $request = $this->pdo->prepare("SELECT * FROM team_members");
            $request->execute();

            return $request->fetchAll(PDO::FETCH_ASSOC);
        }

        catch (Exception $e) {
            return [];
        }
    }

    public function getTeamMemberById(int $id): ?array {
        $request = $this->pdo->prepare("SELECT * FROM team_members WHERE id = :id");
        
        $request->execute([
            ':id' => $id,
        ]);
        
        $result = $request->fetch(PDO::FETCH_ASSOC);

        return $result ?: null;
    }
}