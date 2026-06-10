<?php

namespace Controllers;

use Repositories\DvdRepository;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class DvdController {
    public function buyDvd() {
        $dvdRepository = new DvdRepository();
        $dvds = $dvdRepository -> findAll();
        
        $view = 'views/dvd/dvdsView.php';
        include 'views/layoutView.php';
    }

    public function paymentProcessDvd() {
        $error = '';

        // Récupération des données
        $lastName = trim($_POST['lastname'] ?? '');
        $firstName = trim($_POST['firstname'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phoneNumber = trim($_POST['phone'] ?? '');
        $address = trim($_POST['address'] ?? '');
        $city = trim($_POST['city'] ?? '');
        $postal = trim($_POST['postal'] ?? '');
        $consent = $_POST['consent'] ?? null;

        // Check if the form is filled :
        if (empty($firstName) || empty($lastName) || empty($email) || empty($phoneNumber) || empty($address) || empty($city) || empty($postal)) {
            $error = 'Veuillez remplir tous les champs.';
        }

        // For RGPD
        elseif (!$consent) {
            $error = 'Veuillez accepter la collecte des données personnelles.';
        }

        // Check email
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Adresse email invalide.';
        }

        // If there is an error -> redirection to the form
        if (!empty($error)) {
            $view = 'views/dvd/dvdsView.php';
            include 'views/layoutView.php';
            return;
        }

        // Get the private key Stripe from .env
        Stripe::setApiKey($_ENV['STRIPE_PRIVATE_KEY']);

        // Create session Stripe
        $session = Session::create([
            'payment_method_types' => ['card'],
            'mode' => 'payment',

            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'DVD Studio Cinéma',
                    ],
                    'unit_amount' => 3500,
                ],
                'quantity' => 1,
            ]],

            // Redirection :
            'success_url' => $_ENV['APP_URL'] . '/index.php?page=home',
            'cancel_url'  => $_ENV['APP_URL'] . '/index.php?page=dvd',
        ]);

        // No problem everything is working : Redirection to Stripe
        header('Location: ' . $session->url);
        exit;
    }
}