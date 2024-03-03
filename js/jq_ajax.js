///////////////////////////////////////
/////~~ jq_ajax.js AJAX Requests ~~////
/////~~  HTML data with jQuery   ~~////
///////////////////////////////////////

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