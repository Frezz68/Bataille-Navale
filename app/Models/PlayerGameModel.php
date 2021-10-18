<?php

namespace App\Models;

use CodeIgniter\Model;

class PlayerGameModel extends Model
{

    protected $table = "Player_Game";

    private function builderConstruct()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('Player_Game');
        return $builder;
    }

    public function setPlayerGame($id_game = null, $id_player = null)
    {
        $builder = $this->builderConstruct();
        $data_insert = [
            "id_game"     => $id_game,
            "id_player"     => $id_player
        ];
        return $builder->insert($data_insert);
    }
}
