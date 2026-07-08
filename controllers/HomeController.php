<?php

namespace Controllers;

use Services\ProtectedSectionService;


class HomeController extends BaseController {
    public function index() {
        $movieRepo = new \Repositories\CinemaRepository();
        $imageRepo = new \Repositories\MovieImageRepository();
        $documentaryRepo = new \Repositories\DocumentaryRepository();
        
        $homeMovies = $movieRepo -> getAllMovies();

        foreach ($homeMovies as $key => $movie) {
            $homeMovies[$key]['images'] = $imageRepo -> getImagesByMovieId($movie['id']);
        }

        $homeDocumentaries = $documentaryRepo -> getHomeDocumentaries();

        $this->render('views/home/homeView.php', [
            'homeMovies' => $homeMovies,
            'homeDocumentaries' => $homeDocumentaries
        ]);
        
    }

    public function showFormulasServices() {
        $this->render('views/home/formulasServicesView.php');
    }

    public function showAdditionalServices() {
        $this->render('views/home/AdditionalServicesView.php');
    }

    public function showProgDistributionServices() {
        $this->render('views/home/prog-distribution-services/progDistributionServicesView.php');
    }
}