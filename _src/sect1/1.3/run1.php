<?php
/**
 * Volume 1 - PHP Crash Course - Video 1.3
 * Author: @luijar
 * Run 1
 */
declare(strict_types=1);

namespace Vol1\Sect1\Video3;

require_once 'format.php';

$html = format('<p>Functional PHP Rocks!</p>', 'htmlspecialchars');

printf('%s'. PHP_EOL, $html);