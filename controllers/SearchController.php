<?php

namespace Controllers;

use Repositories\DocumentaryRepository;
use Repositories\CinemaRepository;
use Repositories\EventRepository;

class SearchController extends BaseController {
    public function search() {

        // Retrieve the searched text
        $search = trim($_GET['search'] ?? '');

        // If the searchbar is empty
        if ($search === '') {
            header('Location: index.php?page=home');
            exit;
        }

        // Repositories
        $documentaryRepo = new DocumentaryRepository();
        $cinemaRepo = new CinemaRepository();
        $eventRepo = new EventRepository();

        // The methods to make the research :
        $documentaries = $documentaryRepo->searchDocumentaries($search);
        $movies = $cinemaRepo->searchMovies($search);
        $events = $eventRepo->searchEvents($search);

        $this -> render(
            'views/search/searchView.php',
            [
                'search' => $search,
                'documentaries' => $documentaries,
                'movies' => $movies,
                'events' => $events
            ]
        );
    }
}