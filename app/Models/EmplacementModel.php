<?php

namespace App\Models;

use CodeIgniter\Model;

class EmplacementModel extends Model
{

    protected $table = "Emplacement";

    private function builderConstruct()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('Emplacement');
        return $builder;
    }

    public function getEmplacement()
    {
        return $this->findAll();
    }

    public function setEmplacement($idGame =null,$idPosition=null,$orientation=null,$idShip=null)
    {
        $builder = $this->builderConstruct();
        $data_to_insert = [
            "id_game"    => $idGame,
            "id_position"     => $idPosition,
            "orientation"      => $orientation,
            "id_ship"     => $idShip
        ];
        return $builder->insert($data_to_insert);
    }
}
