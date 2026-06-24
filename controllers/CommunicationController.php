<?php

namespace Controllers;

 class CommunicationController {
    public function showCommunicationServices() {

        $view = 'views/communication/communicationView.php';
        require 'views/layoutView.php';
    }
 }