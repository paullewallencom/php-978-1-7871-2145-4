#!/usr/local/bin/php7
<?php
/**
 * Volume 1 - Functional evaluation strategies - Video 4.1
 * Author: @luijar
 * Generators
 */
declare(strict_types=1);
namespace Vol1\Sect4\Video1;

// xrange :: (int, int, int?) -> Generator
function xrange(int $start, int $end, int $step = 1): \Generator {
	for ($i = $start; $i <= $end; $i++) {        
        yield $i * $step;
    }
}

// array_take :: (Generator, int) -> array
function array_take(\Generator $source, int $amount): array {	
	foreach ($source as $value) {		
    	$result[] = $value;
    	if(count($result) === $amount) {
    		break;
    	}
	}
	return $result;
}

//------------------------------------------------//
//                     Usage 
//------------------------------------------------//
print_r(array_take(xrange(1, PHP_INT_MAX), 2));