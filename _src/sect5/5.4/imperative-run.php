#!/usr/local/bin/php7
<?php 
/**
 * Volume 1 - Composition - Video 5.4
 * Author: @luijar
 * Imperative version
 */
declare(strict_types=1);
namespace Vol1\Sect5\Video4;

function mostDecoratedCategory(string $path): array {
	$contents = file_get_contents($path);
	if(!$contents) {
		throw new \RuntimeException('Unable to read file!');
	}

	$data = json_decode($contents);

	$result = [];

	foreach($data->prizes as $prize) {
		$category = $prize->category;
		if(!array_key_exists($category, $result)) {
			$result[$category] = 0;
		}
		$result[$category] = $result[$category] + 1;
	}

	uasort($result, function ($v1, $v2) {
		return $v2 - $v1;
	});

	return array_slice($result, 0, 1);
}


// run program
$result = mostDecoratedCategory('prize.json');
print_r($result);

