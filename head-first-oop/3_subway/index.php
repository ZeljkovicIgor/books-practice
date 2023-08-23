<?php

use src\Subway;
use src\SubwayLoader;
use src\SubwayPrinter;

require 'vendor/autoload.php';

class LoadTester
{
    private $subwayLoader;
    private Subway $subway;
    private $subwayPrinter;

    public function __construct()
    {
        $this->subwayLoader = new SubwayLoader();
    }

    public function testLoadingSubway($filename)
    {
        $this->subway = $this->subwayLoader->loadFromFile($filename);

        if (
            $this->subway->hasStation("HTML Heights")
            && $this->subway->hasStation(("Ajax rapids"))
            && $this->subway->hasStation("css cenTer")
            && $this->subway->hasConnection("Booch Line", "HTML heights", "Javabeans Boulevard")
            && $this->subway->hasConnection("Booch Line", "ajax rapids", "html heights")
            && $this->subway->hasConnection("Gamma Line", "ooa&d oval", "html heights")
        ) {
            print("\n\nLoading subway: PASSED\n");
        } else {
            print("\nLoading subway: FAILED\n");
        }
    }

    public function testPrintingDirections($start, $end)
    {
        $route = $this->subway->getDirections($start, $end);

        $subwayPrinter = new SubwayPrinter();
        $subwayPrinter->printDirections($route);
    }
}

$loadTester = new LoadTester();
$loadTester->testLoadingSubway('db.txt');
$loadTester->testPrintingDirections("OOA&D Oval", "HTML Heights");
