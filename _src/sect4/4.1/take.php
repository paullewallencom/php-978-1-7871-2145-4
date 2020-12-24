#!/usr/local/bin/php7
<?php
/**
 * Volume 1 - Functional evaluation strategies - Video 4.1
 * Author: @luijar
 * Eager vs lazy evaluation
 */
declare(strict_types=1);
namespace Vol1\Sect4\Video1;

// array_take :: (array, int) -> array
function array_take(array $array, int $amount): array {
	return array_slice($array, 0, $amount);
}

//------------------------------------------------//
//                     Usage 
//------------------------------------------------//
$source = range(1, 5);  //-> [1, 2, 4, 3, 5]
array_take($source, 2); //-> [1, 2]

//-> PHP Warning:  range(): The supplied range exceeds the maximum array size
$hugeArray = range(1, PHP_INT_MAX);  // doesn't work in PHP
array_take($hugeArray, 2);


