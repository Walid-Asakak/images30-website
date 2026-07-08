<?php

namespace Controllers;

use Repositories\DvdRepository;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class DvdController extends BaseController {
    public function showAllDvds() {
        $dvdRepository = new DvdRepository();
        $dvds = $dvdRepository -> findAll();
        
        $this->render('views/dvd/dvdsView.php', [
            'dvds' => $dvds
        ]);
    }
}