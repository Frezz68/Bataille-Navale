<?php

namespace App\Models;

use CodeIgniter\Model;

class BoardModel extends Model
{

    protected $table = "Board";

    private function builderConstruct()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('Board');
        return $builder;
    }

    public function getBoard()
    {
        return $this->findAll();
    }

    public function insertBoard($length = null, $width = null)
    {
        $builder = $this->builderConstruct();
        $data_insert = [
            "length"     => $length,
            "width"         => $width,
        ];
        return $builder->insert($data_insert);
    }
}
