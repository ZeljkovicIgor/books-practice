<?php

namespace src;

class Connection
{
    private $name;
    private $station1;
    private $station2;

    public function __construct($name, $station1, $station2)
    {
        $this->name = $name;
        $this->station1 = $station1;
        $this->station2 = $station2;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStation1()
    {
        return $this->station1;
    }

    public function getStation2()
    {
        return $this->station2;
    }
}
