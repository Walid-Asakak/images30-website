<?php

namespace Controllers;

class HomeController {
    public function index() {
        $view = 'views/home/homeView.php';
        include 'views/layoutView.php';
        
    }

    public function showFormulasServices() {
        $view = 'views/home/formulasServicesView.php';
        require 'views/layoutView.php';
    }

    public function showAdditionalServices() {

        $view = 'views/home/AdditionalServicesView.php';
        require 'views/layoutView.php';
    }

    public function showProgDistributionServices() {
        
    }
}