<?php

namespace Controllers;

use Repositories\TeamRepository;

class TeamController extends BaseController {

    public function getAllTeamMembers() {

        $teamRepository = new TeamRepository();
        $teamMembers = $teamRepository->getAllTeamMembers();

        $this->render(
            'views/team/teamView.php',
            [
                'teamMembers' => $teamMembers
            ]
        );
    }

    public function displayTeamMemberById() {
        $id = $_GET['id'] ?? null;
        
        if (!$id) {
            header('Location: index.php?page=team');
            exit;
        }
    
        $teamRepository = new TeamRepository();
        $teamMember = $teamRepository -> getTeamMemberById((int)$id);
    
        if (!$teamMember) {
            header('Location: index.php?page=team');
            exit;
        }
    
        $this->render(
            'views/team/detailTeamView.php',
            [
                'teamMember' => $teamMember
            ]
        );
    }
}