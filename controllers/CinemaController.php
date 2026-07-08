<?php 

namespace Controllers;

use Repositories\CinemaRepository;
use Repositories\MovieImageRepository;

class CinemaController extends BaseController {
    
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

        $this -> render(
            'views/cinema/cinemaView.php',
            [
                'movies' => $movies,
                'moviesInProgress' => $moviesInProgress,
                'shortMovies' => $shortMovies,
                'featureFilms' => $featureFilms
            ]
        );
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
    
        $this -> render(
            'views/cinema/cinemaDetailView.php',
            [
                'movie' => $movie
            ]
        );
    } 
}