///////////////////////////////////////
///////~~ FAQ.js AJAX Requests ~~//////
///////~~ HTML, XML, JSON Data ~~//////
///////////////////////////////////////

// event listener for the button
var button = document.getElementById('makeRequest');
button.addEventListener('click', makeRequest);

// global variables
var counter = 0;
var filePath = '';

// create and send AJAX request
function makeRequest(){
    var xhr = new XMLHttpRequest();
    xhr.onload = function(){
        /* HTML & XML requests
        * TODO: XML formatted as HTML ~ try reformatting?
        */
        if(xhr.status === 200 && counter !== 3){
            document.getElementById('faq').innerHTML += xhr.responseText;
        }

        // JSON request
        else if(xhr.status === 200 && counter === 3){
            responseObject = JSON.parse(xhr.responseText);
            for(var i=0; i< responseObject.content.length; i++){
                var accordionData = responseObject.content[i];

                // create a new accordion item and set classes
                var newAccordionItem = document.createElement('div');
                newAccordionItem.className = 'accordion-item';
                var newAccordionHeader = document.createElement('h2');
                newAccordionHeader.className = 'accordion-header';
                var newAccordionButton = document.createElement('button');
                newAccordionButton.className = 'accordion-button collapsed';
                newAccordionButton.type = 'button';
                newAccordionButton.setAttribute('data-bs-toggle', 'collapse');
                newAccordionButton.setAttribute('data-bs-target', '#collapse' + (i + 7));
                newAccordionButton.textContent = accordionData.headerText;
        
                // append button to the header
                newAccordionHeader.appendChild(newAccordionButton);
        
                // create elements
                var newAccordionCollapse = document.createElement('div');
                newAccordionCollapse.className = 'accordion-collapse collapse';
                newAccordionCollapse.setAttribute('id', 'collapse' + (i + 7));
                var newAccordionBody = document.createElement('div');
                newAccordionBody.className = 'accordion-body';
                var newParagraph = document.createElement('p');

                // append elements
                newParagraph.textContent = accordionData.bodyText;
                newAccordionBody.appendChild(newParagraph);
                newAccordionCollapse.appendChild(newAccordionBody);
                newAccordionItem.appendChild(newAccordionHeader);
                newAccordionItem.appendChild(newAccordionCollapse);
                document.getElementById('faq').appendChild(newAccordionItem);
            }
        }
    }

    // set filepath
    // TODO: check file extension of next file instead? 
    if(counter === 0){
        filePath = 'data/data.html';
    } else if(counter === 1){
        filePath = 'data/data.xml';
    } else if(counter === 2){
        filePath = 'data/data.json';
    }

    // send request
    xhr.open('GET', filePath, true);
    xhr.send();

    // update counter, disable button when we're out of data
    // TODO: can I do this without hardcoding?
    // check if we're out of data ~ check if more files exist in directory? idk
    counter++;
    if (counter === 3) {
        button.classList.add('disabled');
        button.setAttribute('disabled', 'true');
    }
}

