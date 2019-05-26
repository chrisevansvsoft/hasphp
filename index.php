<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use HasPhp\Types\Ints;

require_once "HasPhp/Types/Ints.php";

$test = Ints::range(1, 200)->filter(function($i){
    return $i % 2 == 0 && $i % 5 == 0;
})->tail();

var_dump($test);
