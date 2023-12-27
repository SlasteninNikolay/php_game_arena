<?php
namespace Weapon;

class Knife implements WeaponBehavior
{
  private $damage;

  public function __construct()
  {
    $this->damage = 50;
  }

  public function useWeapon()
  {
    echo "Бьет ножом!" . PHP_EOL;
  }

  public function getDamage()
  {
    return $this->damage;
  }
}