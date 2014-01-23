<?php
/**
 * Created: michaelwatts
 * Date: 07/10/2013
 * Time: 21:08
 *
 * Functional PHP
 * Simple anonymous function using modulus to find even numbers
 */
$input = array(1,2,3,4,5,6,7,8,9,10);

$filter_even = function($item){
    return ($item % 2) == 0;
};

$output = array_filter($input, $filter_even);

print_r($output);