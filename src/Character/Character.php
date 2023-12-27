<?php
namespace Character;

use Weapon\WeaponBehavior;
use Weapon\Sword;

class Character
{
  public $name;
  public $health;
  public WeaponBehavior $weapon;

  public function __construct()
  {
    $this->name = $this->random_name();
    $this->health = 1000;
    $this->weapon = new Sword();
  }

  private function random_name()
  {
    $name_arr = [
      "Артур",
      "Ланселот",
      "Гавейн",
      "Персиваль",
      "Тристан",
      "Бедивер",
      "Галагад",
      "Мордред",
      "Утер",
      "Мерлин",
      "Пеллинор",
      "Игерн",
      "Моргана",
      "Гвиневра",
      "Эккалон",
      "Кай",
      "Бран",
      "Бранвен",
      "Ритон",
      "Талиесин"
    ];

    $rand_index = random_int(0, count($name_arr) - 1);
    return $name_arr[$rand_index];
  }

  public function setWeapon(WeaponBehavior $weapon)
  {
    $this->weapon = $weapon;
  }

  public function reduceHealth($amount)
  {
    $this->health -= $amount;
    if ($this->health < 0) {
      $this->health = 0;
    }
  }

  public function display()
  {
    echo "Имя: " . $this->name . " " . "Здоровье: " . $this->health;
  }

  public function move()
  {
    echo $this->name . " Я иду!";
  }

  public function fight(Character $opponent)
  {
    $damage = $this->weapon->getDamage();
    echo $this->weapon->useWeapon() . "-" . $damage . " HP";
    $opponent->reduceHealth($damage);
  }


}