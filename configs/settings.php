<?php

const AVAILABLE_ROUTES = [
    'home' => [
        'controller' => 'HomeController',
        'method' => 'index',
    ],

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

    'team' => [
        'controller' => 'TeamController',
        'method' => 'getAllTeamMembers',
    ],

    'team-detail' => [
        'controller' => 'TeamController',
        'method' => 'displayTeamMemberById'
    ],

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
    
    'order' => [
        'controller' => 'OrderController',
        'method' => 'showOrder'
    ],

    'order-success' => [
    'controller' => 'OrderController',
    'method' => 'orderSuccess'
    ],

    'checkout' => [
        'controller' => 'OrderController',
        'method' => 'checkoutForm'
    ],

    'checkout-process' => [
        'controller' => 'OrderController',
        'method' => 'checkoutProcess'
    ],
];