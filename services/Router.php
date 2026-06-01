<?php

namespace Services;

require 'configs/settings.php';

class Router {
    private $controller;
    private $method;
    private $page;
    
    public function __construct($page) {
        $this -> page = $page;
        // If the page doesn"t exist -> error 404 :
        if(!isset(AVAILABLE_ROUTES[$page])) {
            require 'views/error/404View.php';
            exit();
        }
        
        $this -> controller = AVAILABLE_ROUTES[$page]['controller'];
        $this -> method = AVAILABLE_ROUTES[$page]['method'];
    }
    
    public function getController() {
        $controllerInstance = 'Controllers\\' . $this -> controller;
        $newController = new $controllerInstance();
        
        $method = $this -> method;
        
        $newController -> $method();
    }
}