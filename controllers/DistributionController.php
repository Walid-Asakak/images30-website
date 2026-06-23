<?php

namespace Controllers;

class DistributionController {
    public function showDistributionServices() {

        $view = 'views/distribution/distributionServicesView.php';
        require 'views/layoutView.php'; 
    }
}