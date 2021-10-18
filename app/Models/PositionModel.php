<?php

namespace App\Models;

use CodeIgniter\Model;

class PositionModel extends Model
{

    protected $table = "Position";

    public function getPosition()
    {
        return $this->findAll();
    }
}
