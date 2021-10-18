<?php

namespace App\Models;

use CodeIgniter\Model;

class ShipModel extends Model
{

    protected $table = "Ship";

    public function getShip()
    {
        return $this->findAll();
    }
}
