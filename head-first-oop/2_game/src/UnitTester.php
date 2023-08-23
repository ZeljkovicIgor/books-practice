<?php

/** @package  */
class UnitTester
{
    /** @return void  */
    public function __construct()
    {
    }

    /**
    * @param Unit $unit
    * @param mixed $type
    * @param mixed $expectedType
    * @return void
    */
    public function testType(Unit $unit, $type, $expectedType)
    {
        print("\nTesting setting/getting the type property\n");

        $unit->setType($type);
        $outputType = $unit->getType();

        if ($outputType === $expectedType) {
            print("Test passed");
        } else {
            print("Test failed: " . $outputType . " didnt match " . $expectedType);
        }
    }

    /**
    * @param Unit $unit
    * @param mixed $propertyName
    * @param mixed $inputValue
    * @param mixed $expectedOutputValue
    * @return void
    */
    public function testUnitSpecificProperty(Unit $unit, $propertyName, $inputValue, $expectedOutputValue)
    {
        print("\nTesting setting/getting a unit-specific property.\n");
        $unit->setProperty($propertyName, $inputValue);
        $outputValue = $unit->getProperty($propertyName);

        if ($expectedOutputValue === $outputValue) {
            print("Test passed");
        } else {
            print("Test failed: " . $outputValue . " didn’t match " . $expectedOutputValue);
        }
    }

    /**
    * @param Unit $unit
    * @param mixed $propertyName
    * @param mixed $inputValue
    * @param mixed $expectedOutputValue
    * @return void
    */
    public function testChangeProperty(Unit $unit, $propertyName, $inputValue, $expectedOutputValue)
    {
        print("\nTesting changing an existing property’s value.\n");

        $unit->setProperty($propertyName, $inputValue);
        $outputValue = $unit->getProperty($propertyName);

        if ($expectedOutputValue === $outputValue) {
            print("Test passed");
        } else {
            print("Test failed: " . $outputValue . " didn’t match " . $expectedOutputValue);
        }
    }

    public function testNonExistentProperty(Unit $unit, $propertyName)
    {
        print("\nTesting getting a non existant property's value.\n");

        $outputValue = $unit->getProperty($propertyName);

        if (is_null($outputValue)) {
            print("Test passed");
        } else {
            print("Test failed with value of " . $outputValue);
        }
    }

    /**
    * @param Unit $unit
    * @return void
    */
    public function testUnit(Unit $unit)
    {
        $this->testType($unit, 'infantry', 'infantry');
        $this->testUnitSpecificProperty($unit, 'hitPoints', 25, 25);
        $this->testChangeProperty($unit, 'hitPoints', 15, 15);
        $this->testNonExistentProperty($unit, 'strength');
    }
}

$tester = new UnitTester();
$unit = new Unit(1000);
$tester->testUnit($unit);
