<?php

/**
 * 
 */
class Tile
{
  private array $units = array();

  /**
   * 
   */
  public function __construct()
  {
  }

  public function addUnit(Unit $unit)
  {
    array_push($this->units, $unit);
  }

  public function removeUnit(Unit $unit)
  {
    //remove unit
  }

  public function removeUnits()
  {
    $this->units = array();
  }

  public function getUnits()
  {
    return $this->units;
  }
}
