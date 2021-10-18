    <h1>Bienvenue dans le jeu de bataille navale <?php echo $login; ?></h1>

    <?php if (!$logged_in) : ?>
        <?php echo '<p>' . anchor("player/create", "Créer un nouveau compte") . '</p>'; ?>
        <?php echo '<p>' . anchor("player/login", "Se connecter") . '</p>'; ?>

        <!-- Si connecté : -->
    <?php else : ?>
        <h2>Créer une salle de jeu</h2>
        <?php echo '<p>' . anchor("game/new", "Nouvelle salle") . '</p>'; ?>
        <h2>Rejoindre une salle de jeu</h2>

    <?php
        echo form_open("/game/join");

        echo '<p>' . form_label("Code de la salle", "code_game") . '</p>';

        $data_input_salle = [
            "id"    => "code_game",
            "name"  => "code_game"
        ];
        echo '<p>' . form_input($data_input_salle) . '</p>';
        echo '<p>' . form_submit('', "Rejoindre") . '</p>';

        echo form_close();

    endif;
