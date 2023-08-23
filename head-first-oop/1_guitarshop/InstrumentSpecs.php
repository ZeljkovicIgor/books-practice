<?php

/**
 * 
 */
class InstrumentSpecs
{
  private array $properties = array();

  /**
   * 
   */
  public function __construct(array $properties)
  {
    if (!isset($this->properties)) {
      $this->properties = array();
    } else {
      /* TODO: probaj sa arrays stvari */
      $this->properties = $properties;
    }
  }

  public function getProperty(string $propertyName): object
  {
    return $this->properties[$propertyName];
  }

  public function getProperties(): array
  {
    return $this->properties;
  }

  public function matches(InstrumentSpecs $otherSpecs): bool
  {
    foreach ($otherSpecs->properties as $otherProp => $otherValue) {
      if (!array_key_exists($otherProp, $this->properties) || $this->properties[$otherProp] !== $otherValue) {
        return false;
      }
    }

    return true;
  }
}
