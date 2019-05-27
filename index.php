<?php

require 'vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

use HasPhp\Types\Ints;

$test = Ints::range(1, 200)->filter(function ($i) {
    return $i % 2 == 0 && $i % 5 == 0;
})->tail();

var_dump($test);