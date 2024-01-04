<?php

use Arena\Arena;
use Character\King;
use Character\Knight;


if (isset($_GET['action'])) {

  if ($_GET['action'] == "start") {
    start_game();
  }

}

function start_game()
{
  $king = new King();
  $knight = new Knight();
  $game = new Arena($king, $knight);
  $game->init();
}