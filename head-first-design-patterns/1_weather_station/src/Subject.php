<?php

namespace src;

use src\Observer;

interface Subject
{
    public function registerObserver(Observer $o);
    public function removeObserver(Observer $o);
    public function notifyObservers();
}
