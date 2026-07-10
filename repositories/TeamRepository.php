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

    // Retrieves all team members according to the selected language
    public function getAllTeamMembers(): ?array {
        try {
            $request = $this->pdo->prepare("
                SELECT
                    team_member.id,
                    team_member.firstname,
                    team_member.lastname,
                    team_member.photo_url,
                    team_member.video_url,
                    translation.job_title,
                    translation.description
                FROM team_members AS team_member
                INNER JOIN team_member_translations AS translation
                    ON team_member.id = translation.team_member_id
                WHERE translation.language = :language
        ");
    
            $request->execute([
                ':language' => $_SESSION['language'] ?? 'fr'
            ]);
    
            return $request->fetchAll(PDO::FETCH_ASSOC);
        }
    
        catch (Exception $e) {
            return [];
        }
    }

    // Retrieves all team members according to the selected language
    public function getTeamMemberById(int $id): ?array {
        $request = $this->pdo->prepare("
            SELECT
                team_member.id,
                team_member.firstname,
                team_member.lastname,
                team_member.photo_url,
                team_member.video_url,
                translation.job_title,
                translation.description
            FROM team_members AS team_member
            INNER JOIN team_member_translations AS translation
                ON team_member.id = translation.team_member_id
            WHERE team_member.id = :id
            AND translation.language = :language
        ");
    
        $request->execute([
            ':id' => $id,
            ':language' => $_SESSION['language'] ?? 'fr'
        ]);
        
        $result = $request->fetch(PDO::FETCH_ASSOC);
    
        return $result ?: null;
    }
}