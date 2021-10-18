<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{

    protected $table = "History";

    public function getHistory()
    {
        return $this->findAll();
    }
}
