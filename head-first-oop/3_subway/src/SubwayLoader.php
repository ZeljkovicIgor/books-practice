<?php

namespace src;

class SubwayLoader
{
    private Subway $subway;

    public function __construct()
    {
        $this->subway = new Subway();
    }

    public function loadFromFile($fileName)
    {
        $lines = file($fileName);

        $this->loadStations($lines);
        $this->loadConnections($lines);

        return $this->subway;
    }

    public function loadStations(&$lines)
    {
        $currentLine = trim(array_shift($lines));
        while (!empty(trim($currentLine))) {
            print("\nAdding new station: " . $currentLine . "\n");
            $this->subway->addStation($currentLine);
            print("Added\n");
            $currentLine = trim(array_shift($lines));
        }
    }

    public function loadConnections(&$lines)
    {
        if (count($lines) === 0) {
            return;
        }

        $connectionName = trim(array_shift($lines));
        $station1Name = trim(array_shift($lines));
        $station2Name = trim(array_shift($lines));

        while ($station2Name && !empty(trim($station2Name))) {
            print("\n\nAdding new connection: " . $connectionName);
            $this->subway->addConnection($connectionName, $station1Name, $station2Name);
            print("\nAdded " . $connectionName . " with stations: " . $station1Name . " and " . $station2Name);
            $station1Name = $station2Name;
            $station2Name = trim(array_shift($lines));
        }

        $this->loadConnections($lines);
    }
}
