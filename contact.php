<?php
// Include the validation code
require_once 'includes/validate.php';
include 'includes/database_connection.php';

// Initialize form data and error messages
$formData = array(
    'name' => '',
    'email' => '',
    'age' => '',
    'insurance' => '',
    'message' => '',
    'waitlist' => false 
);
$errorMessages = array(
    'name' => '',
    'email' => '',
    'age' => '',
    'insurance' => '',
    'message' => ''
);
$feedbackMessage = '';

// Check if form is submitted and validate form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $formData['name'] = $_POST['name'];
    $formData['email'] = $_POST['email'];
    $formData['age'] = $_POST['age'];
    $formData['insurance'] = isset($_POST['insurance']) ? $_POST['insurance'] : '';
    $formData['message'] = $_POST['message'];
    $formData['waitlist'] = isset($_POST['waitlist']) ? 'Yes' : 'No';
    // Validate form data
    if (!validateText($formData['name'], 3, 100)) {
        $errorMessages['name'] = "Name is required and must be between 3 and 100 characters long.";
    }
    if (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errorMessages['email'] = "Valid email is required.";
    }
    if (!validateNumber($formData['age'], 16, 65)) {
        $errorMessages['age'] = "Age must be between 16 and 65.";
    }
    if (!validateInsurance($formData['insurance'])) {
        $errorMessages['insurance'] = "Please select a valid insurance option.";
    }
    if (empty($formData['message'])) {
        $errorMessages['message'] = "Message is required.";
    }

    // Check errors
    $hasErrors = false;
    foreach ($errorMessages as $error) {
        if (!empty($error)) {
            $hasErrors = true;
            break;
        }
    }

    // Feedback
    if ($hasErrors) {
        $feedbackMessage = '<p class="text-danger">There was an error processing your form. Please check your inputs and try again.</p>';
    } else {
        // Send email or add to database?
        $sql = "INSERT INTO Client (name, email, age, insurance, message, waitlist) VALUES (:name, :email, :age, :insurance, :message, :waitlist)";
        pdo($pdo, $sql, [
            'name' => $formData['name'],
            'email' => $formData['email'],
            'age' => $formData['age'],
            'insurance' => $formData['insurance'],
            'message' => $formData['message'],
            'waitlist' => $formData['waitlist']
        ]);
        $feedbackMessage = '<p class="text-success">Thank you for your message, ' . htmlspecialchars($formData['name']) . '. We will get back to you soon.</p>';
    }

    // Set cookie for the user's name
    setcookie('username', $formData['name'], time() + (86400 * 30), "/"); // 86400 = 1 day
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaya Psychotherapy</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="css/form.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
</head>
<body>
    
    <header>
        <!-- Nav Bar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Kaya Psychotherapy</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link grow"  href="index.html">Home</a>
                    <a class="nav-link grow"  href="about.html">About</a>
                    <a class="nav-link active" aria-current="page" href="#">Contact</a>
                    <a class="nav-link grow" href="services.php">Services</a>
                    <a class="nav-link grow" href="FAQ.html">FAQ</a>
                    <a class="disabled nav-link grow" href="resources.html">Resources</a>
                </div>
                </div>
            </div>
        </nav>
        
        <!-- insert site search ? -->

    </header>

    <!-- Main Content-->
    <main>

    <!-- Logo -->
    <div class="container-fluid">
    <img src="./images/logo.png" alt="Kaya Psychotherapy Logo" id="logo" class="center borders">
    </div>

    <br>

    <h1 class="center headings">Contact Kaya Psychotherapy</h1>
    <div class="form-container">

        <?php include 'includes/contact_form.php'; ?>
    </div>
    <br>
    <div id="feedback">
        <?php echo $feedbackMessage; ?>
    </div>
    <br>
    <!-- this completely broke now I guess womp -->
    <div class="container">
        <h2 class="center headings">Location</h2>
        <div class="row">
            <div class="col-md-2"></div>
            <div id="map" class="col-md-6"></div>
            <div class="col-md-2"></div>

        </div>
    </div>
    </main>
            
    
    <!-- Footer -->
    <!-- php .inc files moving forward?-->
    <br><br><br>
    <footer class="footer mt-auto py-1 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">435 Newbury St Suite 206</p>
                    <p class="mb-0">Danvers, MA 01923-1065</p>
                    <p class="mb-0"><a href="mailto:kayapsychotherapy@gmail.com">kayapsychotherapy@gmail.com</a></p>
                    <p class="mb-0">978-219-7111</p>
                </div>
                <div class="col-md-6">
                    <p class="mb-0">©2023 by Kaya Psychotherapy PLLC.</p>
                    <br>
                    <p class="mb-0">Created by Zach Albanese</p>
                    <p class="mb-0">Contact site creator at: <a href="mailto:zachalba@uri.edu">zachalba@uri.edu</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous">
    </script>
    <script>
    window.jQuery || document.write('<script src="./js/jquery.min.js"><\/script>')
    </script>
    <!-- local JS-->
    <script src="js/modernizr.js"></script>
    <script src="js/location.js"></script>
    <script src="js/form.js"></script>
</body>
</html>