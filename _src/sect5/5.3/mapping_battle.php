#!/usr/local/bin/php7
<?php
/**
 * Volume 1 - Composition - Video 5.3
 * Author: @luijar
 * Battle of map
 */
declare(strict_types=1);
namespace Vol1\Sect5\Video3;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$source = [1, 2, 3, 4, 5];

// Plain PHP

$result = array_reduce(
	array_map(function ($x) { return pow($x, 2);}, $source), 
   	 function ($x, $y) {return $x + $y;} );

printf("Result is %s". PHP_EOL, $result);




// Using PRamda
use P;

//  pow :: (number, number) -> number
// xpow :: number -> number -> number
$xpow = P::curry2(function ($base, $number) {
	return pow($number, $base);
});

$compute = P::compose(
	P::reduce('P::add', 0), 
	P::map($xpow(2))
  );

printf("Second Result is %s". PHP_EOL, $compute($source));	
		
