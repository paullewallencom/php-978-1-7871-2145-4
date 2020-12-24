#!/usr/local/bin/php7
<?php
/**
 * Volume 1 - Fundamental of FP - Video 3.2
 * Author: @luijar
 * Identity function
 */
declare(strict_types=1);
namespace Vol1\Sect3\Video2;

// identity: a -> a
function identity($a) {
	return $a;
}

$fruits = array('lemons' => 1, 'oranges' => 4, 'bananas' => 5, 'apples' => 10);

// create a copy of the array (OOP)
print 'First copy (OOP)'. PHP_EOL;

$fruitsArrayObject = new \ArrayObject($fruits);
$fruitsArrayObject['pears'] = 4;
$copy = $fruitsArrayObject->getArrayCopy();
print_r($copy);

// use identity to create a copy (FP)
print 'Second copy (FP)'. PHP_EOL;

$anotherCopy = array_map(__NAMESPACE__. '\identity', $fruits);
$anotherCopy['pears'] = 4;
print_r($anotherCopy);

// show original unchanged
print 'Original (unchanged)'. PHP_EOL;
print_r($fruits);
