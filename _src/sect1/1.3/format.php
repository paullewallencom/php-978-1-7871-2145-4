<?php
/**
 * Volume 1 - PHP Crash Course - Video 1.3
 * Author: @luijar
 */
declare(strict_types=1);

namespace Vol1\Sect1\Video3;

// format :: string, (string -> string) -> string
function format(string $input, callable $formatter): string {
	if(empty($input)) {
		throw new \InvalidArgumentException('Invalid input!');
	}
	return $formatter($input);
}