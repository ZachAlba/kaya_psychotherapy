document.getElementById('submitBtn').addEventListener('click', submitForm);

function submitForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;

    // Validate form
    if (name.trim() === '' || email.trim() === '' || message.trim() === '') {
        alert('Please fill in all fields');
        
        // Set blank fields background to red
        if (name.trim() === '') {
            document.getElementById('name').style.border = '1px solid red';
        }
        if (email.trim() === '') {
            document.getElementById('email').style.border = '1px solid red';
        }
        if (message.trim() === '') {
            document.getElementById('message').style.border = '1px solid red';
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
    document.getElementById('myForm').reset();


    var outputDiv = document.getElementById('output');
    var newElement = document.createElement('p');
    var newText = document.createTextNode('Thank you for reaching out, ' + name + '! I will get back to you as soon as possible.');
    newElement.appendChild(newText);
    outputDiv.appendChild(newElement);
}

// Reset input fields and textarea to white when clicked or typed
var inputFields = document.querySelectorAll('input, textarea');
inputFields.forEach(function(input) {
    input.addEventListener('click', function() {
        this.style.border = 'none';
    });

    input.addEventListener('input', function() {
        this.style.border = 'none';
    });
});
