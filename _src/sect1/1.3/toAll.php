<?php
/**
 * Volume 1 - PHP Crash Course - Video 1.3
 * Author: @luijar
 */
declare(strict_types=1);

namespace Vol1\Sect1\Video3;

// consoleLog :: string -> ()
function consoleLog(string $input) {
	printf("%s"  . PHP_EOL,  $input);		
}

// toAll :: (string -> ()), array -> ()
function toAll(callable $action, array $array): void {
	foreach($array as $elem) {
		$action($elem);
	}
}