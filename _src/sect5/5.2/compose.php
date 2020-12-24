#!/usr/local/bin/php7
<?php
/**
 * Volume 1 - Composition - Video 5.2
 * Author: @luijar
 * Simple composition example
 */
declare(strict_types=1);
namespace Vol1\Sect5\Video2;

// compose :: (b -> c), (a -> b) -> a -> c
function compose(callable $f, callable $g): callable {
	return function (string $input) use ($f, $g) {
		return $f($g($input));
	};
}

//------------------------------------------------//
//                     Usage 
//------------------------------------------------//

$text = <<<TEXT
A complex system that works is invariably found to 
have evolved from a simple system that worked. A 
complex system designed from scratch never works 
and cannot be patched up to make it work. You have 
to start over with a working simple system
TEXT;

function xexplode(string $delimeter): callable {
	return function (string $string) use($delimeter): array {
		return explode($delimeter, $string);
	};
}

$tokenizer = xexplode(' ');

$countWords = compose('count', $tokenizer);

printf("Number of words %s". PHP_EOL, $countWords($text));
