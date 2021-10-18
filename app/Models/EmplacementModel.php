<?php

namespace App\Models;

use CodeIgniter\Model;

class EmplacementModel extends Model
{

    protected $table = "Emplacement";

    public function getEmplacement()
    {
        return $this->findAll();
    }
}
