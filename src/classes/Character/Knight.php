<?php
namespace Character;

class Knight extends Character
{

  public function display()
  {
    echo "Имя: Рыцарь " . $this->name . " " . "Здоровье: " . $this->health;
  }
}