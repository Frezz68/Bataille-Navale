<?php

echo form_open("player/login");

echo '<p>' . form_label("Votre pseudo", "login") . '</p>';

$data_input_login = [
    "id"    => "login",
    "name"  => "login"
];
echo '<p>' . form_input($data_input_login) . '</p>';

echo '<p>' . form_label("Votre mot de passe", "password") . '</p>';
$data_input_password = [
    "id"    => "password",
    "name"  => "password"
];
echo '<p>' . form_password($data_input_password) . '</p>';

echo '<p>' . form_submit('', "Se connecter") . '</p>';

echo form_close();
