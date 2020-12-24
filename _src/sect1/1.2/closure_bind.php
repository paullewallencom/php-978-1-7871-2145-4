<?php
/**
 * Volume 1 - Section 1 - Video 1.2
 * Author: @luijar
 * Sample code to showcase Closures and its bind feature
 */
namespace Vol1\Sect1\Video2;

abstract class Shape {
	public $width;
	public $height;
}

class Square extends Shape {

	public function __construct(int $a) {
		$this->width = $this->height = $a;		
	}
}

class Rectangle extends Shape {

	public function __construct(int $a, int $b) {
		$this->width = $a;
		$this->height = $b;
	}
}

$printArea = function () {
	printf("Area of shape: %d"  . PHP_EOL,  ($this->width * $this->height));
};

// Bind
$printSquareArea = $printArea->bindTo(new Square(10));
$printSquareArea();

// Bind and call
$printArea->call(new Square(10));
$printArea->call(new Rectangle(2, 3));


