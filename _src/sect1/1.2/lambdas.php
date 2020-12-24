<?php
/**
 * Volume 1 - Section 1 - Video 1.2
 * Author: @luijar
 * Sample code to showcase lamda expressions
 * Note: this code will not work as PHP currently does not have support
 * for lambda expressions
 */
namespace Vol1\Sect1\Video2;

$source = [1, 2, 3, 4, 5];

array_reduce(
	array_map(($x) => pow($x, 2), $source), 
   	 ($x, $y) => $x + $y);	//-> 55