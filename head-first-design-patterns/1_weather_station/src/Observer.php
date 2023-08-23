<?php

namespace src;

interface Observer
{
    public function update($temp, $humidity, $pressure);
}
