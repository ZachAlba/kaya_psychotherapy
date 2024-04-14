<?php
// Empty vars
$name = $email = $age = $insurance = $message = "";
$nameErr = $emailErr = $ageErr = $insuranceErr = $messageErr = "";

// cleaning up the input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// If form posted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"]) || strlen($_POST["name"]) < 3) {
        $nameErr = "Name is required and must be at least 3 characters long.";
    } else {
        $name = sanitize_input($_POST["name"]);
    }
    
    // Validate email
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Valid email is required.";
    } else {
        $email = sanitize_input($_POST["email"]);
    }
    
    // Validate age
    if (empty($_POST["age"]) || !filter_var($_POST["age"], FILTER_VALIDATE_INT) || $_POST["age"] < 16 || $_POST["age"] > 65) {
        $ageErr = "Age must be between 16 and 65.";
    } else {
        $age = sanitize_input($_POST["age"]);
    }
    
    // Validate insurance
    if (empty($_POST["insurance"])) {
        $insuranceErr = "Please select an insurance option.";
    } else {
        $insurance = sanitize_input($_POST["insurance"]);
    }
    
    // Validate message
    if (empty($_POST["message"])) {
        $messageErr = "Message is required.";
    } else {
        $message = sanitize_input($_POST["message"]);
    }
    
}
?>