$('#submitBtn').on('click', submitForm);

function submitForm() {
    var name = $('#name').val();
    var email = $('#email').val();
    var message = $('#message').val();

    // Validate form
    if (name.trim() === '' || email.trim() === '' || message.trim() === '') {
        alert('Please fill in all fields');
        
        // Set blank fields background to red
        if (name.trim() === '') {
            $('#name').css('border', '1px solid red');
        }
        if (email.trim() === '') {
            $('#email').css('border', '1px solid red');
        }
        if (message.trim() === '') {
            $('#message').css('border', '1px solid red');
        }
        return;
    }

    // Log form values for testing
    console.log('Name: ' + name);
    console.log('Email: ' + email);
    console.log('Message: ' + message);

    // Send email
    // Not sure how to implement this yet

    // Clear form after submission
    $('#myForm')[0].reset();

    var outputDiv = $('#output');
    var newElement = $('<p>').text('Thank you for reaching out, ' + name + '! I will get back to you as soon as possible.');
    outputDiv.append(newElement);
}

// Reset input fields and textarea to white when clicked or typed
var inputFields = $('input, textarea');
inputFields.on('click input', function() {
    $(this).css('border', 'none');
});
