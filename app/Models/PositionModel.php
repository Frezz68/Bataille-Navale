<?php

namespace App\Models;

use CodeIgniter\Model;

class PositionModel extends Model
{

    protected $table = "Position";

    private function builderConstruct()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('Position');
        return $builder;
    }

    public function getPosition()
    {
        return $this->findAll();
    }

    public function setPosition($id = null,$x= null,$y= null){

        $builder = $this->builderConstruct();
        $data_to_insert = [
            "id"    => $id,
            "x"     => $x,
            "y"      => $y
        ];
        return $builder->insert($data_to_insert);
    }

}
