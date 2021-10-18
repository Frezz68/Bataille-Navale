<?php

namespace App\Models;

use CodeIgniter\Model;

class BoardModel extends Model
{

    protected $table = "Board";

    public function getBoard()
    {
        return $this->findAll();
    }
}
