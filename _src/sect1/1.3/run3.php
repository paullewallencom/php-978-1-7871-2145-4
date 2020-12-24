<?php 
/**
 * Volume 1 - PHP Crash Course - Video 1.3
 * Author: @luijar
 * Run 3
 */  
declare(strict_types=1);

namespace Vol1\Sect1\Video3;

require_once 'writeToFile.php';
require_once 'toAll.php';

$writer = writeToFile('section_1_3.txt');

$writer('First Paragraph');
$writer('Second Paragraph');

$appender = writeToFile('section_1_3.txt', 'a');
toAll($appender, ['Functional', 'PHP', 'Rocks!']);

toAll($appender, array_map('strtoupper', ['Functional', 'PHP', 'Rocks!']));