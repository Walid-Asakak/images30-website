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
        'method' => 'buyDvd'
    ],

    'payment-process' => [
        'controller' => 'DvdController',
        'method' => 'paymentProcessDvd'
    ],
];