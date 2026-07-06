<?php

namespace Controllers;

use Services\ProtectedSectionService;


class HomeController {
    public function index() {
        $movieRepo = new \Repositories\CinemaRepository();
        $imageRepo = new \Repositories\MovieImageRepository();
        $documentaryRepo = new \Repositories\DocumentaryRepository();
        
        $homeMovies = $movieRepo -> getAllMovies();

        foreach ($homeMovies as $key => $movie) {
            $homeMovies[$key]['images'] = $imageRepo -> getImagesByMovieId($movie['id']);
        }

        $homeDocumentaries = $documentaryRepo -> getHomeDocumentaries();

        $view = 'views/home/homeView.php';
        require 'views/layoutView.php';
        
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

        $view = 'views/home/prog-distribution-services/progDistributionServicesView.php';
        require 'views/layoutView.php';
    }
}