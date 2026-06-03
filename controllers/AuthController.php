<?php

namespace Controllers;
use Repositories\UserRepository;

class AuthController {
    public function register() {
        $error = null;

        if(!empty($_POST)) {
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);
            $email = strtolower(trim($_POST['email']));
            $password = $_POST['password'];
            
            $userRepository = new UserRepository();
            $isExistingUser = $userRepository -> getUserByEmail($email);

            if($isExistingUser) {
                $error = 'Cette adresse e-mail existe déjà';
            }

            else {
                // To hash the password in the database
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $userRepository ->insertUserDb($firstname, $lastname, $email, $hashedPassword);
            }

            header('Location: index.php?page=login');
            exit;
        }
        
        $view = 'views/register/registerView.php';
        include 'views/layoutView.php';
    }

    public function login() {
        $error = null;

        if(!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            $user = $userRepository -> getUserByEmail($email);

            // if the password is correct and the user exists -> he is connected
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['isLogged'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['is_admin'] = $user['is_admin'];

                header('Location: index.php?page=home');
                exit;
            }

            $error = 'Identifiants incorrects';
        }
        
        $view = 'views/login/loginView.php';
        include 'views/layoutView.php';
    }

    public function logout() {
        session_unset();
        session_destroy();

        header('Location:index.php?page=home');
        exit;
    }
}