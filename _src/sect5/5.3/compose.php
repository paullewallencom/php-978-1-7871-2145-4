#!/usr/local/bin/php7
<?php
/**
 * Volume 1 - Composition with PRamda- Video 5.3
 * Author: @luijar
 * Simple composition example with PRamda
 */
declare(strict_types=1);
namespace Vol1\Sect5\Video3;

require_once __DIR__ . '/../../../../vendor/autoload.php';
use P;

$text = <<<TEXT
A complex system that works is invariably found to 
have evolved from a simple system that worked. A 
complex system designed from scratch never works 
and cannot be patched up to make it work. You have 
to start over with a working simple system
TEXT;

$xexplode = P::curry2('explode')(' ');
$countWords = P::compose('count', $xexplode);

printf("Number of words %s". PHP_EOL, $countWords($text));
