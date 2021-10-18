<?php

namespace App\Models;

use CodeIgniter\Model;

class PlayerModel extends Model
{

    protected $table = "Player";

    private function builderConstruct()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('Player');
        return $builder;
    }

    public function getPlayer($login = null)
    {
        if (!is_null($login)) {
            $request = $this->where('login', $login);
        }
        $request = $this->findAll();
        return $request;
    }

    public function getLogin($login = null)
    {
        return $this->select('login')
            ->where('login', $login)
            ->findAll();
    }

    public function insertPlayer($login = null, $pass = null)
    {
        $builder = $this->builderConstruct();
        $data_to_insert = [
            "login"     => $login,
            "password"      => $pass
        ];
        return $builder->insert($data_to_insert);
    }
}
