<?php

namespace Controllers;

 class CommunicationController extends BaseController {
    public function showCommunicationServices() {
        $this->render('views/communication/communicationView.php');
        
    }
 }