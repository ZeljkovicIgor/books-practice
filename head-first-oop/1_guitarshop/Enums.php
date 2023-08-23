<?php

enum Type: string
{
  case ACOUSTIC = 'acoustic';
  case ELECTRIC = 'electric';
}

enum Builder: string
{
  case FENDER = 'fender';
  case MARTIN = 'martin';
  case GIBSON = 'gibson';
  case COLLINS = 'collins';
  case OLSON = 'olson';
  case RYAN = 'ryan';
  case PRS = 'prs';
  case ANY = 'any';
}

enum Wood: string
{
  case INDIAN_ROSEWOOD = 'Indian Rosewood';
  case BRAZILIAN_ROSEWOOD = 'Brazilian Rosewood';
  case MAHOGANY = 'Mahogany';
  case MAPLE = 'Maple';
  case COCOBOLO = 'Cocobolo';
  case CEDAR = 'Cedar';
  case ADIRONDACK = 'Adirondack';
  case ALDER = 'Adler';
  case SITKA = 'Sitka';
}

enum Style: string
{
  case A = 'A';
  case F = 'F';
}

enum InstrumentType: string
{
  case GUITAR = "Guitar";
  case BANJO = "Banjo";
  case MANDOLIN = "Mandolin";
  case DOBRO = "Dobro";
  case FIDDLE = "Fiddle";
  case BASS = "Bass";
  case UNSPECIFIED = "Unspecified";
}
