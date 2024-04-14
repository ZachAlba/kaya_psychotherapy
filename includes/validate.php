<?php
// Function to validate text input
function validateText($input, $minLength, $maxLength) {
    return (strlen($input) >= $minLength && strlen($input) <= $maxLength);
}

// Function to validate number input
function validateNumber($input, $minValue, $maxValue) {
    return (is_numeric($input) && $input >= $minValue && $input <= $maxValue);
}

// Function to validate insurance option
function validateInsurance($input) {
    $validOptions = array("Optum", "Allways", "United Healthcare", "Aetna", "Private Pay");
    return in_array($input, $validOptions);
}
?>