# Bataille Navale

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
