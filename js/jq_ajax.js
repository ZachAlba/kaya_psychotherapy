///////////////////////////////////////
/////~~ jq_ajax.js AJAX Requests ~~////
/////~~  HTML data with jQuery   ~~////
/////~~  AJAX and PHP Requests   ~~////
///////////////////////////////////////



$('#loadData').on('click', function (event) {
    

    // fade out result container
    $('#result-container').fadeOut(function () {
        // make an AJAX request
        $('#result-container').load('data/jquery_data.html #service', function () {
            // fade in result container
            $('#result-container').fadeIn('slow');
        });
    });
});

$('body').on('click', function () {
    // fade out result container
    $('#result-container').fadeOut('slow');
});

$('#free').on('click', function (event) {
    

    // fade out result container
    $('#result-container').fadeOut(function () {
        // make an AJAX request
        $('#result-container').load('data/jquery_data.html #free', function () {
            // fade in result container
            $('#result-container').fadeIn('slow');
        });
    });
});

// Click event listener for the book service button
$('#bookServiceBtn').on('click', function() {
    // Send an AJAX request to book the service
    $.ajax({
        url: 'php/booking.php', // URL of the PHP script that handles the booking
        method: 'POST', // Use POST method to send data
        data: { service: 'service2' }, // Send data indicating the selected service
        success: function(response) {
            // Parse the JSON response
            var result = JSON.parse(response);
            // Display the message returned by the PHP script
            alert(result.message);
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error('Error:', error);
        }
    });
});

// Click event listener for the book free service button
$('#bookFreeServiceBtn').on('click', function() {
    // Send an AJAX request to book the free service
    $.ajax({
        url: 'php/booking.php', // URL of the PHP script that handles the booking
        method: 'POST', // Use POST method to send data
        data: { service: 'service1' }, // Send data indicating the selected service
        success: function(response) {
            // Parse the JSON response
            var result = JSON.parse(response);
            // Display the message returned by the PHP script
            alert(result.message);
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error('Error:', error);
        }
    });
});