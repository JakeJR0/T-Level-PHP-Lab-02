<?php

$operators = array("Add", "Subtract", "Multiply", "Divide", "Modulus", "Power", "Square Root");

function calculate($number_1, $number_2, $operator) {
    switch($operator) {
        case "add":
            $result = $number_1 + $number_2;
            break;
        case "subtract":
            $result = $number_1 - $number_2;
            break;
        case "multiply":
            $result = $number_1 * $number_2;
            break;
        case "divide":
            $result = $number_1 / $number_2;
            break;
        case "modulus":
            $result = $number_1 % $number_2;
            break;
        case "power":
            $result = $number_1 ** $number_2;
            break;
        case "square_root" || "square root":
            $result = sqrt($number_1);
            break;
        default:
            $result = null;
        
    }

    return $result;
}



?>