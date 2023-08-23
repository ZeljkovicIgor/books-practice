<?php

spl_autoload_register(function ($class_name) {
  include $class_name . '.php';
});

include 'Enums.php';

$inventory = new Inventory();
initializeInventory($inventory);

$properties = [
  "builder" => Builder::GIBSON,
  "backWood" => Wood::MAPLE,
];

$whatEricaWants = new InstrumentSpecs($properties);
print_r($inventory);

$matchingGuitars = $inventory->search($whatEricaWants);
if (sizeof($matchingGuitars) != 0) {
  print("Nasao sam gitare:");
  foreach ($matchingGuitars as $guitar) {
    print_r($guitar->getSpecs());
  }
} else {
  print("Nisam nasao nish");
}

function initializeInventory(Inventory $inv)
{
  $guitars = [
    [
      "instrumentType" => InstrumentType::GUITAR,
      "builder" => Builder::COLLINS,
      "model" => "CJ",
      "type" => Type::ACOUSTIC,
      "numStrings" => 6,
      "backWood" => Wood::INDIAN_ROSEWOOD,
      "topWood" => Wood::SITKA
    ],
    [
      "instrumentType" => InstrumentType::GUITAR,
      "builder" => Builder::MARTIN,
      "model" => "D-18",
      "type" => Type::ACOUSTIC,
      "numStrings" => 6,
      "backWood" => Wood::MAHOGANY,
      "topWood" => Wood::ADIRONDACK
    ],
    [
      "instrumentType" => instrumentType::GUITAR,
      "builder" => Builder::FENDER,
      "model" => "Stratokaster",
      "type" => Type::ELECTRIC,
      "backWood" => Wood::MAHOGANY,
      "topWood" => Wood::INDIAN_ROSEWOOD,
      "numStrings" => 6
    ],
    [
      "instrumentType" => InstrumentType::GUITAR,
      "builder" => Builder::FENDER,
      "model" => "Stratokaster",
      "type" => Type::ELECTRIC,
      "numStrings" => 6,
      "backWood" => Wood::ALDER,
      "topWood" => Wood::ALDER
    ],
    [
      "instrumentType" => InstrumentType::GUITAR,
      "builder" => Builder::GIBSON,
      "model" => "SG'61 Reissue",
      "type" => Type::ELECTRIC,
      "numStrings" => 6,
      "backWood" => Wood::MAHOGANY,
      "topWood" => Wood::MAHOGANY
    ],
    [
      "instrumentType" => InstrumentType::GUITAR,
      "builder" => Builder::GIBSON,
      "model" => "Les Paul",
      "type" => Type::ELECTRIC,
      "numStrings" => 6,
      "backWood" => Wood::MAPLE,
      "topWood" => Wood::MAPLE
    ]
  ];

  $mandolins = [
    [
      "instrumentType" => InstrumentType::MANDOLIN,
      "builder" => Builder::GIBSON,
      "model" => "F5-G",
      "type" => Type::ACOUSTIC,
      "backWood" => Wood::MAPLE,
      "topWood" => Wood::MAPLE
    ]
  ];

  $banjos = [
    [
      "instrumentType" => InstrumentType::BANJO,
      "builder" => Builder::GIBSON,
      "model" => "RB-3",
      "type" => Type::ACOUSTIC,
      "numStrings" => 5,
      "backWood" => Wood::MAPLE,
    ]
  ];

  $inv->addInstrument("#11277", 3999.95, new InstrumentSpecs($guitars[0]));
  $inv->addInstrument("#122784", 5495.95, new InstrumentSpecs($guitars[1]));
  $inv->addInstrument("#V95693", 1499.95, new InstrumentSpecs($guitars[2]));
  $inv->addInstrument("#V9512", 1549.95, new InstrumentSpecs($guitars[3]));
  $inv->addInstrument("#82765501", 1890.95, new InstrumentSpecs($guitars[4]));
  $inv->addInstrument("#70108276", 2295.95, new InstrumentSpecs($guitars[5]));

  $inv->addInstrument("#9109920", 5495.99, new InstrumentSpecs($mandolins[0]));

  $inv->addInstrument("#8920100", 2945.99, new InstrumentSpecs($banjos[0]));
}
