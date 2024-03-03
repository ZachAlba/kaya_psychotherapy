var button = document.getElementById('makeRequest');
button.addEventListener('click', makeRequest);
var counter = 0;
var filePath = '';

function makeRequest(){
    var xhr = new XMLHttpRequest();
    xhr.onload = function(){
        if(xhr.status === 200){
            if(counter==0){filePath = 'data/data.html';}
            else if(counter==1){filePath = 'data/data.xml';}
            
            document.getElementById('faq').innerHTML = document.getElementById('faq').innerHTML + xhr.responseText;

        }
    }
    xhr.open('GET', filePath, true);
    xhr.send();
    counter++;
    if (counter === 3) {
        
        button.classList.add('disabled');
        button.setAttribute('disabled', 'true');
    }
}

