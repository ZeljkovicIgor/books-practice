<?php

namespace src;

class SubwayPrinter
{
    public function __construct()
    {
    }

    public function printDirections($route)
    {
        $connection = array_shift($route);
        print("\n\nHere are the directions for how to get from " . $connection->getStation1()->getName() . " to " . end($route)->getStation2()->getName() . "\n\n");
        print("Start out at " . $connection->getStation1()->getName() . ".\n");
        print("Get on the " . $connection->getName() . " heading towards " . $connection->getStation2()->getName() . ".\n");

        $previousConnection = $connection;
        foreach ($route as $connection) {
            if ($previousConnection->getName() === $connection->getName()) {
                print("Continue past " . $connection->getStation1()->getName() . "...\n");
            } else {
                print("When you get to " . $connection->getStation1()->getName() . ", get off the " . $previousConnection->getName() . ".\n");
                print("Switch over to ". $connection->getName() . ", heading towards " . $connection->getStation2()->getName() . ".\n");

                $previousConnection = $connection;
            }
        }

        print("Get off at " . $connection->getStation2()->getName() . "\n");
    }
}
