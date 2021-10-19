# Bataille Navale

## Comment travailler sur le projet

Créer un Fork du projet (cela permettra de ne pas modifier le projet de base lors de votre développement),
Vous avez le choix de continuer sur github ou sur git,

    git clone "url.git"
    
Dans tous les cas, créer un nouvelle branch au projet qui concernera votre partie du projet actuelle :

    git branch "nom_de_la_branch"
    
Attention à bien se rendre dans la branche pour éditer les fichiers,

    git switch "nom_de_la_branche"
    
Une fois les modifications faites, on peut faire un commit,

    git commit -m "Raison du commit"
    
Pour finir faite un pull request pour ajouter vos modifications au projet initial

Pour en savoir plus : https://www.pierre-giraud.com/git-github-apprendre-cours

## Mode 2 joueurs

Chacun son tour, le joueur :

1 : place son bateau

----

La partie peut commencer


2 : Joueur 1 Tire

    +   toucher (comparaison avec nb bateau joueur 2)
    +   couler
    +   dans l'eau

---> Partie fini ?

3 : Joueur 2 Tire

    +   toucher (comparaison avec nb bateau joueur 2)
    +   couler
    +   dans l'eau

Partie fini si plus de bateau, score = nombre de tirs

Initialisation du jeu :

Board.php
Position.php
Ship.php
Player.php
ComputerPlayer.php
Game.php

Partie base de données :

public static function newGame($game, $id)
public static function getGame($id)
public static function updateGame($game, $id)
public static function newLobby($code, $secret, $gameId, $playerIdOne, $playerIdTwo)
public static function deleteLobby($secret)
public static function getLobby($code)
public static function setState($code, $state)

Le jeu en lui même :

$game = new Game(new ComputerPlayer())
$game->player1->placeShips()
$game->player2->placeShips()
