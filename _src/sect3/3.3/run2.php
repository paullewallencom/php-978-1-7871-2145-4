#!/usr/local/bin/php7
<?php
/**
 * Volume 1 - Recursion (2)
 * Author: @luijar
 * Run 2
 */
namespace Vol1\Sect3\Video3;

require_once 'trampoline.php';

function factorial(int $n) {
  
  $product = function ($min, $max) use ($n, &$product) {
    return $min == $n ? $max : 
      function () use (&$product, $min, $max) {
        return $product(bcadd($min, 1), bcmul($min, $max));
      };      
  };
  return $product(1, $n);
}

echo trampoline(__NAMESPACE__. '\factorial', array(30000));



