<?php
# Sets the available operators
$operators = array("Add", "Subtract", "Multiply", "Divide", "Modulus", "Power", "Square Root");

# Used to calculate the answer from the inputs
function calculate($number_1, $number_2, $operator) {
    switch($operator) {
        # Checks if the operator is add
        case "add":
            $result = $number_1 + $number_2;
            break;
        # Checks if the operator is subtract
        case "subtract":
            $result = $number_1 - $number_2;
            break;
        # Checks if the operator is multiply
        case "multiply":
            $result = $number_1 * $number_2;
            break;
        # Checks if the operator is divide
        case "divide":
            $result = $number_1 / $number_2;
            break;
        # Checks if the operator is modulus
        case "modulus":
            $result = $number_1 % $number_2;
            break;
        # Checks if the operator is power
        case "power":
            $result = $number_1 ** $number_2;
            break;
        # Checks if the operator is square root
        case "square_root" || "square root":
            $result = sqrt($number_1);
            break;
        # If the operator is not recognised
        default:
            $result = null;
    }
    # Returns the result
    return $result;
}

?>