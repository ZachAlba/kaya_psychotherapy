<?php

    include '../includes/service_class.php';

    // Check if the AJAX request contains the 'service' parameter
    if(isset($_POST['service'])) {
        // Get the selected service from the AJAX request
        $selectedService = $_POST['service'];

        // Check which service was selected and call the bookService method accordingly
        if($selectedService === 'service1') {
            $result = $service1->bookService();
        } elseif($selectedService === 'service2') {
            $result = $service2->bookService();
        }

        $response = array('message' => $result);

        // Return the response as JSON
        echo json_encode($response);
        exit;
    }
?>