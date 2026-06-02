<?php

namespace Controllers;

class HomeController {
    public function index() {
        $view = 'views/home/homeView.php';
        include 'views/layoutView.php';
        
    }
}