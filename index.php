<?php

// Start the session for the authentification :
session_start();

// Autoloader : 
spl_autoload_register(function($class) {
    $filePath = lcfirst(str_replace('\\', '/', $class));
    $fileName = $filePath . '.php';
    
    if(file_exists($fileName)) {
        include $fileName;
    }
});

// Default route : 
$page = $_GET['page'] ?? 'home';

$router = new Services\Router($page);
$router -> getController();

