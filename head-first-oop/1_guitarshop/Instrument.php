<?php

/**
 * 
 */
class Instrument
{

  private string $serialNumber;
  private float $price;
  private InstrumentSpecs $specs;

  /**
   * 
   */
  public function __construct(string $serialNumber, float $price, InstrumentSpecs $specs)
  {
    $this->serialNumber = $serialNumber;
    $this->price = $price;
    $this->specs = $specs;
  }

  public function getSpecs(): InstrumentSpecs
  {
    return $this->specs;
  }

  public function getSerialNumber(): string
  {
    return $this->serialNumber;
  }

  public function getPrice(): float
  {
    return $this->price;
  }

  public function setPrice(float $newPrice): void
  {
    $this->price = $newPrice;
  }
}
