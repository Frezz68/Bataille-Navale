<?php

namespace App\Models;

use CodeIgniter\Model;

class GameModel extends Model
{

    protected $table = "Game";

    private function builderConstruct()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('Game');
        return $builder;
    }

    public function getGame($code_game = null)
    {
        if (!is_null($code_game)) {
            $request = $this->where('code_game', $code_game);
        }
        $request =  $this->findAll();
        return $request;
    }

    public function insertGame($code_game = null, $debut = null)
    {
        $builder = $this->builderConstruct();
        $data_insert = [
            "code_game"     => $code_game,
            "debut"         => $debut,
        ];
        return $builder->insert($data_insert);
    }
}
