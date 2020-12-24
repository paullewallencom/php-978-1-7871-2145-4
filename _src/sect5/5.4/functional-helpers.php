<?php
/**
 * Volume 1 - Composition - Video 5.4
 * Author: @luijar
 * Compute the most decorated Nobel Prize category of all time
 */
declare(strict_types=1);
namespace Vol1\Sect5\Video4;

require_once __DIR__ . '/../../../../vendor/autoload.php';

// required packages
use P;

class App {

	// readFile :: () -> string -> string
	public static function readFile(): callable {
		return function (string $filename): string {
			return file_get_contents($filename);
		};
	}

	// accumulate :: () -> array -> array
	public static function accumulate(): callable {
		return P::reduce(
			function (array $acc = [], string $category): array {
				$acc[$category] = !array_key_exists($category, $acc) ? 1 : P::inc($acc[$category]);
				return $acc;
			},
		[]);
	}

    // firstElement :: () -> array -> mixed
	public static function firstElement(): callable {
		return function ($array) {
			return P::head($array);
		};
	}

	// toJson :: () -> string -> mixed
	public static function toJson(): callable {
		return function (string $json) {
			return json_decode($json);
		};
	}
}
