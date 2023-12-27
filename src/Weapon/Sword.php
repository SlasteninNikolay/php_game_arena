<?php
namespace Weapon;

class Sword implements WeaponBehavior
{
  private $damage;

  public function __construct()
  {
    $this->damage = 100;
  }

  public function useWeapon()
  {
    echo "Бьет мечом!" . PHP_EOL;
  }

  public function getDamage()
  {
    return $this->damage;
  }
}