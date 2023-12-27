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
    $this->battle();
  }

  public function render($data)
  {

    header('Content-type: text/event-stream');
    header('Cache-Control: no-cache');

    echo "data: {$data}\n\n";
    while (ob_get_level() > 0) {
      ob_end_flush();
    }
    ob_flush();
    flush();
  }

  private function battle()
  {

    while (true) {

      $this->player_one->fight($this->player_two);
      $this->render($this->player_one->health);
      $this->checkHealth();
      sleep(3);
      $this->player_two->fight($this->player_one);
      $this->render($this->player_two->health);
      $this->checkHealth();
      sleep(3);

      if (connection_aborted()) {
        break;
      }

    }

  }

  private function checkHealth()
  {
    if ($this->player_one->health <= 0) {
      $this->render('Победу одержал ' . $this->player_two->name);
      $this->render('[DONE]');
      exit;
    }

    if ($this->player_two->health <= 0) {
      $this->render('Победу одержал ' . $this->player_one->name);
      $this->render('[DONE]');
      exit;
    }

    if ($this->player_one->health <= 0 && $this->player_two->health <= 0) {
      $this->render('Оба мертвы!');
      $this->render('[DONE]');
      exit;
    }
  }


}