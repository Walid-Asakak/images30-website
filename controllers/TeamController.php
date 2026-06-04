<?php

namespace Controllers;

use Repositories\TeamRepository;

class TeamController {

    public function getAllTeamMembers() {

        $teamRepository = new TeamRepository();
        $teamMembers = $teamRepository->getAllTeamMembers();

        $view = 'views/team/teamView.php';
        include 'views/layoutView.php';
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
    
        $view = 'views/team/detailTeamView.php';
        include 'views/layoutView.php';
    }
}