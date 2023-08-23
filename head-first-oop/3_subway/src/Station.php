<?php

namespace src;

class Station
{
    private $id;
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
        $this->id = mb_strtolower($name);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function equals($object)
    {
        if (get_class($object) === Station::class) {
            return $this->id === $object->id;
        }

        return false;
    }
}
