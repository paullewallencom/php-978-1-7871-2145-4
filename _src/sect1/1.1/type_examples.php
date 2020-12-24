<?php
/**
 * Volume 1 - Section 1 - Video 1.1
 * Author: @luijar
 * Sample functions using scalar types
 */
declare(strict_types=1);

namespace Vol1\Sect1\Video1;

function add(float $a, string $b): float {
	return $a + $b;
}

printf('Addition of a + b: %s'. PHP_EOL, add(2.5, 2.5));
