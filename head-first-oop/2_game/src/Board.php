<?php

/**
 * 
 */
class Board
{
  private int $width, $height;
  private array $tiles;

  /**
   * 
   */
  public function __construct(int $width, int $height)
  {
    $this->width = $width;
    $this->height = $height;
    $this->initialize();
  }

  private function initialize()
  {
    for ($i = 0; $i < $this->width; $i++) {
      for ($j = 0; $j < $this->height; $j++) {
        $this->tiles[$i][$j] = new Tile();
      }
    }
  }

  public function getTile($x, $y): Tile
  {
    return $this->tiles[$x][$y];
  }

  public function addUnit(Unit $unit, int $x, int $y)
  {
    $tile = $this->getTile($x, $y);
    $tile->addUnit($unit);
  }

  public function removeUnit(Unit $unit, int $x, int $y)
  {
    $tile = $this->getTile($x, $y);
    $tile->removeUnit($unit);
  }

  public function removeUnits(int $x, int $y)
  {
    $tile = $this->getTile($x, $y);
    $tile->removeUnits();
  }

  public function getUnits(int $x, int $y)
  {
    return $this->getTile($x, $y)->getUnits();
  }
}
