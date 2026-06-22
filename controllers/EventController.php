<?php

namespace Controllers;

use Repositories\EventRepository;
use Repositories\PhotoRepository;

class EventController {

    public function showAllEvents() {

        $eventRepository = new EventRepository();
        $events = $eventRepository->getAllEvents();
        
        $view = 'views/event/eventsView.php';
        include 'views/layoutView.php';
    }

    public function showEventDetail() {
        $id = (int) $_GET['id'];

        $eventRepository = new EventRepository();
        $photoRepository = new PhotoRepository();
    
        $event = $eventRepository->getEventById($id);
    
        $photos = $photoRepository->getPhotosByEventId($id);
        
        $view = 'views/event/detailEventView.php';
        require 'views/layoutView.php';
    }
}