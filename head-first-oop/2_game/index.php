<?php

spl_autoload_register(function ($class_name) {
    include 'src/' . $class_name . '.php';
});

include 'src/UnitGroupTester.php';
