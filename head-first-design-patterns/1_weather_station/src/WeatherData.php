<?php

namespace src;

use src\Subject;

class WeatherData implements Subject
{
    private $observers = [];
    private $temperature;
    private $humidity;
    private $pressure;

    public function __construct()
    {
    }

    public function registerObserver(Observer $o)
    {
        $this->observers[] = $o;
    }

    public function removeObserver(Observer $o)
    {
        $index = array_flip($this->observers)[$o];
        unset($this->observers[$index]);
    }

    public function notifyObservers()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->temperature, $this->humidity, $this->pressure);
        }
    }

    public function measurementsChanged()
    {
        $this->notifyObservers();
    }

    public function setMeasurements($temperature, $humidity, $pressure)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->measurementsChanged();
    }
}
