#!/usr/local/bin/php7
<?php
/**
 * Volume 1 - Functional evaluation strategies - Video 4.2
 * Author: @luijar
 * Partial function application
 */
declare(strict_types=1);
namespace Vol1\Sect4\Video2;

function partial(callable $func, ...$args): callable {
    return function() use ($func, $args) {
        return call_user_func_array($func, array_merge($args, func_get_args()));
    };
}

//------------------------------------------------//
//                     Usage 
//------------------------------------------------//
function multipleBy(int $a, int $b): int {
	return $a * $b;			
}

$by2 = partial(__NAMESPACE__. '\multipleBy', 2);

assert('4 === $by2(2)', new \RuntimeException('Failed comparison!'));

// Make even numbers
print_r(
	array_map($by2, [1, 2, 3, 4, 5])
);

$mapBy2 = partial('array_map', $by2);

print_r(
	$mapBy2([3, 4, 5, 6, 7])
);

print_r(
	$mapBy2([9, 8, 7, 6, 5])
);

