<?php
/**
 * Created: michaelwatts
 * Date: 07/10/2013
 * Time: 21:14
 *
 * Functional PHP
 * Function returns an anonymous function
 * Notice the use of 'use' - this allows us to access the $min variable within
 * the closure.
 */
function criteria_greater_than($min)
{
    return function($item) use ($min) {
        return $item > $min;
    };
}

$input = array(1,2,3,4,5,6,7,8,9,10);

$output = array_filter($input, criteria_greater_than(3));

print_r($output);
