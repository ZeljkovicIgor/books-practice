<?php

class UnitGroup
{
    private $units = [];

    public function __construct($unitList)
    {
        foreach ($unitList as $unit) {
            $this->units[$unit->getId()] = $unit;
        }
    }

    public function addUnit(Unit $unit)
    {
        $this->units[$unit->getId()] = $unit;
    }

    public function removeUnit(Unit $unit)
    {
        unset($this->units[$unit->getId()]);
    }

    public function getUnit($id)
    {
        return $this->units[$id];
    }

    public function getUnits()
    {
        return $this->units;
    }
}
