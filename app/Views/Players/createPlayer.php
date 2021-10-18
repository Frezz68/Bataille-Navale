<h1>Créez votre compte de joueur</h1>

<?php echo form_open("/player/create");

$pseudo_input = [
    "id"   => "pseudo",
    "name" => "pseudo",
    "required"
];
echo '<p>' . form_label("Votre pseudo") . '</p>';
echo '<p>' . form_input($pseudo_input) . '</p>';

$pass_input = [
    "id"   => "pass",
    "name" => "pass",
    "required"
];
echo '<p>' . form_label("Votre mot de passe") . '</p>';
echo '<p>' . form_password($pass_input) . '</p>';

$pass2_input = [
    "id"   => "pass2",
    "name" => "pass2",
    "required"
];
echo '<p>' . form_label("Confirmez votre mot de passe") . '</p>';
echo '<p>' . form_password($pass2_input) . '</p>';

echo '<p>' . form_submit('', 'S\'enregistrer') . '</p>';

echo form_close();

if (!is_null($validation)) {
    var_dump($validation->ListErrors());
}



?>