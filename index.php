<?php

require 'vendor/autoload.php';

use Arena\Arena;
use Character\Character;
use Character\King;
use Character\Knight;
use Weapon\WeaponBehavior;
use Weapon\Knife;
use Weapon\Sword;

$king = new King();
$king->setWeapon(new Knife);
$knight = new Knight();
$knight2 = new Knight();


$game = new Arena($knight2, $knight);
$game->start();