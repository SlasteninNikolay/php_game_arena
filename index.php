<?php

require 'vendor/autoload.php';

use Character\Character;
use Character\King;
use Character\Knight;
use Weapon\WeaponBehavior;
use Weapon\Knife;
use Weapon\Sword;

$king = new King();

$king->setWeapon(new Knife());

$king->display();
$king->fight();

$knight = new Knight();

$knight->setWeapon(new Sword());

$knight->display();
$knight->move();
$knight->fight();