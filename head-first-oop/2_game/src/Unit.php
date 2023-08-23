<?php

/** @package  */
class Unit
{
    private int $id;
    private string $name;
    private string $type;
    private array $properties = [];
    private array $weapons = [];

    /**
     * @param string $id
     * @return void
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @param Weapon $weapon
     * @return void
     */
    public function addWeapon(Weapon $weapon)
    {
        array_push($this->weapons, $weapon);
    }

    /** @return array  */
    public function getWeapons()
    {
        return $this->weapons;
    }

    /** @return int  */
    public function getId()
    {
        return $this->id;
    }

    /** @return string  */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /** @return string  */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @param string $property
     * @return string | null
     */
    public function getProperty(string $property)
    {
        return $this->properties[$property] ?? null;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function setProperty(string $property, $value)
    {
        $this->properties[$property] = $value;
    }
}
