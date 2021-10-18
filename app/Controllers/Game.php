<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GameModel;
use App\Models\PlayerModel;
use App\Models\PlayerGameModel;
use DateTime;

class Game extends BaseController
{

    public function __construct()
    {
        helper('html');
        helper('form');
        helper('url');
    }

    private function createCode()
    {
        $alpha = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
            'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
        ];
        $code_game = '';

        for ($i = 0; $i < 6; $i++) {
            $code_game = $code_game . $alpha[(random_int(0, 255)) % 26];
        }

        return $code_game;
    }

    public function new()
    {
        $session = \Config\Services::session();

        $db_game = new GameModel();
        $db_player = new PlayerModel();
        $db_player_game = new PlayerGameModel();
        $debut = new DateTime('now');

        $id_player = ($db_player->getPlayer($session->get('login')))[0]['id_player'];
        $code_game = $this->createCode();

        if ((count($db_game->getGame($code_game))) == 0) {
            $db_game->insertGame($code_game, ($debut->format('Y-m-d H:i:s')));
            $db_player_game->setPlayerGame($db_game->getGame($code_game)[0]['id_game'], $id_player);
        }

        return redirect()->to('/game/join/' . $code_game);
    }

    public function join($code_game = null)
    {

        $session = \Config\Services::session();

        if ($this->request->getMethod() == 'post') {


            $code_game = $this->request->getPost('code_game');
        }

        $error = false;

        $db_game = new GameModel();
        $db_player_game = new PlayerGameModel();
        $db_player = new PlayerModel();

        $id_player = ($db_player->getPlayer($session->get('login')))[0]['id_player'];

        // Gérer le cas où celui qui rejoin la salle est celui qui l'a créé
        // Le cas où il y a déjà deux joueurs
        // Le cas où le mec qui rejoins et le deuxième joueur qui a quitté et reviens
        if ((count($db_game->getGame($code_game))) == 1) {


            $db_player_game->setPlayerGame($db_game->getGame($code_game)[0]['id_game'], $id_player);
        } else {
            $error = true;
        }

        $data['code_game'] = $code_game;
        echo view('templates/header');
        echo view('Game/join', $data);
        echo view('templates/footer');
    }

    public function delete()
    {
    }
}
