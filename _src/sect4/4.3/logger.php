<?php
/**
 * Volume 1 - Functional evaluation strategies - Video 4.3
 * Author: @luijar
 * Function currying
 */
declare(strict_types=1);
namespace Vol1\Sect4\Video3;

// partial :: (callable, array) -> callable
function partial(callable $func, ...$args): callable {
    return function() use ($func, $args) {
        return call_user_func_array($func, array_merge($args, func_get_args()));
    };
}

// writeToFile :: (string, string) -> ()
function writeToFile(string $path, string $contents) {	
	if(is_dir($path)) {
		throw new \Exception('File must not be a directory!');
	}

	$_fp = fopen($path, 'a');	

	if(!($_fp && is_resource($_fp))) {
		throw new \Exception('Error opening file!');
	}

	fwrite($_fp, "$contents\n");		
}

// fileLog :: string -> ()
$fileLog = partial(__NAMESPACE__. '\writeToFile', 'section_4_3.txt');

// consoleLog :: string -> ()
$consoleLog = function ($contents) {
	printf('%s '. PHP_EOL, $contents);
};

// logger :: ((string) -> (), string, string) -> ()
function logger(callable $resource, string $level, string $message) {
    $resource(sprintf('[%s] %s', $level, $message));
}
