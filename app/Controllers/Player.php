<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PlayerModel;

class Player extends BaseController
{

    private $rules = [
        'pseudo' =>  [
            'rules' => 'required',
            'errors' => [
                'required' => 'Le champ pseudo est requis'
            ],
        ],
        'pass' => [
            'rules' => 'required|min_length[12]',
            'errors' => [
                'required' => 'Le champ mot de passe est requis',
                'min_length' => 'Votre mot de passe doit faire 12 caractères au minimum'
            ]
        ],
        'pass2' => [
            'rules' => 'required|matches[pass]',
            'errors' => [
                'required' => 'Le champ de confirmation de mot de passe est requis',
                'matches' => 'La confirmation de mot de passe ne correspond pas au mot de passe'
            ]
        ]
    ];

    public function __construct()
    {
        helper('html');
        helper('form');
        helper('url');
    }

    public function create()
    {
        if ($this->request->getMethod() == "post") {

            $pseudo = $this->request->getPost('pseudo');
            $pass = $this->request->getPost('pass');
            $pass2 = $this->request->getPost('pass2');

            $validation = \Config\Services::validation();
            $validation->setRules($this->rules);
            $data['validation'] = $validation;

            $db = new PlayerModel();

            // On vérifie s'il existe déjà un compte avec ce pseudo
            if (count($db->getLogin($pseudo)) == 0) {
                // pas de pseudo à ce nom = ok
                if ($pass === $pass2) {
                    // Mot de passes correspondent
                    $db->insertPlayer($pseudo, password_hash($pass, PASSWORD_DEFAULT));
                }
            }
        }
        echo view('templates/header');
        echo view('Players/createPlayer');
        echo view('templates/footer');
    }

    public function login()
    {
        if ($this->request->getMethod() == "post") {
            $login = $this->request->getPost('login');
            $password = $this->request->getPost('password');

            $db = new PlayerModel();
            $player_account = $db->getPlayer($login);
            if (count($player_account) != 0) {
                if (password_verify($password, $player_account[0]['password'])) {
                    $session = \Config\Services::session();
                    $session_data = [
                        "login"     => $login,
                        "logged_in" => true
                    ];
                    $session->set($session_data);

                    return redirect()->to("/");
                }
            }
        }

        echo view('templates/header');
        echo view('Players/loginPlayer');
        echo view('templates/footer');
    }

    public function disconnect()
    {
    }
}
