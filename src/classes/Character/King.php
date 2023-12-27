<?php
namespace Character;

class King extends Character
{
  public function __construct()
  {
    parent::__construct();
    $this->health = 2000;
  }

  public function display()
  {
    echo "Имя: Король " . $this->name . " " . "Здоровье: " . $this->health;
  }
}