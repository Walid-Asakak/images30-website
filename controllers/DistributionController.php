<?php

namespace Controllers;

class DistributionController extends BaseController {
    public function showDistributionServices() {
        
        $this->render('views/distribution/distributionServicesView.php');
    }
}