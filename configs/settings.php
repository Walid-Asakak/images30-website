<?php

const AVAILABLE_ROUTES = [
    // ALL ROUTES FOR HOME PAGES :
    'home' => [
        'controller' => 'HomeController',
        'method' => 'index',
    ],

    'formulas-services' => [
        'controller' => 'HomeController',
        'method' => 'showFormulasServices',
    ],

    'additional-services' => [
        'controller' => 'HomeController',
        'method' => 'showAdditionalServices',
    ],

    'prog-distribution' => [
        'controller' => 'HomeController',
        'method' => 'showProgDistributionServices',
    ],

    // ALL ROUTES FOR AUTHENTIFICATION SYSTEM :
    'register' => [
        'controller' => 'AuthController',
        'method' => 'register',
    ],

    'login' => [
        'controller' => 'AuthController',
        'method' => 'login',
    ],

    'logout' => [
        'controller' => 'AuthController',
        'method' => 'logout',
    ],

    // ALL ROUTES FOR TEAM PAGES : 
    'team' => [
        'controller' => 'TeamController',
        'method' => 'getAllTeamMembers',
    ],

    'team-detail' => [
        'controller' => 'TeamController',
        'method' => 'displayTeamMemberById'
    ],

    // ALL ROUTES TO BUY DVD :
    'dvd' => [
        'controller' => 'DvdController',
        'method' => 'showAllDvds'
    ],

    'cart' => [
        'controller' => 'CartController',
        'method' => 'showCart'
    ],

    'add-to-cart' => [
        'controller' => 'CartController',
        'method' => 'addToCart'
    ],

    'update-cart' => [
        'controller' => 'CartController',
        'method' => 'updateCart'
    ],

    'remove-from-cart' => [
        'controller' => 'CartController',
        'method' => 'removeFromCart'
    ],
    
    'order' => [
        'controller' => 'OrderController',
        'method' => 'showOrder'
    ],

    'order-success' => [
    'controller' => 'OrderController',
    'method' => 'orderSuccess'
    ],

    // ALL ROUTES FOR THE PAYMENT SYSTEM STRIPE :
    'checkout' => [
        'controller' => 'OrderController',
        'method' => 'checkoutForm'
    ],

    'checkout-process' => [
        'controller' => 'OrderController',
        'method' => 'checkoutProcess'
    ],

    // ALL ROUTES FOR CINEMA PAGES (movies) :
    'cinema' => [
        'controller' => 'CinemaController',
        'method' => 'showAllCinema',
    ],

    'cinema-detail' => [
        'controller' => 'CinemaController',
        'method' => 'displayCinemaDetailById'
    ],

    // ALL ROUTES FOR EVENTS PAGES :
    'events' => [
        'controller' => 'EventController',
        'method' => 'showAllEvents',
    ],

    'event-detail' => [
        'controller' => 'EventController',
        'method' => 'showEventDetail',
    ],

    // ALL ROUTES FOR SERVICES IN NAVBAR :
    'distribution' => [
        'controller' => 'DistributionController',
        'method' => 'showDistributionServices',
    ],

    'communication' => [
        'controller' => 'CommunicationController',
        'method' => 'showCommunicationServices',
    ],

    // ALL ROUTES FOR PROTECTED SECTIONS :
    'protected-section' => [
        'controller' => 'ProtectedSectionController',
        'method' => 'showProtectedSectionForm',
    ],

    'protected-section-auth' => [
        'controller' => 'ProtectedSectionController',
        'method' => 'authenticateUser',
    ],

     // ALL ROUTES FOR DOCUMENTARIES :
     'documentaries' => [
        'controller' => 'DocumentaryController',
        'method' => 'showAllDocumentaries',
    ],

    'documentary-detail' => [
        'controller' => 'DocumentaryController',
        'method' => 'showDocumentaryDetail',
    ],

    // ALL ROUTES FOR THE GLOBAL SEARCH BAR :
    'search' => [
        'controller' => 'SearchController',
        'method' => 'search',
    ],
];