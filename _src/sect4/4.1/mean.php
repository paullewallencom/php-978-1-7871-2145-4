#!/usr/local/bin/php7
<?php
/**
 * Volume 1 - Functional evaluation strategies - Video 4.1
 * Author: @luijar
 * Lazy evaluation vs eager evaluation
 */
declare(strict_types=1);
namespace Vol1\Sect4\Video1;

// drange :: (int, int, int?) -> () -> Generator
function drange(int $start, int $end, int $step = 1): callable {
	return function () use($start, $end, $step): \Generator {
		for ($i = $start; $i <= $end; $i++) {        
        	yield $i * $step;
    	}	
	};
}

// average :: array -> float
function average(array $arr = []): float {
   return array_sum($arr)/count($arr);
}

// Normal range evaluates eagerly
//compareAverage(range(0, 10), 5.0);

//compareAverage :: (() -> Generator), float) -> bool
function compareAverage(callable $arrayGen, float $comparison): bool {
	if($comparison < 0) {
		throw new \InvalidArgumentException('Average can never be less than zero');
	}
	return average(iterator_to_array($arrayGen())) == $comparison;
}

$result = compareAverage(drange(0, 10), 5.0);
assert('1 == $result', new \RuntimeException('Failed comparison!'));



