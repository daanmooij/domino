<?php

require(dirname(__DIR__) . '/vendor/autoload.php');

use DaanMooij\Domino\Game;

$game = new Game('Alice', 'Bob');
$game->play();
