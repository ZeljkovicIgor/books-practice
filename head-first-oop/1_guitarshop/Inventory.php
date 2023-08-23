<?php

/**
 * 
 */
class Inventory
{
  private array $instruments;

  public function __construct()
  {
    $this->instruments = array();
  }

  public function addInstrument(string $serialNumber, float $price, InstrumentSpecs $specs): void
  {
    $instrument = new Instrument($serialNumber, $price, $specs);

    array_push($this->instruments, $instrument);
  }

  public function getInstrument(string $serialNumber): Instrument
  {
    foreach ($this->instruments as $instrument) {
      if ($instrument->getSerialNumber() == $serialNumber) {
        return $instrument;
      }
    }

    return null;
  }

  public function search(InstrumentSpecs $searchSpecs): array
  {
    $matchinginstruments = array();

    foreach ($this->instruments as $instrument) {
      if ($instrument->getSpecs()->matches($searchSpecs)) {
        array_push($matchinginstruments, $instrument);
      }
    }

    return $matchinginstruments;
  }
}
