<?php 

namespace Controllers;

use Repositories\ProtectedSectionRepository;

class ProtectedSectionController {
    
    // Method to show the form to access the content hidden behind a password
    public function showProtectedSectionForm() {
        $sectionKey = $_GET['section'] ?? '';
        $id = (int) ($_GET['id'] ?? 0);

        if (empty($sectionKey) || $id <= 0) {
            header('Location: index.php?page=home');
            exit;
        }

        $view = 'views/protectedSections/formUnlockSectionView.php';
        require 'views/layoutView.php';
    }
    
    // Method to authenticate the user and grant access to the protected section
    public function authenticateUser() {
        $sectionKey = $_GET['section'] ?? '';
        $id = (int) ($_GET['id'] ?? 0);
        $password = trim($_POST['password'] ?? '');

        if (empty($sectionKey) || $id <= 0 || empty($password)) {
            header('Location: index.php?page=home');
            exit;
        }

        $protectedSectionRepository = new ProtectedSectionRepository();

        $protectedSection = $protectedSectionRepository->getProtectedSectionByKey($sectionKey);

        if (!$protectedSection) {
            header('Location: index.php?page=home');
            exit;
        }

        if (password_verify($password, $protectedSection['password_hash'])) {

            if (!isset($_SESSION['protected_sections'])) {
                $_SESSION['protected_sections'] = [];
            }

            $_SESSION['protected_sections'][$sectionKey] = true;
            
            header("Location: index.php?page=documentary-detail&id={$id}");
            exit;
        }

        $error = "Identifiants incorrects.";

        $view = 'views/protectedSections/formUnlockSectionView.php';
        require 'views/layoutView.php';
    }
}