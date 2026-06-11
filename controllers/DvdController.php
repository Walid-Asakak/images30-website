<?php

namespace Controllers;

use Repositories\DvdRepository;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class DvdController {
    public function showAllDvds() {
        $dvdRepository = new DvdRepository();
        $dvds = $dvdRepository -> findAll();
        
        $view = 'views/dvd/dvdsView.php';
        include 'views/layoutView.php';
    }
}