// Function to display slides in a slideshow automatically
function showSlides() {
    // Get all elements with the class "mySlides"
    var slides = document.getElementsByClassName("slideshow");
  

     for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
     }
     
     slideindex++;
     if (slideindex > slides.length) {slideindex = 1};
     slides[slideindex-1].style.display = "block";
  
  
    // Call this function recursively after 5000 milliseconds (5 seconds)
    setTimeout(showSlides, 5000); 
  }
  

  
  var slideindex = 0;
  showSlides();
  