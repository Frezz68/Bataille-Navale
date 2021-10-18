<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        helper('form');
        $session = \Config\Services::session();
        $data['login'] = $session->get('login');
        $data['logged_in'] = $session->get('logged_in');
        echo view('templates/header');
        echo view('accueil', $data);
        echo view('templates/footer');
    }
}
