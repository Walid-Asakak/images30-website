<?php

namespace Controllers;

use Repositories\EventRepository;
use Repositories\PhotoRepository;

class EventController extends BaseController {

    public function showAllEvents() {

        $eventRepository = new EventRepository();
        $events = $eventRepository->getAllEvents();
        
        $this->render('views/event/eventsView.php', [
            'events' => $events
        ]);
    }

    public function showEventDetail() {
        $id = (int) $_GET['id'];

        $eventRepository = new EventRepository();
        $photoRepository = new PhotoRepository();
    
        $event = $eventRepository->getEventById($id);
    
        $photos = $photoRepository->getPhotosByEventId($id);
        
        $this->render('views/event/detailEventView.php', [
            'event' => $event,
            'photos' => $photos
        ]);
    }
}