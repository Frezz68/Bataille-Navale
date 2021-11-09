<?php

namespace App\Models;

use CodeIgniter\Model;

class ShipModel extends Model
{

    protected $table = "Ship";

    private function builderConstruct()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('Ship');
        return $builder;
    }

    public function getShip()
    {
        return $this->findAll();
    }
}
