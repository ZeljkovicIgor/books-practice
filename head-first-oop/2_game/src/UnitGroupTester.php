<?php

class UnitGroupTester
{
    public function __construct()
    {
    }

    public function createGroup(array $unitGroup, array $expectedOutput)
    {
        print("\nTesting creating a unit group\n");

        $createdGroup = new UnitGroup($unitGroup);
        $outputUnitGroup = $createdGroup->getUnits();

        $passed = count($unitGroup) === count($expectedOutput) && array_reduce($expectedOutput, function ($carry, $unit) use ($outputUnitGroup) {
            return $carry && $outputUnitGroup[$unit->getId()];
        }, true);

        if ($passed) {
            print("Test passed\n");
        } else {
            print("Test failed\n");
        }
    }
}

$tester = new UnitGroupTester();
$unit1 = new Unit("1");
$unit2 = new Unit("2");
$unit3 = new Unit("3");
$unit4 = new Unit("4");
$unitGroup = [$unit1, $unit2, $unit3, $unit4];
$tester->createGroup($unitGroup, [$unit1]);
