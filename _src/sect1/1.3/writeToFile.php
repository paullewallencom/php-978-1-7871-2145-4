<?php 
/**
 * Volume 1 - PHP Crash Course - Video 1.3
 * Author: @luijar
 */ 
declare(strict_types=1);

namespace Vol1\Sect1\Video3;

// writeToFile :: string, string -> (string -> ())
function writeToFile(string $path, string $mode = 'w'): callable {	
	if(is_dir($path)) {
		throw new \Exception('File must not be a directory!');
	}

	$_fp = fopen($path, $mode);	

	if(!($_fp && is_resource($_fp))) {
		throw new \Exception('Error opening file!');
	}

	return function ($contents) use ($_fp) {
		fwrite($_fp, "$contents\n");		
	};
}