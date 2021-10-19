<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{

    protected $table = "History";

    private function builderConstruct()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('History');
        return $builder;
    }

    public function getHistory()
    {
        return $this->findAll();
    }

    public function setHistory($posTirX=null,$posTirY=null,$hit=null,$state=null,$score=null,$idGame=null){
        $builder = $this->builderConstruct();
        $data_to_insert = [
            "pos_tirX"    => $posTirX,
            "pos_tirY"     => $posTirY,
            "hit"      => $hit,
            "state"      => $state,
            "score"      => $score,
            "id_game"      => $idGame
        ];
        return $builder->insert($data_to_insert);
    }
}
