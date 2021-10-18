<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ShipModel;

class Ship extends BaseController
{

    public function all()
    {

        $shipModel = new ShipModel();
        $allShip = $shipModel->getShip();
        $data['ship'] = $allShip;

        return view('ship', $data);
    }
}
