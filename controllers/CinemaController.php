<?php 

namespace Controllers;

use Repositories\CinemaRepository;
use Repositories\MovieImageRepository;

class CinemaController {
    // Function to display all the movies in the view Cinema
    public function showAllCinema() {
        $movieRepo = new CinemaRepository();
        $imageRepo = new MovieImageRepository();
    
        $movies = $movieRepo->getAllMovies();
    
        foreach ($movies as $key => $movie) {
            $movies[$key]['images'] = $imageRepo->getImagesByMovieId($movie['id']);
        }
    
        $moviesInProgress = [];
        $shortMovies = [];
        $featureFilms = [];
    
        foreach ($movies as $movie) {
    
            switch ($movie['category']) {
    
                case 'film-en-cours':
                    $moviesInProgress[] = $movie;
                    break;
    
                case 'court-metrage':
                    $shortMovies[] = $movie;
                    break;
    
                case 'long-metrage':
                    $featureFilms[] = $movie;
                    break;
            }
        }

        $view = 'views/cinema/cinemaView.php';
        include 'views/layoutView.php';
    }

    public function displayCinemaDetailById() {
        $movieId = (int) ($_GET['id'] ?? 0);

        $movieRepo = new CinemaRepository();
        $imageRepo = new MovieImageRepository();
    
        $movie = $movieRepo->getMovieById($movieId);
    
        if (!$movie) {
            die('Film introuvable');
        }
    
        $movie['images'] = $imageRepo->getImagesByMovieId($movieId);
    
        $view = 'views/cinema/cinemaDetailView.php';
        include 'views/layoutView.php';
    } 
}