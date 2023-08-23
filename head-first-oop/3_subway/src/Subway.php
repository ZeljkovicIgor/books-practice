<?php

namespace src;

use RuntimeException;

class Subway
{
    private $stations;
    private $connections;
    private $network;

    public function __construct()
    {
        $this->stations = [];
        $this->connections = [];
        $this->network = [];
    }

    public function getNetwork()
    {
        return $this->network;
    }

    public function addStation($name)
    {
        if (!$this->hasStation($name)) {
            $newStation = new Station($name);
            array_push($this->stations, $newStation);
        }
    }

    public function hasStation($stationName)
    {
        $passedStation = new Station($stationName);

        foreach ($this->stations as $station) {
            if ($passedStation->equals($station)) {
                return true;
            }
        }

        return false;
    }

    public function addConnection($name, $station1Name, $station2Name)
    {
        if ($this->hasStation($station1Name) && $this->hasStation($station2Name)) {
            $station1 = new Station($station1Name);
            $station2 = new Station($station2Name);

            $connection1 = new Connection($name, $station1, $station2);
            array_push($this->connections, $connection1);

            $connection2 = new Connection($name, $station2, $station1);
            array_push($this->connections, $connection2);

            $this->addToNetwork($station1, $station2);
            $this->addToNetwork($station2, $station1);
        } else {
            throw new \ErrorException("Invalid connection\n");
        }
    }

    public function hasConnection($connectionName, $station1Name, $station2Name)
    {
        if ($this->hasStation($station1Name) && $this->hasStation($station2Name)) {
            foreach ($this->connections as $connection) {
                if ($connection->getName() === $connectionName) {
                    return true;
                }
            }

            return false;
        } else {
            throw new \ErrorException("Invalid station names\n");
        }
    }

    public function addToNetwork(Station $station1, Station $station2)
    {
        if (array_key_exists($station1->getId(), $this->network)) {
            $connectingStations = &$this->network[$station1->getId()];
            if (!in_array($station2->getId(), $connectingStations)) {
                $connectingStations[$station2->getId()] = $station2;
            }
        } else {
            $connectingStations[$station2->getId()] = $station2;
            $this->network[$station1->getId()] = $connectingStations;
        }
    }

    public function getDirections($startStationName, $endStationName)
    {
        if (!$this->hasStation($startStationName) ||    !$this->hasStation($endStationName)) {
            throw new RuntimeException("Stations entered do not exist on this subway.");
        }

        $start = new Station($startStationName);
        $end = new Station($endStationName);
        $route = [];
        $reachableStations = [];
        $previousStations = [];

        $neighbors = $this->network[$start->getId()];

        foreach ($neighbors as $neighbor) {
            if ($end->equals($neighbor)) {
                $connection = $this->getConnection($start, $end);
                array_push($route, $connection);
                return $route;
            } else {
                $reachableStations[$neighbor->getId()] = $neighbor;
                $previousStations[$neighbor->getId()] = $start;
            }
        }

        $nextStations = $neighbors;
        $currentStation = $start;

        for ($i=1; $i < count($this->stations); $i++) {
            $tmpNextStations = [];

            foreach ($nextStations as $nextStation) {
                $reachableStations[$nextStation->getId()] = $nextStation;
                $currentStation = $nextStation;
                $currentNeighbors = $this->network[$currentStation->getId()];

                foreach ($currentNeighbors as $currentNeighbor) {
                    if ($end->equals($currentNeighbor)) {
                        $reachableStations[$currentNeighbor->getId()] = $currentNeighbor;
                        $previousStations[$currentNeighbor->getId()] = $currentStation;
                        break 3;
                    } else if (!array_key_exists($currentNeighbor->getId(), $reachableStations)) {
                        $reachableStations[$currentNeighbor->getId()] = $currentNeighbor;
                        array_push($tmpNextStations, $currentNeighbor);
                        $previousStations[$currentNeighbor->getId()] = $currentStation;
                    }
                }
            }

            $nextStations = $tmpNextStations;
        }

        $keepLooping = true;
        $keyStation = $end;

        while ($keepLooping) {
            $station = $previousStations[$keyStation->getId()];
            array_unshift($route, $this->getConnection($station, $keyStation));

            if ($start->equals($station)) {
                $keepLooping = false;
            }

            $keyStation = $station;
        }

        return $route;
    }

    private function getConnection(Station $station1, Station $station2): Connection
    {
        foreach ($this->connections as $connection) {
            $one = $connection->getStation1();
            $two = $connection->getStation2();

            if ($station1->equals($one) && $station2->equals($two)) {
                return $connection;
            }
        }

        return null;
    }
}
