#!/usr/local/bin/php7
<?php
/**
 * Volume 1 - Functional evaluation strategies - Video 4.1
 * Author: @luijar
 * Pure functions and lazy evaluation
 */
declare(strict_types=1);
namespace Vol1\Sect4\Video1;


// drange :: (int, int, int?) -> () -> int
function multipleBy(int $a): callable {
	return function (int $b) use ($a): int {
		return $a * $b;		
	};
}

$makeEven = multipleBy(2);
assert('4 === $makeEven(2)', new \RuntimeException('Failed comparison!'));

// Make even numbers
print_r(
	array_map($makeEven, [1, 2, 3, 4, 5])
);
