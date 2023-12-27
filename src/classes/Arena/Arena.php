<?php
namespace Arena;

class Arena
{
  public $name;
  public $player_one;
  public $player_two;
  public function __construct($player_one, $player_two)
  {
    $this->name = 'Камелот';
    $this->player_one = $player_one;
    $this->player_two = $player_two;
  }

  public function init()
  {
    $this->player_one->display();
    $this->player_two->display();
    $this->battle();
  }

  public function test()
  {
    $result['success'] = true;
    $result['message'] = "Goooddddd";
    die(json_encode($result));
  }

  private function battle()
  {
    while ($this->player_one->health > 0 && $this->player_two->health > 0) {

      $this->player_one->display();
      $this->player_one->fight($this->player_two);
      $this->checkHealth();
      $this->player_two->display();
      $this->player_two->fight($this->player_one);
      $this->checkHealth();
    }

  }

  private function checkHealth()
  {
    if ($this->player_one->health == 0) {
      echo 'Победу одержал ' . $this->player_two->name;
      exit;
    }

    if ($this->player_two->health == 0) {
      echo 'Победу одержал ' . $this->player_one->name;
      exit;
    }

    if ($this->player_one->health == 0 && $this->player_two->health == 0) {
      echo 'Оба мертвы!';
      exit;
    }
  }


}