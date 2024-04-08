///////////////////////////////////////
/////~~ jq_ajax.js AJAX Requests ~~////
/////~~  HTML data with jQuery   ~~////
/////~~  AJAX and PHP Requests   ~~////
///////////////////////////////////////


//why is this not updating

$('#loadData').on('click', function (event) {
    event.preventDefault();

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
    event.preventDefault();

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
        url: 'php/booking.php',
        method: 'POST',
        data: { service: 'service2' },
        dataType: 'json', // Expect JSON response
        success: function(response) {
            // Display the message returned by the PHP script
            alert(response.message);
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
        url: 'php/booking.php',
        method: 'POST',
        data: { service: 'service1' },
        dataType: 'json', // Expect JSON response
        success: function(response) {
            // Display the message returned by the PHP script
            alert(response.message);
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error('Error:', error);
        }
    });
});