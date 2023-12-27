<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

use Arena\Arena;
use Character\Character;
use Character\King;
use Character\Knight;
use Weapon\WeaponBehavior;
use Weapon\Knife;
use Weapon\Sword;

define('ROOTPATH', __DIR__);

require_once ROOTPATH . '/src/functions/helpers.php';
require_once ROOTPATH . '/src/functions/actions.php';

$title = "Арена";

$page_content = include_template("arena.php", []);

$layout_content = include_template("layout.php", ["content" => $page_content, 'title' => $title,]);

print($layout_content);

// $king = new King();
// $king->setWeapon(new Knife);
// $knight = new Knight();
// $knight2 = new Knight();


// $game = new Arena($king, $knight);
// $game->init();