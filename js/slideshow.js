function showSlides() {
    // Get all elements with the class "mySlides"
    var slides = document.getElementsByClassName("mySlides");

    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
     
    slideindex++;
    if (slideindex > slides.length) {slideindex = 1};
    slides[slideindex-1].style.display = "block";
    
    setTimeout(showSlides, 5000); 
}
  
  
var slideindex = 0;
showSlides();

console.log("slideshow.js loaded");